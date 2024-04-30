<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('region.layout')

@section('content')
    <h1>Nova regija</h1>
    <form action="{{ route('region.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="region_id">Id regije:</label>
            <input type="text" name="region_id" id="region_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="region_desc">Kratak opis:</label>
            <input type="text" name="region_desc" id="region_desc" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
