@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach($kurir as $k)
<form action="{{route('penerima.update',$pn->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Kurir</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="{{$k->nama}}">
                  <label for="floatingKode">Nama</label>
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="no_tlp" class="form-control" id="floatingKategori" placeholder="Masukkan No Telp" value="{{$k->nomor_telepon}}">
                  <label for="floatingKategori">Nomor Telepon</label>
                </div>

                <!-- input ketiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="jadwal" class="form-control" id="floatingKategori" placeholder="Masukkan Jadwal" value="{{$k->jadwal}}">
                  <label for="floatingKategori">Jadwal</label>
                </div>
                <br>
                    <button name="proses" value="save" type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </div>
    </div>
</form>
@endforeach
<!-- form end -->
@endsection