<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['medication_class_name_id', 'type', 'name', 'dose', 'strength'];
}

