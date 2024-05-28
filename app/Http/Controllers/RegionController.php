<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Prikazuje popis svih regija.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $region = Region::all();
        return view('region.index')->with('region', $region);
    }

    /**
     * Prikazuje formu za stvaranje nove regije.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Sprema novu regiju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

        return redirect()->route('region.index')->with('success', 'Regija je uspješno spremljena.');
    }

    /**
     * Prikazuje određenu regiju.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određene regije.
     *
     * @param  int  $RegionID
     * @return \Illuminate\View\View
     */
    public function edit($RegionID)
    {
        $region = Region::findOrFail($RegionID);
        return view('region.edit', compact('region'));
    }

    /**
     * Ažurira određenu regiju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $RegionID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $RegionID)
    {
        $request->validate([
            'RegionID' => 'required|string|max:255',
            'RegionDescription' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
        ]);

        $region = Region::findOrFail($RegionID);
        $region->update([
            'RegionID' => $request->RegionID,
            'RegionDescription' => $request->RegionDescription,
        ]);

        return redirect()->route('region.index')->with('success', 'Regija je uspješno ažurirana.');
    }

    /**
     * Briše određenu regiju iz baze podataka.
     *
     * @param  int  $RegionID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($RegionID)
    {
        $region = Region::findOrFail($RegionID);
        $region->delete();

        return redirect('/region')->with('success', 'Podaci o regiji uspješno izbrisani');
    }
}
