@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Paket</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Paket</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Paket</h6>
                <a href="{{route('paket.create')}}">
                    <button type=" button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Berat</th>
                                <th class="text-bold" scope="col">Deskripsi</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $pk)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$pk->berat}}</td>
                                <td>{{$pk->deskripsi}}</td>
                                <td>
                                <form action="{{route('paket.destroy',$pk->id)}}" method="post">
                                    <a href="{{route('paket.show',$pk->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('paket.edit',$pk->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
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
