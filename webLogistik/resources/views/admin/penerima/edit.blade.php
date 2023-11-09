@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach($penerima as $pn)
<form action="{{url('admin/penerima/update/'.$pn->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Penerima</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="nama" class="form-control" id="floatingKode" placeholder="Masukkan nama" value="{{$pn->nama}}">
                  <label for="floatingKode">Nama</label>
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="no_tlp" class="form-control" id="floatingKategori" placeholder="Masukkan No Telp" value="{{$pn->nomor_telepon}}">
                  <label for="floatingKategori">Nomor Telepon</label>
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