<?php

namespace App\Http\Controllers;

use App\Models\CustomerCustomerDemo;
use Illuminate\Http\Request;

class CustomerCustomerDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customercustomerdemo = CustomerCustomerDemo::all();
        return view('customercustomerdemo.index')->with('customercustomerdemo', $customercustomerdemo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customercustomerdemo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|string|max:255',
            'customer_type_id' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno

        ]);

        CustomerCustomerDemo::create([
            'CustomerID' => $request->customer_id,
            'CustomerTypeID' => $request->customer_type_id,

        ]);

        return redirect()->route('customercustomerdemo.index')->with('success', 'Kategorija je uspješno spremljena.');
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
        $customercustomerdemoo = CustomerCustomerDemo::findOrFail($CustomerID);

        return view('customercustomerdemo.edit', compact('customercustomerdemoo')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $CustomerID)
    {
        $request->validate([
            'CustomerID' => 'required|string|max:255',
            'CustomerTypeID' => 'required|string|max:255'

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $customercustomerdemoo = CustomerCustomerDemo::findOrFail($CustomerID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $customercustomerdemoo->update([
            'CustomerID' => $request->CustomerID,
            'CustomerTypeID' => $request->CustomerTypeID,

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('customercustomerdemo.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($CustomerID)
    {
        $customercustomerdemo = CustomerCustomerDemo::findOrFail($CustomerID);
        $customercustomerdemo->delete();

        return redirect('/customercustomerdemo')->with('success', 'Category Data is successfully deleted');
    }
}
