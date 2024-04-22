<!-- resources/views/categories/show.blade.php -->

@extends('customers.layout')

@section('content')
    <h1>Detalji kupca</h1>
    <p><strong>Ime kupca:</strong> {{ $customer->CustomerName }}</p>
    <p><strong>Kontakt:</strong> {{ $customer->ContactName }}</p> 
    <p><strong>Adresa:</strong> {{ $customer->Address }}</p>
    <p><strong>Grad:</strong> {{ $customer->City }}</p> 
    <p><strong>Postanski broj:</strong> {{ $customer->PostalCode }}</p>
    <p><strong>Drzava:</strong> {{ $customer->Country }}</p> 
    <!-- Ostali detalji kategorije -->
@endsection
