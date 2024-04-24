<?php

namespace App\Http\Controllers;

use App\Models\MakeUp;
use Illuminate\Http\Request;


class MakeUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiData = MakeUp::all();
        if ($apiData) {
            $responseData = [
            'title' => $apiData->title,
            'image' => $apiData->image,
            'description' => $apiData->description,
            'price' => $apiData->price,
            'brand' => $apiData->brand,
            ];
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'No products found!'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MakeUp $makeUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MakeUp $makeUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MakeUp $makeUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MakeUp $makeUp)
    {
        //
    }
}
