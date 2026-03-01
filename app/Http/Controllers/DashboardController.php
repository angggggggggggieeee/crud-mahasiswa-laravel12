<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalMatakuliah = Matakuliah::count();

        return view('dashboard', compact(
            'totalMahasiswa',
            'totalMatakuliah'
        ));
    }
}