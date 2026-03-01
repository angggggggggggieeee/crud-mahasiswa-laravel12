<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['matakuliah', 'user'])->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $matakuliahs = Matakuliah::all();
        return view('mahasiswa.create', compact('matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim',
            'nama'          => 'required',
            'kelas'         => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        Mahasiswa::create([
            'nim'           => $request->nim,
            'nama'          => $request->nama,
            'kelas'         => $request->kelas,
            'matakuliah_id' => $request->matakuliah_id,
            'user_id'       => auth()->id()
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil disimpan');
    }

    public function edit($id)
    {
        $mahasiswa   = Mahasiswa::findOrFail($id);
        $matakuliahs = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'matakuliahs'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim,' . $id,
            'nama'          => 'required',
            'kelas'         => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $mahasiswa->update([
            'nim'           => $request->nim,
            'nama'          => $request->nama,
            'kelas'         => $request->kelas,
            'matakuliah_id' => $request->matakuliah_id
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        if (!str_ends_with(auth()->user()->email, '@ikmi.ac.id')) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Hanya user dengan email @ikmi.ac.id yang bisa menghapus data.');
        }

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }

    // ===================================
    // ✅ CETAK PDF (SUDAH DIPERBAIKI)
    // ===================================
    public function cetakPdf()
    {
        $mahasiswas = Mahasiswa::with('matakuliah')->get();

        $pdf = Pdf::loadView('mahasiswa.laporan_pdf', compact('mahasiswas'));

        return $pdf->download('laporan-mahasiswa.pdf');
    }
}