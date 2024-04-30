<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTerritories extends Model
{
    protected $fillable = [
        'EmployeeID',
        'TerritoryID'

        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;
    protected $table = 'employeeterritories';
    protected $primaryKey = 'EmployeeID';

    public function employees()
    {
        return $this->belongsTo(Employees::class, 'EmployeeID', 'EmployeeID');
    }

    public function territories()
    {
        return $this->belongsTo(Territories::class, 'TerritoryID', 'TerritoryID');
    }
}
