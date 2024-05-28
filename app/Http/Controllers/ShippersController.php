<?php

namespace App\Http\Controllers;

use App\Models\Shippers;
use Illuminate\Http\Request;

class ShippersController extends Controller
{
    /**
     * Prikazuje popis svih dostavljača.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shippers = Shippers::all();
        return view('shippers.index')->with('shippers', $shippers);
    }

    /**
     * Prikazuje formu za stvaranje novog dostavljača.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('shippers.create');
    }

    /**
     * Sprema novog dostavljača u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipper_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
        ]);

        Shippers::create([
            'ShipperName' => $request->shipper_name,
            'Phone' => $request->phone
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('shippers.index')->with('success', 'Dostavljač je uspješno spremljen.');
    }

    /**
     * Prikazuje određenog dostavljača.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog dostavljača.
     *
     * @param  int  $ShipperID
     * @return \Illuminate\View\View
     */
    public function edit($ShipperID)
    {
        $shipper = Shippers::findOrFail($ShipperID);

        return view('shippers.edit', compact('shipper')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Ažurira određenog dostavljača u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ShipperID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $ShipperID)
    {
        $request->validate([
            'ShipperName' => 'required|string|max:255',
            'Phone' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
        ]);

        $shipper = Shippers::findOrFail($ShipperID);
        $shipper->update([
            'ShipperName' => $request->ShipperName,
            'Phone' => $request->Phone
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        return redirect()->route('shippers.index')->with('success', 'Dostavljač je uspješno ažuriran.');
    }

    /**
     * Briše određenog dostavljača iz baze podataka.
     *
     * @param  int  $ShipperID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($ShipperID)
    {
        $shippers = Shippers::findOrFail($ShipperID);
        $shippers->delete();

        return redirect('/shippers')->with('success', 'Podaci o dostavljaču uspješno izbrisani');
    }
}
