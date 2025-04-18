<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicationClass extends Model
{
    use HasFactory;

    protected $fillable = ['medication_id'];

    public function classNames()
    {
        return $this->hasMany(MedicationClassName::class);
    }
}
