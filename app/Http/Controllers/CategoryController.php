<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Prikazuje popis svih kategorija.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Prikazuje formu za stvaranje nove kategorije.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Sprema novu kategoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string|max:255',
        ]);

        Category::create([
            'CategoryName' => $request->category_name,
            'Description' => $request->category_description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategorija je uspješno spremljena.');
    }

    /**
     * Prikazuje određenu kategoriju.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određene kategorije.
     *
     * @param  int  $CategoryID
     * @return \Illuminate\View\View
     */
    public function edit($CategoryID)
    {
        $category = Category::findOrFail($CategoryID);
        return view('categories.edit', compact('category'));
    }

    /**
     * Ažurira određenu kategoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $CategoryID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $CategoryID)
    {
        $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($CategoryID);
        $category->update([
            'CategoryName' => $request->CategoryName,
            'Description' => $request->Description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Briše određenu kategoriju iz baze podataka.
     *
     * @param  int  $CategoryID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($CategoryID)
    {
        $categories = Category::findOrFail($CategoryID);
        $categories->delete();

        return redirect('/categories')->with('success', 'Category Data is successfully deleted');
    }
}
