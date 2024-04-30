<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
        'SupplierID',
        'SupplierName',
        'ContactName',
        'Address',
        'City',
        'PostalCode',
        'Country',
        'Phone'

        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;

    protected $primaryKey = 'SupplierID';
}
