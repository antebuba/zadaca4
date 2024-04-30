@extends('customerdemographics.layout')

@section('content')
    <h1>Uredi kupca</h1>
    <form action="{{ route('customerdemographics.update', ['CustomerTypeID' => $customerdemographic->CustomerTypeID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="CustomerTypeID">ID:</label>
        <input type="text" name="CustomerTypeID" value="{{ $customerdemographic->CustomerTypeID }}">
        
        <label for="CustomerDesc">Opis:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="CustomerDesc" value="{{ $customerdemographic->CustomerDesc }}"> <!-- Promijenite name atribut -->
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


