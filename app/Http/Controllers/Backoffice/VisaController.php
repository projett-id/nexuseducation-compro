<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Visa;
use App\Models\Country;
class VisaController extends Controller
{
    public function index()
    {
        $data = Visa::latest()->paginate(10);
        return view('admin.visa.index', compact('data'));
    }

    public function create()
    {
        $country = Country::all();
        return view('admin.visa.create',compact('country'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('visas')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
            ],
            'content' => 'required',
        ]);

        Visa::create($data);

        return redirect()->route('visa.index')->with('success', 'Visa created successfully.');
    }

    public function edit(Visa $visa)
    {
        $country = Country::all();
        return view('admin.visa.update', compact('country','visa'));
    }

    public function update(Request $request, Visa $visa)
    {
        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('visas')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
                    ->ignore($visa->id),
            ],
            'content' => 'required',
        ]);

        $visa->update($data);

        return redirect()->route('visa.index')->with('success', 'Visa updated successfully.');
    }

    public function destroy(Visa $visa)
    {
        $visa->delete();
        return redirect()->route('visa.index')->with('success', 'Visa deleted successfully.');
    }
}
