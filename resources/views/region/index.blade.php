@extends('region.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Regije</h1>
                        <a href="{{ route('region.create') }}" class="btn btn-primary mb-3">
                            <button>+ Nova regija</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 40px;">ID</th>
                                        <th style="padding-right: 40px;">Opis regije</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($region as $regionn)
                                        <tr>
                                            <td>{{ $regionn->RegionID }}</td>
                                            <td>{{ $regionn->RegionDescription }}</td>
                                           
                                            
                                            <td>
                                                <a href="{{ route('region.edit', ['region' => $regionn->RegionID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('region.destroy', ['RegionID' => $regionn->RegionID]) }}" method="POST" style="display: inline;">
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
