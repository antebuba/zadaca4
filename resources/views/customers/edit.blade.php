@extends('customers.layout')

@section('content')
    <h1>Uredi kupca</h1>
    <form action="{{ route('customers.update', ['CustomerID' => $customer->CustomerID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="CustomerName">Ime kupca:</label>
        <input type="text" name="CustomerName" value="{{ $customer->CustomerName }}">
        
        <label for="ContactName">Kontakt:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="ContactName" value="{{ $customer->ContactName }}"> <!-- Promijenite name atribut -->
        
        <label for="Address">Adresa:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Address" value="{{ $customer->Address }}"> <!-- Promijenite name atribut -->
        
        <label for="City">Grad:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="City" value="{{ $customer->City }}"> <!-- Promijenite name atribut -->
        
        <label for="PostalCode">Postanski broj:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="PostalCode" value="{{ $customer->PostalCode }}"> <!-- Promijenite name atribut -->
        
        <label for="Country">Drzava:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Country" value="{{ $customer->Country }}"> <!-- Promijenite name atribut -->
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


