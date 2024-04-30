<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('territories.layout')

@section('content')
    <h1>Novi teritorij:</h1>
    <form action="{{ route('territories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="territory_ID">ID teritorija:</label>
            <input type="text" name="territory_ID" id="territory_ID" class="form-control">
        </div>
        <div class="form-group">
            <label for="territory_description">Kratak opis:</label>
            <input type="text" name="territory_description" id="territory_description" class="form-control">
        </div>

        <div class="form-group">
            <label for="region_id">ID regije:</label>
            <input type="text" name="region_id" id="region_id" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
