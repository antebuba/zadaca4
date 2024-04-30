<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('orders.layout')

@section('content')
    <h1>Nova narudžba</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="order_id">ID narudžbe:</label>
            <input type="text" name="order_id" id="order_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="customer_id">ID kupca:</label>
            <input type="text" name="customer_id" id="customer_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="employee_id">ID zaposlenika:</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="order_date">Datum narudžbe:</label>
            <input type="text" name="order_date" id="order_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="shipper_id">ID otpremnika:</label>
            <input type="text" name="shipper_id" id="shipper_id" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
