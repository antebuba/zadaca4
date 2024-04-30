<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territories extends Model
{
    use HasFactory;

    protected $fillable = [
        'TerritoryID',
        'TerritoryDescription',
        'RegionID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'TerritoryID';

    // Definicija stranih ključeva
    public function region()
    {
        return $this->belongsTo(Region::class, 'RegionID', 'RegionID');
    }
}
