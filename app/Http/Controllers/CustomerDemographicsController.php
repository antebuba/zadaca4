<?php

namespace App\Http\Controllers;

use App\Models\CustomerDemographics;
use Illuminate\Http\Request;

class CustomerDemographicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerdemographics = CustomerDemographics::all();
        return view('customerdemographics.index', ['customerdemographics' => $customerdemographics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customerdemographics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_type_id' => 'required|string|max:255',
            'customer_desc' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno

        ]);

        CustomerDemographics::create([
            'CustomerTypeID' => $request->customer_type_id,
            'CustomerDesc' => $request->customer_desc,

        ]);

        return redirect()->route('customerdemographics.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($CustomerTypeID)
    {
        $customerdemographic = CustomerDemographics::findOrFail($CustomerTypeID);

        return view('customerdemographics.edit', compact('customerdemographic')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $CustomerTypeID)
    {
        $request->validate([
            'CustomerTypeID' => 'required|string|max:255',
            'CustomerDesc' => 'required|string|max:255'

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $customerdemographic = CustomerDemographics::findOrFail($CustomerTypeID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $customerdemographic->update([
            'CustomerTypeID' => $request->CustomerTypeID,
            'CustomerDesc' => $request->CustomerDesc,

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('customerdemographics.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    //
    public function destroy($CustomerTypeID)
    {
        $customerdemographics = CustomerDemographics::findOrFail($CustomerTypeID);
        $customerdemographics->delete();

        return redirect('/customerdemographics')->with('success', 'Category Data is successfully deleted');
    }
}
