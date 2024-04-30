@extends('territories.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis teritorija</h1>
                        <a href="{{ route('territories.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi teritorij</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID</th>
                                        <th style="padding-right: 50px;">Opis</th>
                                        <th style="padding-right: 50px;">ID regije</th>
                                        <!-- Dodajte ovaj th za akcije -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($territories as $territory)
                                        <tr>
                                            <td>{{ $territory->TerritoryID }}</td>
                                            <td>{{ $territory->TerritoryDescription }}</td>
                                            <td>{{ $territory->RegionID }}</td>
                                            <td>
                                                <a href="{{ route('territories.edit', ['territory' => $territory->TerritoryID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('territories.destroy', ['TerritoryID' => $territory->TerritoryID]) }}" method="POST" style="display: inline;">
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
