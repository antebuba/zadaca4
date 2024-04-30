@extends('territories.layout')

@section('content')
    <h1>Uredi teritorij</h1>
    <form action="{{ route('territories.update', ['TerritoryID' => $territory->TerritoryID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="TerritoryID">ID:</label>
        <input type="text" name="TerritoryID" value="{{ $territory->TerritoryID }}">
        
        <label for="TerritoryDescription">Opis teritorija:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="TerritoryDescription" value="{{ $territory->TerritoryDescription }}"> <!-- Promijenite name atribut -->
        
        <label for="RegionID">ID regije:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="RegionID" value="{{ $territory->RegionID }}"> <!-- Promijenite name atribut -->
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


