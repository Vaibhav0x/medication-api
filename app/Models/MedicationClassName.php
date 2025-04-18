<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicationClassName extends Model
{
    use HasFactory;

    protected $fillable = ['medication_class_id', 'name'];

    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
