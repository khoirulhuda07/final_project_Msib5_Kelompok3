@extends('admin.template.appadmin')

@section('title', 'Table Data Paket')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Paket</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Paket</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Paket</h6>
                <a href="{{ route('paket.create') }}" class="btn btn-primary mb-3">Tambah <i class="fa-solid fa-plus"></i></a>
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
                                <td>{{$pk->berat}} Kg</td>
                                <td>{{$pk->deskripsi}}</td>
                                <td>
                                    <a href="{{route('paket.edit',$pk->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$pk->id}}">
                                        <i class="fas fa-trash"></i>
                                        </button>     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$pk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$pk->deskripsi}} ?
                                          </div>
                                          <div class="modal-footer">
                                            <form action="{{route('paket.destroy',$pk->id)}}" method="POST">
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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
