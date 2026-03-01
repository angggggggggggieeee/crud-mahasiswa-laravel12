@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Data Mata Kuliah</h2>

    <a href="{{ route('matakuliah.create') }}" class="btn btn-success mb-3">
        Tambah Mata Kuliah
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($data as $mk)
        <tr>
            <td>{{ $mk->kode_mk }}</td>
            <td>{{ $mk->nama_mk }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->semester }}</td>
            <td>

                {{-- PERBAIKAN DI SINI --}}
                <a href="{{ route('matakuliah.show', $mk->id) }}"
                   class="btn btn-info btn-sm">
                   Lihat Mahasiswa
                </a>

                <a href="{{ route('matakuliah.edit', $mk->id) }}"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                Belum ada data mata kuliah
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection