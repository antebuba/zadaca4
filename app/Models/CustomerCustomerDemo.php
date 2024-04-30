<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCustomerDemo extends Model
{
    protected $fillable = [
        'CustomerID',
        'CustomerTypeID'

        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;

    protected $primaryKey = 'CustomerID';
    protected $table = 'customercustomerdemo';
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'CustomerID', 'CustomerID');
    }

    public function customerdemographics()
    {
        return $this->hasMany(CustomerDemographics::class, 'CustomerTypeID', 'CustomerTypeID');
    }
}
