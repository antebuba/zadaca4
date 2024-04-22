<!-- resources/views/categories/show.blade.php -->

@extends('categories.layout')

@section('content')
    <h1>Detalji kategorije</h1>
    <p><strong>Naziv:</strong> {{ $category->CategoryName }}</p>
    <!-- Ostali detalji kategorije -->
@endsection
