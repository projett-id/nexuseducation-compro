<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PartnerSchool;
use App\Models\PartnerSchoolSection;
use App\Models\Country;
use Illuminate\Support\Str;


class PartnerSchoolController extends Controller
{
    public function index()
    {
        $data = PartnerSchool::latest()->get();
        return view('admin.partner_schools.index', compact('data'));
    }

    public function create()
    {
        $country = Country::all();
        return view('admin.partner_schools.create',compact('country'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_id'     => 'required|exists:countries,id',
            'logo'           => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'           => 'required|string|max:255',
            'banner_header'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'location'       => 'required|string|max:255',
            'website'        => 'required|string|max:255',
            'maps'           => 'required|string|max:255',
        ]);

        // create partner school
        if ($request->hasFile('banner_header')) {
            if ($request->banner_header && \Storage::disk('public')->exists($request->banner_header)) {
                \Storage::disk('public')->delete($request->banner_header);
            }
            $data['banner_header'] = $request->file('banner_header')->store('partner_schools', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($request->logo && \Storage::disk('public')->exists($request->logo)) {
                \Storage::disk('public')->delete($request->logo);
            }
            $data['logo'] = $request->file('logo')->store('partner_schools', 'public');
        }

        $data['slug'] = Str::slug($data['name']);
        $partnerSchool = PartnerSchool::create($data);

        // redirect to edit page of that partner school
        return redirect()
            ->route('partner-school.edit', $partnerSchool->id)
            ->with('success', 'PartnerSchool created successfully. You can now update it.');
    }

    public function edit(PartnerSchool $partner_school)
    {
        $country = Country::all();
        $sections = $partner_school->sections()->paginate(10);
        return view('admin.partner_schools.update', compact('country','partner_school','sections'));
    }

    public function update(Request $request, PartnerSchool $partner_school)
    {
        $data = $request->validate([
            'country_id'     => 'required|exists:countries,id',
            'location'       => 'required|string|max:255',
            'website'        => 'required|string|max:255',
            'maps'           => 'required|string|max:255',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('partner_schools')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
                    ->ignore($partner_school->id),
            ]
        ]);

        $data['slug'] = Str::slug($data['name']);
        $partner_school->update($data);

        return redirect()->route('partner-school.index')->with('success', 'PartnerSchool updated successfully.');
    }

    public function destroy(PartnerSchool $partner_school)
    {
        $partner_school->delete();
        return redirect()->route('partner-school.index')->with('success', 'PartnerSchool deleted successfully.');
    }

    public function detail(PartnerSchool $partner_school, PartnerSchoolSection $detail=null){
        return view('admin.partner_schools.detail',compact('partner_school','detail'));
    }

    public function storeDetail(Request $request, PartnerSchool $partner_school, PartnerSchoolSection $detail=null){
        $data = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('partner_schools_sections')
                    ->where(fn ($q) => $q->where('partner_schools_id', $partner_school->id))
                    ->ignore($detail?->id),
            ],
            'content' => 'required',
        ]);
        $data = $request->only('title','content');
        $data['partner_schools_id']= $partner_school->id;
        if($detail==null){
            PartnerSchoolSection::create($data);
        }else{
            $detail->update($data);
        }
        return redirect()->route('partner-school.edit',$partner_school)->with('success', 'Detail Partner School successfully.');
    }

    public function deleteDetail(PartnerSchool $partner_school, PartnerSchoolSection $detail)
    {
        $detail->delete();
        return redirect()->route('partner-school.edit',$partner_school)->with('success', 'Detail Partner School deleted successfully.');
    }

    public function detailFE($name)
    {
        // $partner_schoolName = str_replace('-', ' ', $name);
        $data = PartnerSchool::where('slug',$name)->firstOrFail();
        return view('frontend.partner_school.detail', compact('data'));
    }
}
