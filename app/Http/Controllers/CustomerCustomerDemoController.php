<?php

namespace App\Http\Controllers;

use App\Models\CustomerCustomerDemo;
use Illuminate\Http\Request;

class CustomerCustomerDemoController extends Controller
{
    /**
     * Prikazuje popis svih customer-customer-demo podataka.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customercustomerdemo = CustomerCustomerDemo::all();
        return view('customercustomerdemo.index')->with('customercustomerdemo', $customercustomerdemo);
    }

    /**
     * Prikazuje formu za stvaranje novog customer-customer-demo podatka.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customercustomerdemo.create');
    }

    /**
     * Sprema novi customer-customer-demo podatak u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|string|max:255',
            'customer_type_id' => 'required|string|max:255',
        ]);

        CustomerCustomerDemo::create([
            'CustomerID' => $request->customer_id,
            'CustomerTypeID' => $request->customer_type_id,
        ]);

        return redirect()->route('customercustomerdemo.index')->with('success', 'Podatak je uspješno spremljen.');
    }

    /**
     * Prikazuje određeni customer-customer-demo podatak.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog customer-customer-demo podatka.
     *
     * @param  int  $CustomerID
     * @return \Illuminate\View\View
     */
    public function edit($CustomerID)
    {
        $customercustomerdemoo = CustomerCustomerDemo::findOrFail($CustomerID);
        return view('customercustomerdemo.edit', compact('customercustomerdemoo'));
    }

    /**
     * Ažurira određeni customer-customer-demo podatak u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $CustomerID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $CustomerID)
    {
        $request->validate([
            'CustomerID' => 'required|string|max:255',
            'CustomerTypeID' => 'required|string|max:255',
        ]);

        $customercustomerdemoo = CustomerCustomerDemo::findOrFail($CustomerID);
        $customercustomerdemoo->update([
            'CustomerID' => $request->CustomerID,
            'CustomerTypeID' => $request->CustomerTypeID,
        ]);

        return redirect()->route('customercustomerdemo.index')->with('success', 'Podatak je uspješno ažuriran.');
    }

    /**
     * Briše određeni customer-customer-demo podatak iz baze podataka.
     *
     * @param  int  $CustomerID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($CustomerID)
    {
        $customercustomerdemo = CustomerCustomerDemo::findOrFail($CustomerID);
        $customercustomerdemo->delete();

        return redirect('/customercustomerdemo')->with('success', 'Podatak je uspješno obrisan');
    }
}
