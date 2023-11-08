@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Kurir</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Kurir</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Kurir</h6>
                <a href="{{route('kurir.create')}}">
                    <button type="button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Nama</th>
                                <th class="text-bold" scope="col">nomor tpl</th>
                                <th class="text-bold" scope="col">jadwal</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kurir as $k)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$k->nama_kurir}}</td>
                                    <td>{{$k->nomor_telepon}}</td>
                                    <td>{{$k->jadwal}}</td>
                                  
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