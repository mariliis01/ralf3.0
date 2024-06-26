<?php

namespace App\Http\Controllers\Api;

use App\Models\MakeUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

class MakeUpController extends Controller
{
    /**
     * Display a listing of the resource.'
     */

       public function index()
    {
        $responseData = MakeUp::select ('title', 'image', 'description', 'price', 'brand')->get();
        return response()->json($responseData);
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

    public function records()
    {

        $responseData = Http::get('https://hajusrakendus.ta22maarma.itmajakas.ee/api/records')->json();
        return view('products.records', ['products' => $responseData]);
    }
    public function movies()
    {

        $responseData = Http::get('https://hajus.ta19heinsoo.itmajakas.ee/api/movies');
        $movies = $responseData->json()['data'];
        return view('products.movies', compact('movies'));
    }
}
