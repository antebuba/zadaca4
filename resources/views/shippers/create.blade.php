<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('shippers.layout')

@section('content')
    <h1>Novi otpremnik</h1>
    <form action="{{ route('shippers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="shipper_name">Ime otpremnika:</label>
            <input type="text" name="shipper_name" id="shipper_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Telefon:</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
