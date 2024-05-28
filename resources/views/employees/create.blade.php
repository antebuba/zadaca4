@extends('employees.layout')

@section('content')
    <h1>Novi zaposlenik</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="last_name">Prezime zaposlenika:</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="first_name">Ime zaposlenika:</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="birth_date">Datum rođenja:</label>
            <input type="text" name="birth_date" id="birth_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="photo">Slika:</label>
            <input type="text" name="photo" id="photo" class="form-control">
        </div>
        <div class="form-group">
            <label for="notes">Kratak opis:</label>
            <input type="text" name="notes" id="notes" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
@endsection
