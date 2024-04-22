<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
        ]);

        Category::create([
            'CategoryName' => $request->category_name,
            'Description' => $request->category_description,
            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategorija je uspješno spremljena.');
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

    public function edit($CategoryID)
    {
        $category = Category::findOrFail($CategoryID);

        return view('categories.edit', compact('category')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $CategoryID)
    {
        $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $category = Category::findOrFail($CategoryID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $category->update([
            'CategoryName' => $request->CategoryName,
            'Description' => $request->Description,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('categories.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($CategoryID)
    {
        $categories = Category::findOrFail($CategoryID);
        $categories->delete();

        return redirect('/categories')->with('success', 'Category Data is successfully deleted');
    }
}
