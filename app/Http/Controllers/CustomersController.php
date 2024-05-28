<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Prikazuje popis svih korisnika.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Prikazuje formu za stvaranje novog korisnika.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Sprema novog korisnika u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
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
        ]);

        return redirect()->route('customers.index')->with('success', 'Korisnik je uspješno spremljen.');
    }

    /**
     * Prikazuje određenog korisnika.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog korisnika.
     *
     * @param  int  $CustomerID
     * @return \Illuminate\View\View
     */
    public function edit($CustomerID)
    {
        $customer = Customers::findOrFail($CustomerID);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Ažurira određenog korisnika u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $CustomerID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $CustomerID)
    {
        $request->validate([
            'CustomerName' => 'required|string|max:255',
            'ContactName' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:255',
            'Country' => 'required|string|max:255',
        ]);

        $customer = Customers::findOrFail($CustomerID);
        $customer->update([
            'CustomerName' => $request->CustomerName,
            'ContactName' => $request->ContactName,
            'Address' => $request->Address,
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
        ]);

        return redirect()->route('customers.index')->with('success', 'Korisnik je uspješno ažuriran.');
    }

    /**
     * Briše određenog korisnika iz baze podataka.
     *
     * @param  int  $CustomerID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($CustomerID)
    {
        $customer = Customers::findOrFail($CustomerID);
        $customer->delete();

        return redirect('/customers')->with('success', 'Podatak o korisniku je uspješno obrisan');
    }
}
