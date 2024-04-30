<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
{
    protected $fillable = [
        'ShipperID',
        'ShipperName',
        'Phone'


        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;

    protected $primaryKey = 'ShipperID';
}
