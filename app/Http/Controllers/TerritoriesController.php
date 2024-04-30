<?php

namespace App\Http\Controllers;

use App\Models\Territories;
use Illuminate\Http\Request;

class TerritoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $territories = Territories::all();
        return view('territories.index')->with('territories', $territories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('territories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'territory_ID' => 'required|numeric|max:255',
            'territory_description' => 'required|string|max:255',
            'region_id' => 'required|numeric|max:255'
            // Dodajte validaciju za opis ako je potrebno
        ]);

        Territories::create([
            'TerritoryID' => $request->territory_id,
            'TerritoryDescription' => $request->territory_description,
            'RegionID' => $request->region_id,
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('territories.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($TerritoryID)
    {
        $territory = Territories::findOrFail($TerritoryID);

        return view('territories.edit', compact('territory')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $TerritoryID)
    {
        $request->validate([
            'TerritoryID' => 'required|numeric|max:255',
            'TerritoryDescription' => 'required|string|max:255',
            'RegionID' => 'required|numeric|max:255' // Dodajte validaciju za opis ako je potrebno
        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $territory = Territories::findOrFail($TerritoryID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $territory->update([
            'TerritoryID' => $request->TerritoryID,
            'TerritoryDescription' => $request->TerritoryDescription,
            'RegionID' => $request->RegionID,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('territories.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($TerritoryID)
    {
        $territories = Territories::findOrFail($TerritoryID);
        $territories->delete();

        return redirect('/territories')->with('success', 'Category Data is successfully deleted');
    }
}
