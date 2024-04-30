<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'OrderDetailID',
        'OrderID',
        'ProductID',
        'Quantity',
        'Discount'
    ];

    public $timestamps = false;
    protected $table = 'orderdetails';
    protected $primaryKey = 'OrderDetailID';

    // Definicija stranih ključeva
    public function order()
    {
        return $this->belongsTo(Orders::class, 'OrderID', 'OrderID');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'ProductID', 'ProductID');
    }
}
