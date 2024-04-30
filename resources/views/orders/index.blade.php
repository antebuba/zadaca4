@extends('orders.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Popis narudzba</h1>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">
                            <button>+ Nova narudžba</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID Narudžbe</th>
                                        <th style="padding-right: 50px;">ID kupca</th>
                                        <th style="padding-right: 50px;">ID zaposlenika</th>
                                        <th style="padding-right: 50px;">Datum narudžbe</th> <!-- Dodajte ovaj th za akcije -->
                                        <th style="padding-right: 50px;">ID otpremnice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->OrderID }}</td>
                                            <td>{{ $order->CustomerID }}</td>
                                            <td>{{ $order->EmployeeID }}</td>
                                            <td>{{ $order->OrderDate }}</td>
                                            <td>{{ $order->ShipperID }}</td>
                                            
                                            <td>
                                                
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('orders.destroy', ['OrderID' => $order->OrderID]) }}" method="POST" style="display: inline;">
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
