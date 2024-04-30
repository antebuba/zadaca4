@extends('customers.layout')

@section('content')
    <h1>Uredi dobavljača</h1>
    <form action="{{ route('suppliers.update', ['SupplierID' => $supplier->SupplierID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="SupplierName">Ime dobavljača:</label>
        <input type="text" name="SupplierName" value="{{ $supplier->SupplierName }}">
        
        <label for="ContactName">Kontakt:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="ContactName" value="{{ $supplier->ContactName }}"> <!-- Promijenite name atribut -->
        
        <label for="Address">Adresa:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Address" value="{{ $supplier->Address }}"> <!-- Promijenite name atribut -->
        
        <label for="City">Grad:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="City" value="{{ $supplier->City }}"> <!-- Promijenite name atribut -->
        
        <label for="PostalCode">Postanski broj:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="PostalCode" value="{{ $supplier->PostalCode }}"> <!-- Promijenite name atribut -->
        
        <label for="Country">Drzava:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Country" value="{{ $supplier->Country }}"> <!-- Promijenite name atribut -->
        
        <label for="Phone">Telefon:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Phone" value="{{ $supplier->Phone }}"> <!-- Promijenite name atribut -->
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


