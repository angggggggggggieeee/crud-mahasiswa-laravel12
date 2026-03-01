<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #eef2f7;">

<div class="container mt-5">

    <div class="card shadow rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Data Mahasiswa</h4>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    + Tambah Mahasiswa
                </a>
            </div>

            <table class="table table-bordered table-striped text-center align-middle">
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
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->kelas }}</td>
                        <td>{{ $mhs->mata_kuliah }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tambahan Dibuat oleh Admin -->
            <div class="text-end mt-3">
                <small class="text-muted">Dibuat oleh <strong>Admin</strong></small>
            </div>

        </div>
    </div>

</div>

</body>
</html>