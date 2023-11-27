<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Pengiriman Paket</title>
    <style>
        html,
    	body {
    		height: 100%;
    	}

    	body {
    		margin: 0;
    		background: linear-gradient(45deg, #49a09d, #5f2c82);
    		font-family: sans-serif;
    		font-weight: 100;
    	}

    	h1 {
			text-align: center;
		}

		.container {
			display: flex;
			justify-items: center;
			justify-content: center;
		}

    	table {
    		width: 800px;
    		border-collapse: collapse;
    		overflow: hidden;
    		box-shadow: 0 0 20px rgba(0,0,0,0.1);
    	}

    	th,
    	td {
    		padding: 15px;
    		background-color: rgba(255,255,255,0.2);
    		color: #fff;
    	}

    	th {
    		text-align: left;
    	}

    	thead {
    		th {
    			background-color: #55608f;
    		}
    	}

    	tbody {
    		tr {
    			&:hover {
    				background-color: rgba(255,255,255,0.3);
    			}
    		}
    		td {
    			position: relative;
    			&:hover {
    				&:before {
    					content: "";
    					position: absolute;
    					left: 0;
    					right: 0;
    					top: -9999px;
    					bottom: -9999px;
    					background-color: rgba(255,255,255,0.2);
    					z-index: -1;
    				}
    			}
    		}
    	}
    </style>
</head>

<body>
    <h1>Detail Pengiriman Paket</h1>
    <div class="container">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->lokasi_tujuan }}</td>
                        <td>{{ $row->penerima->nama }}</td>
                        <td>{{ $row->layanan->nama_layanan }}</td>
                        <td>
                            <ul>
                                <li>Berat: {{ $row->paket->berat }} kg</li>
                                <li>Isi: {{ $row->paket->deskripsi }}</li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
