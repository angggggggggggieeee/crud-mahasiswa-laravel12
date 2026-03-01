<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Mahasiswa</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 30px;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        hr {
            border: 1px solid black;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 10px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: #f2f2f2;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            padding: 8px;
            text-align: center;
            font-weight: bold;
        }

        td {
            padding: 6px;
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN DATA MAHASISWA</h2>
        <p>Sistem Informasi Akademik</p>
        <p>Universitas / Kampus Anda</p>
    </div>

    <hr>

    <div class="info">
        Tanggal Cetak : {{ date('d-m-Y') }} <br>
        Total Data    : {{ count($mahasiswas) }} Mahasiswa
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">NIM</th>
                <th width="25%">Nama</th>
                <th width="15%">Kelas</th>
                <th width="35%">Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $index => $m)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $m->nim }}</td>
                <td style="text-align:left;">{{ $m->nama }}</td>
                <td>{{ $m->kelas }}</td>
                <td style="text-align:left;">
                    {{ $m->matakuliah->nama_mk ?? '-' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh: {{ auth()->user()->name }} <br><br>
        ___________________________
    </div>

</body>
</html>