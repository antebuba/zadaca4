<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Prikazuje popis svih narudžbi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Orders::all();
        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Prikazuje formu za stvaranje nove narudžbe.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Sprema novu narudžbu u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string|max:255',
            'customer_id' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'order_date' => 'required|string|max:255',
            'shipper_id' => 'required|string|max:255'
        ]);

        Orders::create([
            'OrderID' => $request->order_id,
            'CustomerID' => $request->customer_id,
            'EmployeeID' => $request->employee_id,
            'OrderDate' => $request->order_date,
            'ShipperID' => $request->shipper_id,
        ]);

        return redirect()->route('orders.index')->with('success', 'Narudžba je uspješno spremljena.');
    }

    /**
     * Prikazuje određenu narudžbu.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određene narudžbe.
     *
     * @param  int  $OrderID
     * @return \Illuminate\View\View
     */
    public function edit($OrderID)
    {
        $order = Orders::findOrFail($OrderID);
        return view('orders.edit', compact('order'));
    }

    /**
     * Ažurira određenu narudžbu u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $OrderID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $OrderID)
    {
        $request->validate([
            'OrderID' => 'required|string|max:255',
            'CustomerID' => 'required|string|max:255',
            'EmployeeID' => 'required|string|max:255',
            'OrderDate' => 'required|string|max:255',
            'ShipperID' => 'required|string|max:255'
        ]);

        $order = Orders::findOrFail($OrderID);
        $order->update([
            'OrderID' => $request->OrderID,
            'CustomerID' => $request->CustomerID,
            'EmployeeID' => $request->EmployeeID,
            'OrderDate' => $request->OrderDate,
            'ShipperID' => $request->ShipperID,
        ]);

        return redirect()->route('orders.index')->with('success', 'Narudžba je uspješno ažurirana.');
    }

    /**
     * Briše određenu narudžbu iz baze podataka.
     *
     * @param  int  $OrderID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($OrderID)
    {
        $order = Orders::findOrFail($OrderID);
        $order->delete();

        return redirect('/orders')->with('success', 'Podaci o narudžbi uspješno izbrisani');
    }
}
