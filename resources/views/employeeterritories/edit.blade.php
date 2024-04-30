@extends('employeeterritories.layout')

@section('content')
    <h1>Uredi teritorij zaposlenika</h1>
    <form action="{{ route('employeeterritories.update', ['EmployeeID' => $employeeterritory->EmployeeID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="EmployeeID">ID zaposlenika:</label>
        <input type="text" name="EmployeeID" value="{{ $employeeterritory->EmployeeID }}">
        
        <label for="TerritoryID">ID teritorija:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="TerritoryID" value="{{ $employeeterritory->TerritoryID }}"> <!-- Promijenite name atribut -->
        
        
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


