<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = Region::all();
        return view('region.index')->with('region', $region);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'region_id' => 'required|string|max:255',
            'region_desc' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno

        ]);

        Region::create([
            'RegionID' => $request->region_id,
            'RegionDescription' => $request->region_desc,
        ]);

        return redirect()->route('region.index')->with('success', 'Kategorija je uspješno spremljena.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($RegionID)
    {
        $region = Region::findOrFail($RegionID);

        return view('region.edit', compact('region')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $RegionID)
    {
        $request->validate([
            'RegionID' => 'required|string|max:255',
            'RegionDescription' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno


        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $region = Region::findOrFail($RegionID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $region->update([
            'RegionID' => $request->RegionID,
            'RegionDescription' => $request->RegionDescription,

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('region.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($RegionID)
    {
        $region = Region::findOrFail($RegionID);
        $region->delete();

        return redirect('/region')->with('success', 'Category Data is successfully deleted');
    }
}
