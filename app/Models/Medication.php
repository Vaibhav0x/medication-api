<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function medicationsClasses()
    {
        return $this->hasMany(MedicationClass::class);
    }
}
