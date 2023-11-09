@extends('admin.template.appadmin')

@section('content')
@foreach ($dompet as $d)
<form action="{{route('dompet.edit'.$d->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Tambah Data Dompet</h6>
    <div class="form-floating mb-3">
      <input type="text" name="saldo" class="form-control" id="floatingKode" placeholder="Masukkan nama kurir" value="{{$d->saldo}}" >
      <label for="floatingKode">saldo</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="bonus" class="form-control" id="floatingKode" placeholder="Masukkan nomor telepon" value="{{$d->bonus}}">
      <label for="floatingKode">bonus</label>
    </div>    
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection