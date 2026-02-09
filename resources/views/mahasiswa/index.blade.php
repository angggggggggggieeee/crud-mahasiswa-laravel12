<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eef2f7">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h3>Data Mahasiswa</h3>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    + Tambah Mahasiswa
                </a>
            </div>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->kelas }}</td>
                        <td>{{ $m->matakuliah }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>