@extends('customers.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis kupaca</h1>
                        <a href="{{ route('customercustomerdemo.create') }}" class="btn btn-primary mb-3">
                            <button>+ Novi kupac</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 40px;">CustomerID</th>
                                        <th style="padding-right: 40px;">CustomerTypeID</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customercustomerdemo as $customercustomerdemoo)
                                        <tr>
                                            <td>{{ $customercustomerdemoo->CustomerID }}</td>
                                            <td>{{ $customercustomerdemoo->CustomerTypeID}}</td>
                                            
                                            <td>
                                                <a href="{{ route('customercustomerdemo.edit', ['customercustomerdemoo' => $customercustomerdemoo->CustomerID]) }}" class="btn btn-primary">

                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi
                                                    </button>
                                                </a>
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('customercustomerdemo.destroy', ['CustomerID' => $customercustomerdemoo->CustomerID]) }}" method="POST" style="display: inline;">
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
