<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;


class EmployeesController extends Controller
{
    /**
     * Prikazuje popis svih zaposlenika.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employees::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Prikazuje formu za stvaranje novog zaposlenika.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employees.create');
    }
    /**
     * Sprema novog zaposlenika u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
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
        ]);

        return redirect()->route('employees.index')->with('success', 'Zaposlenik je uspješno spremljen.');
    }

    /**
     * Prikazuje određenog zaposlenika.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određenog zaposlenika.
     *
     * @param  int  $EmployeeID
     * @return \Illuminate\View\View
     */
    public function edit($employee)
    {
        $employee = Employees::findOrFail($employee);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Ažurira određenog zaposlenika u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $EmployeeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $employee)
    {
        $request->validate([
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDate' => 'required|string|max:255',
            'Photo' => 'required|string|max:255',
            'Notes' => 'required|string|max:255',
        ]);

        $employ = Employees::findOrFail($employee);
        $employ->update([
            'LastName' => $request->LastName,
            'FirstName' => $request->FirstName,
            'BirthDate' => $request->BirthDate,
            'Photo' => $request->Photo,
            'Notes' => $request->Notes,
        ]);

        return redirect()->route('employees.index')->with('success', 'Zaposlenik je uspješno ažuriran.');
    }

    /**
     * Briše određenog zaposlenika iz baze podataka.
     *
     * @param  int  $EmployeeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($employee)
    {
        $employees = Employees::findOrFail($employee);
        $employees->delete();

        return redirect('/employees')->with('success', 'Podatak o zaposleniku je uspješno obrisan');
    }
}
