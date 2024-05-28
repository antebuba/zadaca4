<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'LastName',
        'FirstName',
        'BirthDate',
        'Photo',
        'Notes',
        // Dodajte ostala polja koja želite omogućiti masovno dodjeljivanje
    ];
    public $timestamps = false;

    protected $primaryKey = 'EmployeeID';

    public function orders()
    {
        return $this->hasMany(Orders::class, 'EmployeeID', 'EmployeeID');
    }
}
