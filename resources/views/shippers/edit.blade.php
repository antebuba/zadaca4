@extends('shippers.layout')

@section('content')
    <h1>Uredi otpremnika</h1>
    <form action="{{ route('shippers.update', ['ShipperID' => $shipper->ShipperID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="ShipperName">Naziv otpremnika:</label>
        <input type="text" name="ShipperName" value="{{ $shipper->ShipperName }}">

        <label for="Phone">Telefon:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Phone" value="{{ $shipper->Phone }}"> <!-- Promijenite name atribut -->
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


