<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eef2f7">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <h3 class="mb-4">Edit Mata Kuliah</h3>

            <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Kode MK</label>
                    <input type="text" name="kode_mk" 
                           value="{{ $matakuliah->kode_mk }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama MK</label>
                    <input type="text" name="nama_mk" 
                           value="{{ $matakuliah->nama_mk }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>SKS</label>
                    <input type="number" name="sks" 
                           value="{{ $matakuliah->sks }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Semester</label>
                    <input type="number" name="semester" 
                           value="{{ $matakuliah->semester }}" 
                           class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Update
                </button>
                <a href="{{ route('matakuliah.index') }}" 
                   class="btn btn-secondary">
                   Kembali
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>