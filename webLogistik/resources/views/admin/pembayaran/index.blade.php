@extends('admin.template.appadmin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mt-4">Pembayaran</h1>
        <ol class="breadcrumb mb-4 bg-white">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Pembayaran</h6>
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah <i class="fa-solid fa-plus"></i></a>
                    </a>
                    <div class="table-responsive">
                        <table id="datapegawai" class="table">
                            <thead>
                                <tr>
                                    <th class="text-bold" scope="col">No</th>
                                    <th class="text-bold" scope="col">Metode</th>
                                    <th class="text-bold" scope="col">Harga Total</th>
                                    <th class="text-bold" scope="col">Keterangan</th>
                                    <th class="text-bold" scope="col">Kode Pengiriman</th>
                                    <th class="text-bold" scope="col">Username</th>
                                    <th class="text-bold" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $pyr)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pyr->metode }}</td>
                                        <td>Rp. {{ $pyr->harga_total }}</td>
                                        <td>{{ $pyr->keterangan }}</td>
                                        <td>{{ $pyr->pengiriman->kode }}</td>
                                        <td>{{ $pyr->users->username }}</td>
                                        <td>
                                            <a href="{{ route('pembayaran.show', $pyr->id) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('pembayaran.edit', $pyr->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $pyr->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $pyr->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data {{ $pyr->id }} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('pembayaran.destroy', $pyr->id) }}"
                                                                method="POST">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
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
