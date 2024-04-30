<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::all();
        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string|max:255',
            'customer_id' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'order_date' => 'required|string|max:255',
            'shipper_id' => 'required|string|max:255'

            // Dodajte validaciju za opis ako je potrebno
        ]);

        Orders::create([
            'OrderID' => $request->order_id,
            'CustomerID' => $request->customer_id,
            'EmployeeID' => $request->employee_id,
            'OrderDate' => $request->order_date,
            'ShipperID' => $request->shipper_id,
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('orders.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($OrderID)
    {
        $order = Orders::findOrFail($OrderID);

        return view('orders.edit', compact('order')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $OrderID)
    {
        $request->validate([
            'OrderID' => 'required|string|max:255',
            'CustomerID' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'EmployeeID' => 'required|string|max:255',
            'OrderDate' => 'required|string|max:255',
            'ShipperID' => 'required|string|max:255'

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $order = Orders::findOrFail($OrderID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $order->update([
            'OrderID' => $request->OrderID,
            'CustomerID' => $request->CustomerID,
            'EmployeeID' => $request->EmployeeID,
            'OrderDate' => $request->OrderDate,
            'ShipperID' => $request->ShipperID,

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('orders.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($OrderID)
    {
        $orders = Orders::findOrFail($OrderID);
        $orders->delete();

        return redirect('/orders')->with('success', 'Category Data is successfully deleted');
    }
}
