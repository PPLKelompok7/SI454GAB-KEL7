<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Detail Konseling {{ $data->mahasiswa->name }}</title>

    <style>
        *{
            color: black;
            text-transform:capitalize;
        }
        .bg-blue * {
            color: inherit;
        }
        
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff !important;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Konseling Mahasiswa</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Nama Mahasiswa: {{ $data->mahasiswa->name }}</span> <br>
                    <span>Date: {{ date('d / m / Y') }}</span> <br>
                    <span>Address: Jl. Sagan No.1, Terban, Gondokusuman, Kota Yogyakarta, DI Yogyakarta </span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Konselor Detail</th>
                <th width="50%" colspan="2">Mahasiswa Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama:</td>
                <td>{{ $data->sesiKonseling->konselor->user->name }}</td>

                <td>Nama:</td>
                <td>{{ $data->mahasiswa->name }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $data->sesiKonseling->konselor->user->email }}</td>

                <td>Email:</td>
                <td>{{ $data->mahasiswa->email }}</td>
            </tr>
            <tr>
                <td>Gambar:</td>
                <td><img src="{{ asset('storage/'.$data->sesiKonseling->konselor->gambar) }}" style="width: 100px" alt=""></td>

                <td>Nim:</td>
                <td>{{ $data->nim }}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{ $data->sesiKonseling->konselor->no_telepon }}</td>

                <td>Jurusan:</td>
                <td>{{ $data->jurusan }}</td>
            </tr>
            <tr>
                <td>nip:</td>
                <td>{{ $data->sesiKonseling->konselor->nip }}</td>

                <td>Fakulitas:</td>
                <td>{{ $data->fakulitas }}</td>
            </tr>
            <tr>
                <td>deskripsi:</td>
                <td>{{ $data->sesiKonseling->konselor->deskripsi }}</td>

                <td>tempat tanggal lahir:</td>
                <td>{{ \Carbon\Carbon::parse($data->tempat_tanggal_lahir)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td>hari</td>
                <td>{{ $data->sesiKonseling->hari }}</td>

                <td>Phone</td>
                <td>{{ $data->phone }}</td>
            </tr>
            <tr>
                <td>Sesi</td>
                <td>{{ $data->sesiKonseling->sesi }}</td>

                <td>keluhan</td>
                <td>{{ $data->keluhan }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>

                <td>link</td>
                <td><a style="color: rgba(0, 0, 221, 0.637)" href="{{ $data->link }}" target="_blank">{{ $data->link }}</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>

                <td>Kesimpulan</td>
                <td>{{ $data->kesimpulan }}</td>
            </tr>
            <tr>
                <td colspan="2">Status Konseling:</td>
                <td colspan="2" style="font-weight: bold">{{ $data->status }}</span></td>

                {{-- <td>Pin code:</td> --}}
                {{-- <td>{{ $data->pincode }}</td> --}}
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terima Kasih Telah Menggunakan Konseling Mahasiswa❤️
    </p>

    <script>
        window.print();
    </script>
</body>
</html>