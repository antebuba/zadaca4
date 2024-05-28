<?php

namespace App\Http\Controllers;

use App\Models\CustomerDemographics;
use Illuminate\Http\Request;

class CustomerDemographicsController extends Controller
{
    /**
     * Prikazuje popis svih customer demographics podataka.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customerdemographics = CustomerDemographics::all();
        return view('customerdemographics.index', ['customerdemographics' => $customerdemographics]);
    }

    /**
     * Prikazuje formu za stvaranje novog customer demographics podatka.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customerdemographics.create');
    }

    /**
     * Sprema novi customer demographics podatak u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_type_id' => 'required|string|max:255',
            'customer_desc' => 'required|string|max:255',
        ]);

        CustomerDemographics::create([
            'CustomerTypeID' => $request->customer_type_id,
            'CustomerDesc' => $request->customer_desc,
        ]);

        return redirect()->route('customerdemographics.index')->with('success', 'Podatak je uspješno spremljen.');
    }

    /**
     * Prikazuje određeni customer demographics podatak.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog customer demographics podatka.
     *
     * @param  int  $CustomerTypeID
     * @return \Illuminate\View\View
     */
    public function edit($CustomerTypeID)
    {
        $customerdemographic = CustomerDemographics::findOrFail($CustomerTypeID);
        return view('customerdemographics.edit', compact('customerdemographic'));
    }

    /**
     * Ažurira određeni customer demographics podatak u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $CustomerTypeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $CustomerTypeID)
    {
        $request->validate([
            'CustomerTypeID' => 'required|string|max:255',
            'CustomerDesc' => 'required|string|max:255',
        ]);

        $customerdemographic = CustomerDemographics::findOrFail($CustomerTypeID);
        $customerdemographic->update([
            'CustomerTypeID' => $request->CustomerTypeID,
            'CustomerDesc' => $request->CustomerDesc,
        ]);

        return redirect()->route('customerdemographics.index')->with('success', 'Podatak je uspješno ažuriran.');
    }

    /**
     * Briše određeni customer demographics podatak iz baze podataka.
     *
     * @param  int  $CustomerTypeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($CustomerTypeID)
    {
        $customerdemographics = CustomerDemographics::findOrFail($CustomerTypeID);
        $customerdemographics->delete();

        return redirect('/customerdemographics')->with('success', 'Podatak je uspješno obrisan');
    }
}
