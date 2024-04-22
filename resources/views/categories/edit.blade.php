@extends('categories.layout')

@section('content')
    <h1>Uredi kategoriju</h1>
    <form action="{{ route('categories.update', ['CategoryID' => $category->CategoryID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="CategoryName">Naziv kategorije:</label>
        <input type="text" name="CategoryName" value="{{ $category->CategoryName }}">
        <label for="Description">Opis kategorije:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Description" value="{{ $category->Description }}"> <!-- Promijenite name atribut -->
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


