<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/Latihan', [LatihanController::class, 'index']);

