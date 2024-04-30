<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('products.layout')

@section('content')
    <h1>Novi proizvod</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="product_name">Ime:</label>
            <input type="text" name="product_name" id="product_name" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="supplier_id">ID otpremnika</label>
            <input type="text" name="supplier_id" id="supplier_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">ID kategorije:</label>
            <input type="text" name="category_id" id="category_id" class="form-control">
        </div>

        <div class="form-group">
            <label for="unit">Jedinica</label>
            <input type="text" name="unit" id="unit" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Cijena:</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
