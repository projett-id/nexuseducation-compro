<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

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
}
