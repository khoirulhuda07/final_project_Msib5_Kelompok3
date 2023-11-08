@extends('admin.template.appadmin')

@section('content')

<form action="{{url('admin/kurir/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Data kurir</h6>
    <div class="form-floating mb-3">
      <input type="text" name="nama" class="form-control" id="floatingKode" placeholder="Masukkan nama kurir" >
      <label for="floatingKode">Nama Kurir</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="no_tlp" class="form-control" id="floatingKode" placeholder="Masukkan nomor telepon">
      <label for="floatingKode">Nomor Telepon</label>
    </div>
    <!-- input kedua -->
    <div class="form-floating mb-3">
      <input type="text" name="jadwal" class="form-control" id="floatingKode" placeholder="Masukkan jadwal" >
      <label for="floatingKode">Jadwal</label>
    </div>     
    <!-- input ke tiga -->
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection