<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <h1>Laporan Transaksi</h1>
    <table class="">
        <thead>
            <tr>
                <th>No</th>
                <th>No Polisi</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Waktu Sewa</th>
                <th>Tanggal Sewa</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $data->mobil->nopolisi }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->lama }} Hari</td>
                    <td>{{ $data->tgl_pesan }}</td>
                    <td>@rupiah($data->total)</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Data Laporan Belum Ada !!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
