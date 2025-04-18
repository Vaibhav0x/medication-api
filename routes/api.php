<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicationController;


Route::get('/medications', [MedicationController::class, 'index']);
Route::post('/medications', [MedicationController::class, 'store']);
