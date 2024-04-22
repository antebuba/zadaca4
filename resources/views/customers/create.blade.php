<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('customers.layout')

@section('content')
    <h1>Novi kupac</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">Ime kupca:</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact_name">Kontakt:</label>
            <input type="text" name="contact_name" id="contact_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="address_name">Adresa:</label>
            <input type="text" name="address_name" id="addrss_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="city_name">Grad:</label>
            <input type="text" name="city_name" id="city_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="postal_code">Postanski broj:</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control">
        </div>
        <div class="form-group">
            <label for="country_name">Drzava:</label>
            <input type="text" name="country_name" id="country_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
