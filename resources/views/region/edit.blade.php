@extends('region.layout')

@section('content')
    <h1>Uredi regiju</h1>
    <form action="{{ route('region.update', ['RegionID' => $region->RegionID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="RegionID">ID regije:</label>
        <input type="text" name="RegionID" value="{{ $region->RegionID }}">
        
        <label for="RegionDescription">Ime :</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="RegionDescription" value="{{ $region->RegionDescription }}"> <!-- Promijenite name atribut -->
        
        
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


