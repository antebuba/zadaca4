@extends('customercustomerdemo.layout')

@section('content')

    <h1>Uredi kupca</h1>

    <form action="{{ route('customercustomerdemo.update', ['CustomerTypeID' => $customercustomerdemoo->CustomerID]) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="CustomerID">ID:</label>
        <input type="text" name="CustomerID" value="{{ $customercustomerdemoo->CustomerID }}">

        <label for="CustomerTypeID">ID:</label>
        <input type="text" name="CustomerTypeID" value="{{ $customercustomerdemoo->CustomerTypeID }}">

        <button type="submit">Spremi promjene</button>

    </form>

@endsection
