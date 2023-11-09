@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Pengiriman</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Pengiriman</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Pengiriman</h6>
                <a href="{{route('pengiriman.create')}}">
                    <button type=" button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Kode</th>
                                <th class="text-bold" scope="col">Tanggal</th>
                                <th class="text-bold" scope="col">Lokasi Tujuan</th>
                                <th class="text-bold" scope="col">Id Paket</th>
                                <th class="text-bold" scope="col">Layanan</th>
                                <th class="text-bold" scope="col">Nama Penerima</th>
                                <th class="text-bold" scope="col">Username</th>
                                <th class="text-bold" scope="col">Nama Kurir</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengiriman as $pn)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$pn->kode}}</td>
                                <td>{{$pn->tanggal}}</td>
                                <td>{{$pn->lokasi_tujuan}}</td>
                                <td>{{$pn->paket->id}}</td>
                                <td>{{$pn->layanan->nama_layanan}}</td>
                                <td>{{$pn->penerima->nama}}</td>
                                <td>{{$pn->akun->username}}</td>
                                <td>{{$pn->kurir->nama_kurir}}</td>
                                <td>
                                    <a href="{{route('pengiriman.show',$pn->id)}}"><button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button></a>
                                    <a href="{{route('pengiriman.edit',$pn->id)}}"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                                    <a href="{{url('admin/pengiriman/delete/'.$pn->id)}}"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
