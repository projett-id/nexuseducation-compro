<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\ProgramTypes;
use App\Models\Country;
class ProgramTypeController extends Controller
{
    public function index()
    {
        $data = ProgramTypes::latest()->get();
        return view('admin.program_types.index', compact('data'));
    }

    public function create()
    {
        $country = Country::all();
        return view('admin.program_types.create',compact('country'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('program_types')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
            ],            
            'content' => 'required',
        ]);

        ProgramTypes::create($data);

        return redirect()->route('program-types.index')->with('success', 'ProgramType created successfully.');
    }

    public function edit(ProgramTypes $programType)
    {
        $country = Country::all();
        return view('admin.program_types.update', compact('country','programType'));
    }

    public function update(Request $request, ProgramTypes $programType)
    {
        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('program_types')
                    ->where(fn ($q) => $q->where('country_id', $request->country_id))
                    ->ignore($programType->id),

            ], 
            'content' => 'required',
        ]);

        $programType->update($data);

        return redirect()->route('program-types.index')->with('success', 'ProgramType updated successfully.');
    }

    public function destroy(ProgramTypes $programType)
    {
        $programType->delete();
        return redirect()->route('program-types.index')->with('success', 'ProgramType deleted successfully.');
    }
}
