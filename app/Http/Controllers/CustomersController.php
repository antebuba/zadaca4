<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'address_name' => 'required|string|max:255',
            'city_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country_name' => 'required|string|max:255',
        ]);

        Customers::create([
            'CustomerName' => $request->customer_name,
            'ContactName' => $request->contact_name,
            'Address' => $request->address_name,
            'City' => $request->city_name,
            'PostalCode' => $request->postal_code,
            'Country' => $request->country_name,
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('customers.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($CustomerID)
    {
        $customer = Customers::findOrFail($CustomerID);

        return view('customers.edit', compact('customer')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $CustomerID)
    {
        $request->validate([
            'CustomerName' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:255',
            'Country' => 'required|string|max:255',

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $customer = Customers::findOrFail($CustomerID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $customer->update([
            'CustomerName' => $request->CustomerName,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('customers.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($CustomerID)
    {
        $customers = Customers::findOrFail($CustomerID);
        $customers->delete();

        return redirect('/customers')->with('success', 'Category Data is successfully deleted');
    }
}
