@extends('employeeterritories.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Teritorij zaposlenika</h1>
                        <a href="{{ route('employeeterritories.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi teritorij</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 40px;">ID zaposlenika</th>
                                        <th style="padding-right: 40px;">ID teritorija</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeeterritories as $employeeterritory)
                                        <tr>
                                            <td>{{ $employeeterritory->EmployeeID }}</td>
                                            <td>{{ $employeeterritory->TerritoryID }}</td>
                                            
                                            
                                            <td>
                                                <a href="{{ route('employeeterritories.edit', ['employeeterritory' => $employeeterritory->EmployeeID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('employeeterritories.destroy', ['EmployeeID' => $employeeterritory->EmployeeID]) }}" method="POST" style="display: inline;">
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
