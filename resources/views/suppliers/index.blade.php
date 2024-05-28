@extends('suppliers.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis dobavljača</h1>
                        <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi dobavljač</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 40px;">ID</th>
                                        <th style="padding-right: 40px;">Naziv dobavljača</th>
                                        <th style="padding-right: 40px;">Kontakt</th>
                                        <th style="padding-right: 40px;">Adresa</th> <!-- Dodajte ovaj th za akcije -->
                                        <th style="padding-right: 40px;">Grad</th>
                                        <th style="padding-right: 40px;">Postanski broj</th>
                                        <th style="padding-right: 40px;">Drzava</th>
                                        <th style="padding-right: 40px;">Telefon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->SupplierID }}</td>
                                            <td>{{ $supplier->SupplierName }}</td>
                                            <td>{{ $supplier->ContactName }}</td>
                                            <td>{{ $supplier->Address }}</td>
                                            <td>{{ $supplier->City }}</td>
                                            <td>{{ $supplier->PostalCode }}</td>
                                            <td>{{ $supplier->Country }}</td>
                                            <td>{{ $supplier->Phone }}</td>
                                            <td>
                                                <a href="{{ route('suppliers.edit', ['supplier' => $supplier->SupplierID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('suppliers.destroy', ['SupplierID' => $supplier->SupplierID]) }}" method="POST" style="display: inline;">
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
