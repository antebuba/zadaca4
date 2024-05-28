<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Prikazuje popis svih dobavljača.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Prikazuje formu za stvaranje novog dobavljača.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Sprema novog dobavljača u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

        return redirect()->route('suppliers.index')->with('success', 'Dobavljač je uspješno spremljen.');
    }

    /**
     * Prikazuje određenog dobavljača.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog dobavljača.
     *
     * @param  int  $SupplierID
     * @return \Illuminate\View\View
     */
    public function edit($SupplierID)
    {
        $supplier = Suppliers::findOrFail($SupplierID);

        return view('suppliers.edit', compact('supplier')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Ažurira određenog dobavljača u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $SupplierID
     * @return \Illuminate\Http\RedirectResponse
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

        $supplier = Suppliers::findOrFail($SupplierID);
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

        return redirect()->route('suppliers.index')->with('success', 'Dobavljač je uspješno ažuriran.');
    }

    /**
     * Briše određenog dobavljača iz baze podataka.
     *
     * @param  int  $SupplierID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($SupplierID)
    {
        $suppliers = Suppliers::findOrFail($SupplierID);
        $suppliers->delete();

        return redirect('/suppliers')->with('success', 'Podaci o dobavljaču uspješno izbrisani');
    }
}
