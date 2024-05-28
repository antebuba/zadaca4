@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis zaposlenika</h1>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi zaposlenik</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID</th>
                                        <th style="padding-right: 50px;">Prezime</th>
                                        <th style="padding-right: 50px;">Ime</th>
                                        <th style="padding-right: 50px;">Datum rođenja</th>
                                        <th style="padding-right: 50px;">Slika</th>
                                        <th style="padding-right: 50px;">Opis</th>
                                        <th style="padding-right: 50px;">Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->EmployeeID }}</td>
                                            <td>{{ $employee->LastName }}</td>
                                            <td>{{ $employee->FirstName }}</td>
                                            <td>{{ $employee->BirthDate }}</td>
                                            <td>{{ $employee->Photo }}</td>
                                            <td>{{ $employee->Notes }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', ['employee' => $employee->EmployeeID]) }}" class="btn btn-primary">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <form action="{{ route('employees.destroy', ['employee' => $employee->EmployeeID]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite izbrisati ovog zaposlenika?')">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Izbriši
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
