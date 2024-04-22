<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('categories.layout')

@section('content')
    <h1>Nova kategorija</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_name">Naziv kategorije:</label>
            <input type="text" name="category_name" id="category_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_description">Kratak opis:</label>
            <input type="text" name="category_description" id="category_description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
