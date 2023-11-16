<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laporan TopUp Saldo Dompet</title>
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
    <h1>TopUp Saldo Dompet</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu</th>
                <th>Jumlah TopUp</th>
                <th>Bonus Poin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanTopUp as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->waktu}}</td>
                    <td>{{$row->saldo}}</td>
                    <td>{{$row->bonus}}/td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
