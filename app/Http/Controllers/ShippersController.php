<?php

namespace App\Http\Controllers;

use App\Models\Shippers;
use Illuminate\Http\Request;

class ShippersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shippers::all();
        return view('shippers.index')->with('shippers', $shippers);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shippers.create');
    }

    /**
     * Store a newly created resource in storage.
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

        return redirect()->route('shippers.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($ShipperID)
    {
        $shipper = Shippers::findOrFail($ShipperID);

        return view('shippers.edit', compact('shipper')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ShipperID)
    {
        $request->validate([
            'ShipperName' => 'required|string|max:255',
            'Phone' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno


        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $shipper = Shippers::findOrFail($ShipperID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $shipper->update([
            'ShipperName' => $request->ShipperName,
            'Phone' => $request->Phone

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('shippers.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ShipperID)
    {
        $shippers = Shippers::findOrFail($ShipperID);
        $shippers->delete();

        return redirect('/shippers')->with('success', 'Category Data is successfully deleted');
    }
}
