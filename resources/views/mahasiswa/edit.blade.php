@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Data Mahasiswa</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control"
                                value="{{ $mahasiswa->nim }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ $mahasiswa->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control"
                                value="{{ $mahasiswa->kelas }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="matakuliah_id" class="form-select">
                                @foreach($matakuliahs as $mk)
                                    <option value="{{ $mk->id }}"
                                        {{ $mahasiswa->matakuliah_id == $mk->id ? 'selected' : '' }}>
                                        {{ $mk->nama_mk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-success">
                                Update Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection