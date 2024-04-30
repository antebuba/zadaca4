<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderdetails = OrderDetails::all();
        return view('orderdetails.index')->with('orderdetails', $orderdetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderdetails.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderdetail_id' => 'required|string|max:255',
            'order_id' => 'required|string|max:255',
            'product_id' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'discount' => 'required|string|max:255'

            // Dodajte validaciju za opis ako je potrebno
        ]);

        OrderDetails::create([
            'OrderDetailID' => $request->orderdetail_id,
            'OrderID' => $request->order_id,
            'ProductID' => $request->product_id,
            'Quantity' => $request->quantity,
            'Discount' => $request->discount,
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('orderdetails.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($OrderDetailID)
    {
        $orderdetail = OrderDetails::findOrFail($OrderDetailID);

        return view('orderdetails.edit', compact('orderdetail')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $OrderDetailID)
    {
        $request->validate([
            'OrderDetailID' => 'required|string|max:255',
            'OrderID' => 'required|string|max:255',
            'ProductID' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'UnitPrice' => 'required|string|max:255',
            'Quantity' => 'required|string|max:255',
            'Discount' => 'required|string|max:255'

        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $orderdetail = OrderDetails::findOrFail($OrderDetailID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $orderdetail->update([
            'OrderDetailID' => $request->OrderDetailID,
            'OrderID' => $request->OrderID,
            'ProductID' => $request->ProductID,
            'UnitPrice' => $request->UnitPrice,
            'Quantity' => $request->Quantity,
            'Discount' => $request->Discount,

            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('orderdetail.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($OrderDetailID)
    {
        $orderdetails = OrderDetails::findOrFail($OrderDetailID);
        $orderdetails->delete();

        return redirect('/orderdetails')->with('success', 'Category Data is successfully deleted');
    }
}
