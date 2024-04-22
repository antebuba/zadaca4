@extends('employees.layout')

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
                                        <th style="padding-right: 40px;">ID</th>
                                        <th style="padding-right: 40px;">Prezime zaposlenika</th>
                                        <th style="padding-right: 40px;">Ime zaposlenika</th>
                                        <th style="padding-right: 40px;">Datum rođenja</th> <!-- Dodajte ovaj th za akcije -->
                                        <th style="padding-right: 40px;">Slika</th> 
                                        <th style="padding-right: 40px;">Kratak opis</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employ)
                                        <tr>
                                            <td>{{ $employ->EmployeeID }}</td>
                                            <td>{{ $employ->LastName }}</td>
                                            <td>{{ $employ->FirstName }}</td>
                                            <td>{{ $employ->BirthDate }}</td>
                                            <td>{{ $employ->Photo }}</td>
                                            <td>{{ $employ->Notes }}</td>
                                            
                                            <td>
                                                <a href="{{ route('employees.edit', ['employee' => $employ->EmployeeID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('employees.destroy', ['EmployeeID' => $employ->EmployeeID]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite izbrisati ovu kategoriju?')">
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
