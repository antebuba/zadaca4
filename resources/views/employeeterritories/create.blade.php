<!-- resources/views/categories/create.blade.php -->
<head><link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('employeeterritories.layout')

@section('content')
    <h1>Novi teritorij</h1>
    <form action="{{ route('employeeterritories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">ID zaposlenika:</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="territory_id">ID teritorija:</label>
            <input type="text" name="territory_id" id="territory_id" class="form-control">
        </div>

    
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
