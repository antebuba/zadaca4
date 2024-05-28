<?php

namespace App\Http\Controllers;

use App\Models\Territories;
use Illuminate\Http\Request;

class TerritoriesController extends Controller
{
    /**
     * Prikazuje popis svih teritorija.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $territories = Territories::all();
        return view('territories.index')->with('territories', $territories);
    }

    /**
     * Prikazuje formu za stvaranje nove teritorije.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('territories.create');
    }

    /**
     * Sprema novu teritoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

        return redirect()->route('territories.index')->with('success', 'Teritorija je uspješno spremljena.');
    }

    /**
     * Prikazuje određenu teritoriju.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određene teritorije.
     *
     * @param  int  $TerritoryID
     * @return \Illuminate\View\View
     */
    public function edit($TerritoryID)
    {
        $territory = Territories::findOrFail($TerritoryID);

        return view('territories.edit', compact('territory')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Ažurira određenu teritoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $TerritoryID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $TerritoryID)
    {
        $request->validate([
            'TerritoryID' => 'required|numeric|max:255',
            'TerritoryDescription' => 'required|string|max:255',
            'RegionID' => 'required|numeric|max:255' // Dodajte validaciju za opis ako je potrebno
        ]);

        $territory = Territories::findOrFail($TerritoryID);
        $territory->update([
            'TerritoryID' => $request->TerritoryID,
            'TerritoryDescription' => $request->TerritoryDescription,
            'RegionID' => $request->RegionID,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        return redirect()->route('territories.index')->with('success', 'Teritorija je uspješno ažurirana.');
    }

    /**
     * Briše određenu teritoriju iz baze podataka.
     *
     * @param  int  $TerritoryID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($TerritoryID)
    {
        $territories = Territories::findOrFail($TerritoryID);
        $territories->delete();

        return redirect('/territories')->with('success', 'Podaci o teritoriji uspješno izbrisani');
    }
}
