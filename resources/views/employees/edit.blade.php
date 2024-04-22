@extends('customers.layout')

@section('content')
    <h1>Uredi zaposlenika</h1>
    <form action="{{ route('employees.update', ['EmployeeID' => $employ->EmployeeID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="LastName">Prezime:</label>
        <input type="text" name="LastName" value="{{ $employ->LastName }}">
        
        <label for="FirstName">Ime :</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="FirstName" value="{{ $employ->FirstName }}"> <!-- Promijenite name atribut -->
        
        <label for="BirthDate">Datum rođenja:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="BirthDate" value="{{ $employ->BirthDate }}"> <!-- Promijenite name atribut -->
        

        <label for="Photo">Slika:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Photo" value="{{ $employ->Photo }}"> <!-- Promijenite name atribut -->
        
        <label for="Notes">Opis:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Notes" value="{{ $employ->Notes }}"> <!-- Promijenite name atribut -->
        
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


