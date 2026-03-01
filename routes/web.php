<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route yang harus login
Route::middleware(['auth'])->group(function () {

    // ✅ CETAK PDF (HARUS DI ATAS resource)
    Route::get('/mahasiswa/cetak-pdf',
        [MahasiswaController::class, 'cetakPdf']
    )->name('mahasiswa.cetakPdf');

    // ✅ Route Mahasiswa (CRUD)
    Route::resource('mahasiswa', MahasiswaController::class);

    // ✅ Route Matakuliah (CRUD)
    Route::resource('matakuliah', MatakuliahController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';