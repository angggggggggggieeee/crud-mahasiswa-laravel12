<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // ======================
    // TAMPIL DATA MATAKULIAH
    // ======================
    public function index()
    {
        $data = Matakuliah::all();
        return view('matakuliah.index', compact('data'));
    }

    // ======================
    // LIHAT DETAIL / MAHASISWA PER MK
    // (INI YANG DIPANGGIL route matakuliah.show)
    // ======================
    public function show($id)
    {
        $matakuliah = Matakuliah::with('mahasiswa')
            ->findOrFail($id);

        return view('matakuliah.show', compact('matakuliah'));
    }

    // ======================
    // FORM TAMBAH
    // ======================
    public function create()
    {
        return view('matakuliah.create');
    }

    // ======================
    // SIMPAN DATA
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk'  => 'required|unique:matakuliahs,kode_mk',
            'nama_mk'  => 'required',
            'sks'      => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8'
        ]);

        Matakuliah::create($request->all());

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan');
    }

    // ======================
    // FORM EDIT
    // ======================
    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    // ======================
    // UPDATE DATA
    // ======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk'  => 'required',
            'nama_mk'  => 'required',
            'sks'      => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8'
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all());

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui');
    }

    // ======================
    // HAPUS DATA
    // ======================
    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus');
    }
}