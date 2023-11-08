@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Layanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Layanan</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Layanan</h6>
                <a href="{{url('admin/layanan/create')}}">
                    <button type=" button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Nama Layanan</th>
                                <th class="text-bold" scope="col">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanan as $lyn)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$lyn->nama_layanan}}</td>
                                <td>{{$lyn->biaya}}</td>
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
