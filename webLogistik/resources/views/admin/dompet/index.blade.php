@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Dompet</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Dompet</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Dompet</h6>
                <a href="{{route('dompet.create')}}">
                    <button type="button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Saldo</th>
                                <th class="text-bold" scope="col">Diskon</th>
                                <th class="text-bold" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dompet as $d)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$d->saldo}}</td>
                                    <td>{{$d->bonus}}</td>
                                    <td>
                                    <a href="{{route('dompet.show',$d->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('dompet.edit',$d->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$d->id}}">
                                        <i class="fas fa-trash"></i>
                                        </button>     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$d->id}} ?
                                          </div>
                                          <div class="modal-footer">
                                            <form action="{{route('dompet.destroy',$d->id)}}" method="POST">
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