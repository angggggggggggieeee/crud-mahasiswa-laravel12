<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    /**
     * Menampilkan halaman welcome dengan data nama dan mata kuliah
     * Implementasi untuk Tugas Mandiri No. 2
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Data yang dikirim dari Controller ke View
        $data = [
            'nama' => 'Mahasiswa STMIK IKMI',
            'semester' => 4,
            'mataKuliah' => [
                'Pemrograman Web Lanjut',
                'Manajemen Proyek Sistem Informasi',
                'Business Digital',
                'Interaksi Manusia dan Komputer',
                'Data Mining',
                'AI Automation',
            
            ]
        ];
        
        // Catatan: Logika ini dikembangkan dengan bantuan DeepSeek
        // untuk memahami cara mengirim data array dari Controller ke View
        return view('welcome_mahasiswa', $data);
    }

    /**
     * Method lainnya tetap dipertahankan
     */
    public function store(Request $request)
    {
        // ... 
    }
}