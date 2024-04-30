<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('customerdemographics.layout')

@section('content')
    <h1>Novi kupac</h1>
    <form action="{{ route('customerdemographics.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_type_id">ID:</label>
            <input type="text" name="customer_type_id" id="customer_type_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="customer_desc">Opis:</label>
            <input type="text" name="customer_desc" id="customer_desc" class="form-control">
        
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
