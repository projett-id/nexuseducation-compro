<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PartnerSchool;
use App\Models\Country;
class PartnerSchoolController extends Controller
{
    public function index()
    {
        $data = PartnerSchool::latest()->paginate(10);
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
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('partner_schools')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
            ],
            'content' => 'required',
        ]);

        PartnerSchool::create($data);

        return redirect()->route('partner-school.index')->with('success', 'PartnerSchool created successfully.');
    }

    public function edit(PartnerSchool $partner_school)
    {
        $country = Country::all();
        return view('admin.partner_schools.update', compact('country','visa'));
    }

    public function update(Request $request, PartnerSchool $partner_school)
    {
        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('partner_schools')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
                    ->ignore($partner_school->id),
            ],
            'content' => 'required',
        ]);

        $partner_school->update($data);

        return redirect()->route('partner-school.index')->with('success', 'PartnerSchool updated successfully.');
    }

    public function destroy(PartnerSchool $partner_school)
    {
        $partner_school->delete();
        return redirect()->route('partner-school.index')->with('success', 'PartnerSchool deleted successfully.');
    }
}
