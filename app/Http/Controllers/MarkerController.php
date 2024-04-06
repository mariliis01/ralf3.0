<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{

    public function index()
    {
        $googlemaps = Marker::all();
        return view('googlemaps.maps', compact('googlemaps'));
    }

    public function create()
    {
        return view('googlemaps.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Marker::create($validatedData);

        return redirect()->route('googlemaps.maps')
            ->with('success', 'Marker updated successfully');
    }
    public function edit($id)
    {
        $googlemaps = Marker::find($id);
        if ($googlemaps) {
            return view('googlemaps.edit', ['marker' => $googlemaps]);
        } else {

            return redirect()->back()->withErrors('Marker not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $googlemaps = Marker::find($id);
        if (!$googlemaps) {
            return redirect()->back()->withErrors('Marker not found.');
        }

        $googlemaps->update($validatedData);

        return redirect()->route('googlemaps.maps')
            ->with('success', 'Marker updated successfully');
    }

    public function destroy($id)
    {
        $googlemaps = Marker::find($id);
        if ($googlemaps) {
            $googlemaps->delete();
            return redirect()->route('googlemaps.maps')
                ->with('success', 'Marker deleted successfully');
        } else {
            return redirect()->back()->withErrors('Marker not found.');
        }
    }
}
