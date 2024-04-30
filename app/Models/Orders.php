<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customers;
use App\Models\Employees;
use App\Models\Shippers;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'OrderID',
        'CustomerID',
        'EmployeeID',
        'OrderDate',
        'ShipperID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'OrderID';

    // Definicija stranih ključeva
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'CustomerID', 'CustomerID');
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'EmployeeID', 'EmployeeID');
    }

    public function shipper()
    {
        return $this->belongsTo(Shippers::class, 'ShipperID', 'ShipperID');
    }
}
