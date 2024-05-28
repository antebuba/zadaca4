<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Prikazuje popis svih proizvoda.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Prikazuje formu za stvaranje novog proizvoda.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Sprema novi proizvod u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric|max:255',
            'product_name' => 'required|string|max:255',
            'supplier_id' => 'required|numeric|max:255',
            'category_id' => 'required|numeric|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|numeric|max:255',
        ]);

        Products::create([
            'ProductID' => $request->product_id,
            'ProductName' => $request->product_name,
            'SupplierID' => $request->supplier_id,
            'CategoryID' => $request->category_id,
            'Unit' => $request->unit,
            'Price' => $request->price
        ]);

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno spremljen.');
    }

    /**
     * Prikazuje određeni proizvod.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog proizvoda.
     *
     * @param  int  $ProductID
     * @return \Illuminate\View\View
     */
    public function edit($ProductID)
    {
        $product = Products::findOrFail($ProductID);
        return view('products.edit', compact('product'));
    }

    /**
     * Ažurira određeni proizvod u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ProductID
     * @return \Illuminate\Http\RedirectResponse
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
        ]);

        $product = Products::findOrFail($ProductID);
        $product->update([
            'ProductID' => $request->ProductID,
            'ProductName' => $request->ProductName,
            'SupplierID' => $request->SupplierID,
            'CategoryID' => $request->CategoryID,
            'Unit' => $request->Unit,
            'Price' => $request->Price,
        ]);

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno ažuriran.');
    }

    /**
     * Briše određeni proizvod iz baze podataka.
     *
     * @param  int  $ProductID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($ProductID)
    {
        $product = Products::findOrFail($ProductID);
        $product->delete();

        return redirect('/products')->with('success', 'Podaci o proizvodu uspješno izbrisani');
    }
}
