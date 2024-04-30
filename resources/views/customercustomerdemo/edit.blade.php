@extends('customercustomerdemo.layout')

@section('content')
    <h1>Uredi kupca</h1>
    <form action="{{ route('customercustomerdemo.update', ['CustomerID' => $customercustomerdemoo->CustomerID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="CustomerID">ID:</label>
        <input type="text" name="CustomerID" value="{{ $customercustomerdemoo->CustomerID }}">
        
        <label for="CustomerTypeID">ID:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="CustomerTypeID" value="{{ $customercustomerdemoo->CustomerTypeID }}"> <!-- Promijenite name atribut -->
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


