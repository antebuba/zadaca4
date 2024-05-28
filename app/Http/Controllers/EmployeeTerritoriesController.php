<?php

namespace App\Http\Controllers;

use App\Models\EmployeeTerritories;
use Illuminate\Http\Request;

class EmployeeTerritoriesController extends Controller
{
    /**
     * Prikazuje popis svih zaposlenikovih teritorija.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employeeterritories = EmployeeTerritories::all();
        return view('employeeterritories.index')->with('employeeterritories', $employeeterritories);
    }

    /**
     * Prikazuje formu za stvaranje nove zaposlenikove teritorije.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employeeterritories.create');
    }

    /**
     * Sprema novu zaposlenikovu teritoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
        ]);

        return redirect()->route('employeeterritories.index')->with('success', 'Zaposlenikova teritorija je uspješno spremljena.');
    }

    /**
     * Prikazuje određenu zaposlenikovu teritoriju.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Prikazuje formu za uređivanje određene zaposlenikove teritorije.
     *
     * @param  int  $EmployeeID
     * @return \Illuminate\View\View
     */
    public function edit($EmployeeID)
    {
        $employeeterritory = EmployeeTerritories::findOrFail($EmployeeID);
        return view('employeeterritories.edit', compact('employeeterritory'));
    }

    /**
     * Ažurira određenu zaposlenikovu teritoriju u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $EmployeeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $EmployeeID)
    {
        $request->validate([
            'EmployeeID' => 'required|string|max:255',
            'TerritoryID' => 'required|string|max:255'
        ]);

        $employeeterritory = EmployeeTerritories::findOrFail($EmployeeID);
        $employeeterritory->update([
            'EmployeeID' => $request->EmployeeID,
            'TerritoryID' => $request->TerritoryID
        ]);

        return redirect()->route('employeeterritories.index')->with('success', 'Zaposlenikova teritorija je uspješno ažurirana.');
    }

    /**
     * Briše određenu zaposlenikovu teritoriju iz baze podataka.
     *
     * @param  int  $EmployeeID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($EmployeeID)
    {
        $employeeterritories = EmployeeTerritories::findOrFail($EmployeeID);
        $employeeterritories->delete();

        return redirect('/employeeterritories')->with('success', 'Podatak o zaposlenikovoj teritoriji je uspješno obrisan');
    }
}
