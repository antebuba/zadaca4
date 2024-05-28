@extends('categories.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Detalji narudžbe</h1>
                        <a href="{{ route('orderdetails.create') }}" class="btn btn-primary mb-3">
                            <button>+ Nova Narudžba</button>
                        </a>
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="padding-right: 50px;">ID</th>
                                        <th style="padding-right: 50px;">OrderID</th>
                                        <th style="padding-right: 50px;">ID proizvoda</th>
                                        <th style="padding-right: 50px;">UnitPrice</th>
                                        <th style="padding-right: 50px;">Kolicina</th>
                                        <th style="padding-right: 50px;">Popust</th>
                                        <!-- Dodajte ovaj th za akcije -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderdetails as $orderdetail)
                                        <tr>
                                            <td>{{ $orderdetail->OrderDetailID }}</td>
                                            <td>{{ $orderdetail->OrderID }}</td>
                                            <td>{{ $orderdetail->ProductID }}</td>
                                            <td>{{ $orderdetail->UnitPrice }}</td>
                                            <td>{{ $orderdetail->Quantity }}</td>
                                            <td>{{ $orderdetail->Discount }}</td>
                                            
                                            <td>
                                                
                                                <!-- Dodajte gumb za brisanje -->
                                                <form action="{{ route('orderdetails.destroy', ['OrderID' => $orderdetail->OrderDetailID]) }}" method="POST" style="display: inline;">
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
