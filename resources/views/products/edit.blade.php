@extends('products.layout')

@section('content')
    <h1>Uredi proizvod</h1>
    <form action="{{ route('products.update', ['ProductID' => $product->ProductID]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Dodajte ovu liniju za slanje PUT zahtjeva -->
        <label for="ProductID">ID:</label>
        <input type="text" name="ProductID" value="{{ $product->ProductID }}">
        
        <label for="ProductName">Naziv:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="ProductName" value="{{ $product->ProductName }}"> <!-- Promijenite name atribut -->
        
        <label for="SupplierID">ID otpremnika:</label>
        <input type="text" name="SupplierID" value="{{ $product->SupplierID }}">
        
        <label for="CategoryID">ID kategorije:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="CategoryID" value="{{ $product->CategoryID }}">
        
        <label for="Unit">Jedinica:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Unit" value="{{ $product->Unit }}">
        
        <label for="Price">Cijena:</label> <!-- Dodajte oznaku za polje Description -->
        <input type="text" name="Price" value="{{ $product->Price }}">
        
        <button type="submit">Spremi promjene</button>
    </form>
@endsection


