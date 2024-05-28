<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Prikazuje popis svih detalja narudžbe.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orderdetails = OrderDetails::all();
        return view('orderdetails.index')->with('orderdetails', $orderdetails);
    }

    /**
     * Prikazuje formu za stvaranje novog detalja narudžbe.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('orderdetails.create');
    }

    /**
     * Sprema novi detalj narudžbe u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderdetail_id' => 'required|string|max:255',
            'order_id' => 'required|string|max:255',
            'product_id' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'discount' => 'required|string|max:255'
        ]);

        OrderDetails::create([
            'OrderDetailID' => $request->orderdetail_id,
            'OrderID' => $request->order_id,
            'ProductID' => $request->product_id,
            'Quantity' => $request->quantity,
            'Discount' => $request->discount,
        ]);

        return redirect()->route('orderdetails.index')->with('success', 'Detalj narudžbe je uspješno spremljen.');
    }

    /**
     * Prikazuje određeni detalj narudžbe.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog detalja narudžbe.
     *
     * @param  int  $OrderDetailID
     * @return \Illuminate\View\View
     */
    public function edit($OrderDetailID)
    {
        $orderdetail = OrderDetails::findOrFail($OrderDetailID);
        return view('orderdetails.edit', compact('orderdetail'));
    }

    /**
     * Ažurira određeni detalj narudžbe u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $OrderDetailID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $OrderDetailID)
    {
        $request->validate([
            'OrderDetailID' => 'required|string|max:255',
            'OrderID' => 'required|string|max:255',
            'ProductID' => 'required|string|max:255',
            'UnitPrice' => 'required|string|max:255',
            'Quantity' => 'required|string|max:255',
            'Discount' => 'required|string|max:255'
        ]);

        $orderdetail = OrderDetails::findOrFail($OrderDetailID);
        $orderdetail->update([
            'OrderDetailID' => $request->OrderDetailID,
            'OrderID' => $request->OrderID,
            'ProductID' => $request->ProductID,
            'UnitPrice' => $request->UnitPrice,
            'Quantity' => $request->Quantity,
            'Discount' => $request->Discount,
        ]);

        return redirect()->route('orderdetails.index')->with('success', 'Detalj narudžbe je uspješno ažuriran.');
    }

    /**
     * Briše određeni detalj narudžbe iz baze podataka.
     *
     * @param  int  $OrderDetailID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($OrderDetailID)
    {
        $orderdetails = OrderDetails::findOrFail($OrderDetailID);
        $orderdetails->delete();

        return redirect('/orderdetails')->with('success', 'Podatak o detalju narudžbe je uspješno obrisan');
    }
}
