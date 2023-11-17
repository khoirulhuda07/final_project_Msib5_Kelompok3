<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detail Pengiriman Paket</title>
  <style>
body {
  font-family: sans-serif;
}

table {
  width: 100%;
  border-collapse: collapse;
  background-color: #F5F5F5;
}

th, td {
  border: 1px solid black;
  padding: 10px;
}

th {
  background-color: #E0E0E0;
  font-weight: bold;
}

h1 {
  text-align: center;
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

li {
  margin-bottom: 5px;
}
  </style>
</head>
<body>
    <h1>Detail Pengiriman Paket</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Lokasi Penerima</th>
                <th>Nama Penerima</th>
                <th>Nama Layanan</th>
                <th>Detail Paket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanKirim as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->kode}}</td>
                    <td>{{$row->tanggal}}</td>
                    <td>{{$row->lokasi_tujuan}}/td>
                    <td>{{$row->penerima->nama}}</td>
                    <td>{{$row->layanan->nama_layanan}}</td>
                    <td>
                        <ul>
                            <li>Berat: {{$row->paket->berat}} kg</li>
                            <li>Isi: {{$row->paket->deskripsi}}</li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
