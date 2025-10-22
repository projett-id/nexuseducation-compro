<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\Visa;
use App\Models\ProgramTypes;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::latest()->get();
        return view('admin.country.index', compact('country'));
    }

    public function create()
    {
        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
            'flag' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'sections.*.name' => 'required|string|max:255',
            'sections.*.description' => 'required|string',
        ]);
        $data = $request->except('sections','flag');
        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('flag', 'public');
        }

        $country = Country::create($data);

        if ($request->has('sections')) {
            foreach ($request->sections as $section) {
                $country->sections()->create([
                    'country_id' => $country->id,
                    'section_name' => $section['name'],
                    'description' => $section['description'],
                ]);
            }
        }


        return redirect()->route('country.index')->with('success', 'Country created successfully.');
    }

    public function edit(Country $country)
    {
        return view('admin.country.update', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $country->id,
            'sections.*.name' => 'required|string|max:255',
            'sections.*.description' => 'required|string',
        ]);
        $data = $request->except('sections','flag');

        if ($request->hasFile('flag')) {
            if ($country->flag && \Storage::disk('public')->exists($country->flag)) {
                \Storage::disk('public')->delete($country->flag);
            }
            $data['flag']=$request->file('flag')->store('flag', 'public');
        }
        $country->update($data);
        $country->sections()->delete(); 
        
        if ($request->has('sections')) {
            foreach ($request->sections as $section) {
                $country->sections()->create([
                    'section_name' => $section['name'],
                    'description' => $section['description'],
                ]);
            }
        }
        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index')->with('success', 'Country deleted successfully.');
    }

    public function detailFE($name)
    {
        $countryName = str_replace('-', ' ', $name);
        $country = Country::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($countryName)])->with(['visas', 'programs'])->firstOrFail();
        return view('frontend.country.detail', compact('country'));
    }
}
