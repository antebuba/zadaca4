@extends('categories.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis otpremika</h1>
                        <a href="{{ route('shippers.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi otpremnik</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID</th>
                                        <th style="padding-right: 50px;">Ime</th>
                                        <th style="padding-right: 50px;">Telefon</th>
                                         <!-- Dodajte ovaj th za akcije -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shippers as $shipper)
                                        <tr>
                                            <td>{{ $shipper->ShipperID }}</td>
                                            <td>{{ $shipper->ShipperName }}</td>
                                            <td>{{ $shipper->Phone }}</td>
                                            <td>
                                                <a href="{{ route('shippers.edit', ['shipper' => $shipper->ShipperID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('shippers.destroy', ['ShipperID' => $shipper->ShipperID]) }}" method="POST" style="display: inline;">
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
