@extends('customers.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis kupaca</h1>
                        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi kupac</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 40px;">ID</th>
                                        <th style="padding-right: 40px;">Naziv kupca</th>
                                        <th style="padding-right: 40px;">Kontakt</th>
                                        <th style="padding-right: 40px;">Adresa</th> <!-- Dodajte ovaj th za akcije -->
                                        <th style="padding-right: 40px;">Grad</th>
                                        <th style="padding-right: 40px;">Postanski broj</th>
                                        <th style="padding-right: 40px;">Drzava</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->CustomerID }}</td>
                                            <td>{{ $customer->CustomerName }}</td>
                                            <td>{{ $customer->ContactName }}</td>
                                            <td>{{ $customer->Address }}</td>
                                            <td>{{ $customer->City }}</td>
                                            <td>{{ $customer->PostalCode }}</td>
                                            <td>{{ $customer->Country }}</td>
                                            <td>
                                                <a href="{{ route('customers.edit', ['customer' => $customer->CustomerID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('customers.destroy', ['CustomerID' => $customer->CustomerID]) }}" method="POST" style="display: inline;">
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
