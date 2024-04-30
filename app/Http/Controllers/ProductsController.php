<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric|max:255',
            'product_name' => 'required|string|max:255',
            'supplier_id' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'category_id' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ]);

        Products::create([
            'ProductID' => $request->product_id,
            'ProductName' => $request->product_name,
            'SupplierID' => $request->supplier_id,
            'CategoryID' => $request->category_id,
            'Unit' => $request->unit,
            'Price' => $request->price

            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('products.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($ProductID)
    {
        $product = Products::findOrFail($ProductID);

        return view('products.edit', compact('product')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ProductID)
    {
        $request->validate([
            'ProductID' => 'required|numeric|max:255',
            'ProductName' => 'required|string|max:255',
            'SupplierID' => 'required|numeric|max:255',
            'CategoryID' => 'required|numeric|max:255',
            'Unit' => 'required|string|max:255',
            'Price' => 'required|numeric|max:255',
            // Dodajte validaciju za opis ako je potrebno
        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $product = Products::findOrFail($ProductID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $product->update([
            'ProductID' => $request->ProductID,
            'ProductName' => $request->ProductID,
            'SupplierID' => $request->SupplierID,
            'CategoryID' => $request->CategoryID,
            'Unit' => $request->Unit,
            'Price' => $request->Price
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('products.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ProductID)
    {
        $products = Products::findOrFail($ProductID);
        $products->delete();

        return redirect('/products')->with('success', 'Category Data is successfully deleted');
    }
}
