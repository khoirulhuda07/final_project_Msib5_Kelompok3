@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Penerima</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Penerima</li>
        <li class="breadcrumb-item active">Penerima</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Penerima</h6>
                <a href="{{route('penerima.create')}}">
                    <button type="button"class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Nama</th>
                                <th class="text-bold" scope="col">Nomor_Telepon</th>
                                <th class="text-bold" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penerima as $pnr)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$pnr->nama}}</td>
                                <td>{{$pnr->nomor_telepon}}</td>
                                <td>
                                        <a href="{{route('penerima.show',$pnr->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('penerima.edit',$pnr->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$pnr->id}}">
                                                <i class="fas fa-trash"></i>
                                                </button>     
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$pnr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    Apakah anda yakin akan menghapus data {{$pnr->nama}} ?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form action="{{route('penerima.destroy',$pnr->id)}}" method="POST">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
