<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'address_name' => 'required|string|max:255',
            'city_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',

        ]);

        Suppliers::create([
            'SupplierName' => $request->supplier_name,
            'ContactName' => $request->contact_name,
            'Address' => $request->address_name,
            'City' => $request->city_name,
            'PostalCode' => $request->postal_code,
            'Country' => $request->country_name,
            'Phone' => $request->phone,

            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Kategorija je uspješno spremljena.');
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

    public function edit($SupplierID)
    {
        $supplier = Suppliers::findOrFail($SupplierID);

        return view('suppliers.edit', compact('supplier')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $SupplierID)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:255',
            'Country' => 'required|string|max:255',
            'Phone' => 'required|string|max:255',

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $supplier = Suppliers::findOrFail($SupplierID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $supplier->update([
            'SupplierName' => $request->SupplierName,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
            'Phone' => $request->Phone,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('suppliers.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($SupplierID)
    {
        $suppliers = Suppliers::findOrFail($SupplierID);
        $suppliers->delete();

        return redirect('/suppliers')->with('success', 'Category Data is successfully deleted');
    }
}
