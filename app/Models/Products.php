<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductID',
        'ProductName',
        'SupplierID',
        'CategoryID',
        'Unit',
        'Price'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ProductID';

    // Definicija stranih ključeva

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'order_details', 'ProductID', 'OrderID');
    }


    public function supplier()
    {
        return $this->hasOne(Suppliers::class, 'SupplierID', 'SupplierID');
    }



    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'CategoryID');
    }
}
