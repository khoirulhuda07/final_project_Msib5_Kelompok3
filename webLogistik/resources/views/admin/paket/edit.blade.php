@extends('admin.template.appadmin')

@section('content')
@foreach ($paket as $pk)
<form action="{{route('paket.update',$pk->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Ubah Data Paket</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <div class="form-floating mb-3">
                  <input type="text" name="berat" class="form-control" id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="{{$pk->berat}}">
                  <label for="floatingKode">Berat</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="deskripsi" class="form-control" id="floatingKategori" placeholder="Masukkan Tanggal" value="{{$pk->deskripsi}}">
                  <label for="floatingKategori">Deskripsi</label>
                <br>
                    <button name="proses" value="save" type="submit" class="btn btn-warning">Update</button>
                </br>
</div>
</div>
</div>
</div>
@endforeach
@endsection