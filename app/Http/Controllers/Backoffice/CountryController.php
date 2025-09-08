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
        $country = Country::latest()->paginate(10);
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
        ]);

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('flag', 'public');
        }

        Country::create($data);

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
        ]);

        if ($request->hasFile('flag')) {
            if ($country->flag && \Storage::disk('public')->exists($country->flag)) {
                \Storage::disk('public')->delete($country->flag);
            }
            $data['flag'] = $request->file('flag')->store('flag', 'public');
        }

        $country->update($data);

        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index')->with('success', 'Country deleted successfully.');
    }

    public function detailFE($name)
    {
        // Convert slug back to readable name if needed
        $countryName = str_replace('-', ' ', $name);
        // Example: find by name
        $country = Country::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($countryName)])->with(['visas', 'programs'])->firstOrFail();
        // $visa = Visa::where('country_id', $country->id)->get();
        // $program = ProgramTypes::where('country_id', $country->id)->get();


        return view('frontend.country.detail', compact('country'));
    }
}
