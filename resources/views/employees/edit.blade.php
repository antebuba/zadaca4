@extends('employees.layout')

@section('content')

    <h1>Uredi zaposlenika</h1>

    <form action="{{ route('employees.update', ['EmployeeID' => $employee->EmployeeID]) }}" method="POST">

        @csrf

        @method('PUT')

        <label for="LastName">Prezime:</label>

        <input type="text" name="LastName" value="{{ $employee->LastName }}">



        <label for="FirstName">Ime:</label>

        <input type="text" name="FirstName" value="{{ $employee->FirstName }}">



        <label for="BirthDate">Datum rođenja:</label>

        <input type="text" name="BirthDate" value="{{ $employee->BirthDate }}">



        <label for="Photo">Slika:</label>

        <input type="text" name="Photo" value="{{ $employee->Photo }}">



        <label for="Notes">Opis:</label>

        <input type="text" name="Notes" value="{{ $employee->Notes }}">



        <button type="submit">Spremi promjene</button>

    </form>

@endsection
