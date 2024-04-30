<?php

namespace App\Http\Controllers;

use App\Models\EmployeeTerritories;
use Illuminate\Http\Request;

class EmployeeTerritoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeterritories = EmployeeTerritories::all();
        return view('employeeterritories.index')->with('employeeterritories', $employeeterritories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employeeterritories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|max:255',
            'territory_id' => 'required|string|max:255'
        ]);

        EmployeeTerritories::create([
            'EmployeeID' => $request->employee_id,
            'TerritoryID' => $request->territory_id


            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('employeeterritories.index')->with('success', 'Kategorija je uspješno spremljena.');
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
    public function edit($EmployeeID)
    {

        $employeeterritory = EmployeeTerritories::findOrFail($EmployeeID);


        return view('employeeterritories.edit', compact('employeeterritory')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $EmployeeID)
    {
        $request->validate([
            'EmployeeID' => 'required|string|max:255',
            'TerritoryID' => 'required|string|max:255'
        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $employeeterritory = EmployeeTerritories::findOrFail($EmployeeID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $employeeterritory->update([
            'EmployeeID' => $request->EmployeeID,
            'TerritoryID' => $request->TerritoryID
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('employeeterritories.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($EmployeeID)
    {
        $employeeterritories = EmployeeTerritories::findOrFail($EmployeeID);
        $employeeterritories->delete();

        return redirect('/employeeterritories')->with('success', 'Category Data is successfully deleted');
    }
}
