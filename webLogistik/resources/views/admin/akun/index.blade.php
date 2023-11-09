@extends('admin.template.appadmin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Akun</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Akun</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Akun</h6>
                <a href="{{route('akun.create')}}">
                    <button type="button" class="btn btn-primary btn-sm mb-3">Tambah</button>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Nama Lengkap</th>
                                <th class="text-bold" scope="col">Username</th>
                                <th class="text-bold" scope="col">Email</th>
                                <th class="text-bold" scope="col">Password</th>
                                <th class="text-bold" scope="col">Jabatan</th>
                                <th class="text-bold" scope="col">Alamat</th>
                                <th class="text-bold" scope="col">Saldo Dompet</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>{{$user->level}}</td>
                                    <td>{{$user->alamat}}</td>
                                    <td>{{$user->dompet->saldo}}</td>
                                    <td>
                                        <form action="{{route('akun.destroy',$user->id)}}" method="POST">
                                        <a href="{{route('akun.show',$user->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('akun.edit',$user->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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