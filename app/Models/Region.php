<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'RegionID',
        'RegionDescription',


        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;

    protected $primaryKey = 'RegionID';
}
