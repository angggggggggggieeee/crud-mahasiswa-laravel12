@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Daftar Mahasiswa</h3>

    <h5>Mata Kuliah: {{ $matakuliah->nama_mk }}</h5>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matakuliah->mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->kelas }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    Belum ada mahasiswa
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

@endsection