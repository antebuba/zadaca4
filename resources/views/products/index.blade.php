@extends('products.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis proizvoda</h1>
                        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi Proizvod</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID</th>
                                        <th style="padding-right: 50px;">Naziv proizvoda:</th>
                                        <th style="padding-right: 50px;">ID dobavljača</th>
                                        <th style="padding-right: 50px;">ID kategorije</th> <!-- Dodajte ovaj th za akcije -->
                                        <th style="padding-right: 50px;">Jedinica</th>
                                        <th style="padding-right: 50px;">Cijena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->ProductID }}</td>
                                            <td>{{ $product->ProductName }}</td>
                                            <td>{{ $product->SupplierID }}</td>
                                            <td>{{ $product->CategoryID }}</td>
                                            <td>{{ $product->Unit }}</td>
                                            <td>{{ $product->Price }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', ['product' => $product->ProductID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('products.destroy', ['ProductID' => $product->ProductID]) }}" method="POST" style="display: inline;">
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
