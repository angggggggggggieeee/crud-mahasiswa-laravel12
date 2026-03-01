<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eef2f7">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Data Mahasiswa</h4>

                <div>
                    <!-- ✅ Tombol Cetak PDF (TAMBAHAN) -->
                    <a href="{{ route('mahasiswa.cetak.pdf') }}" 
                       class="btn btn-danger me-2">
                        Cetak PDF
                    </a>

                    <a href="{{ route('mahasiswa.create') }}" 
                       class="btn btn-primary">
                        + Tambah Mahasiswa
                    </a>
                </div>
            </div>

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Mata Kuliah</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $m)
                        <tr>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->kelas }}</td>
                            <td>
                                {{ $m->matakuliah ? $m->matakuliah->nama_mk : '-' }}
                            </td>
                            <td class="text-center">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('mahasiswa.edit', $m->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- Tombol Hapus hanya untuk email @ikmi.ac.id --}}
                                @if(str_ends_with(auth()->user()->email, '@ikmi.ac.id'))
                                <form action="{{ route('mahasiswa.destroy', $m->id) }}" 
                                      method="POST" 
                                      style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">
                                        Hapus
                                    </button>
                                </form>
                                @endif

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-top pt-3 mt-3 text-end">
                <small class="text-muted">
                    Dibuat oleh <strong>{{ auth()->user()->name }}</strong>
                </small>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>