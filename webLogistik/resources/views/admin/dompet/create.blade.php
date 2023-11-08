@extends('admin.template.appadmin')

@section('content')

<form action="{{route('dompet.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Data Dompet</h6>
    <div class="form-floating mb-3">
      <input type="text" name="saldo" class="form-control" id="floatingKode" placeholder="Masukkan nama kurir" >
      <label for="floatingKode">saldo</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="bonus" class="form-control" id="floatingKode" placeholder="Masukkan nomor telepon">
      <label for="floatingKode">bonus</label>
    </div>    
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection