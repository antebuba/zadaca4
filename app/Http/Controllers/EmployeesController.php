<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_naame' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'birth_date' => 'required|string|max:255',
            'photo' => 'required|string|max:255',
            'notes' => 'required|string|max:255',
        ]);

        Employees::create([
            'LastName' => $request->last_name,
            'FirstName' => $request->first_name,
            'BirthDate' => $request->birth_date,
            'Photo' => $request->photo,
            'Notes' => $request->notes,


            // Dodajte CategoryID ako je potrebno
        ]);

        return redirect()->route('employees.index')->with('success', 'Kategorija je uspješno spremljena.');
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
        $employ = Employees::findOrFail($EmployeeID);


        return view('employees.edit', compact('employ')); // Promijenjena varijabla $Category u $category
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $EmployeeID)
    {
        $request->validate([
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255', // Dodajte validaciju za opis ako je potrebno
            'BirthDate' => 'required|string|max:255',
            'Photo' => 'required|string|max:255',
            'Notes' => 'required|string|max:255',
        ]);

        // Pronalazi kategoriju u bazi podataka po CategoryID-u
        $employ = Employees::findOrFail($EmployeeID);

        // Ažurirajte postojeći zapis u bazi podataka s novim podacima
        $employ->update([
            'LastName' => $request->LastName,
            'FirstName' => $request->FirstName,
            'BirthDate' => $request->BirthDate,
            'Photo' => $request->Photo,
            'Notes' => $request->Notes,
            // Dodajte ostale atribute kategorije ovisno o vašoj bazi podataka
        ]);

        // Nakon što se zapis ažurira, preusmjerite korisnika na stranicu s popisom kategorija s porukom o uspješnom ažuriranju
        return redirect()->route('employees.index')->with('success', 'Kategorija je uspješno ažurirana.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($EmployeeID)
    {
        $employees = Employees::findOrFail($EmployeeID);
        $employees->delete();

        return redirect('/employees')->with('success', 'Category Data is successfully deleted');
    }
}
