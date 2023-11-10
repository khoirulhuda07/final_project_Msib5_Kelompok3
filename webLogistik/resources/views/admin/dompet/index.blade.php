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
                                    <form action="{{route('dompet.destroy',$d->id)}}" method="POST">
                                    <a href="{{route('dompet.show',$d->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('dompet.edit',$d->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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