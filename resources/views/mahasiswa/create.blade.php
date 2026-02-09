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
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('mahasiswa.store') }}">
                @csrf

                <div class="mb-3">
                    <input class="form-control" name="nim" placeholder="NIM">
                </div>

                <div class="mb-3">
                    <input class="form-control" name="nama" placeholder="Nama">
                </div>

                <div class="mb-3">
                    <input class="form-control" name="kelas" placeholder="Kelas">
                </div>

                <div class="mb-3">
                    <input class="form-control" name="matakuliah" placeholder="Mata Kuliah">
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>