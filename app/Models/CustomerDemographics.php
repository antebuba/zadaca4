<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDemographics extends Model
{
    protected $fillable = [
        'CustomerTypeID',
        'CustomerDesc'

        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;
    protected $table = 'customerdemographics';
    protected $primaryKey = 'CustomerTypeID';
}
