<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f0f4f8">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4">Tambah Mahasiswa</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('mahasiswa.store') }}">
                @csrf

                <div class="mb-3">
                    <input 
                        type="text"
                        class="form-control" 
                        name="nim" 
                        placeholder="NIM"
                        value="{{ old('nim') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <input 
                        type="text"
                        class="form-control" 
                        name="nama" 
                        placeholder="Nama"
                        value="{{ old('nama') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <input 
                        type="text"
                        class="form-control" 
                        name="kelas" 
                        placeholder="Kelas"
                        value="{{ old('kelas') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Mata Kuliah</label>
                    <select name="matakuliah_id" class="form-control" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($matakuliahs as $mk)
                            <option 
                                value="{{ $mk->id }}"
                                {{ old('matakuliah_id') == $mk->id ? 'selected' : '' }}
                            >
                                {{ $mk->nama_mk }} ({{ $mk->kode_mk }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>