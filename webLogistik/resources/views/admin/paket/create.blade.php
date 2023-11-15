@extends('admin.template.appadmin')

@section('content')

<form action="{{route('paket.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Data Paket</h6>
    <div class="form-floating mb-3">
      <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="floatingKode" placeholder="Masukkan berat paket" >
      <label for="floatingKode">Berat</label>
      @error('berat')
      <div classs="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="floatingKode" placeholder="Masukkan deskripsi paket">
      <label for="floatingKode">Deskripsi Paket</label>
      @error('deskripsi')
      <div classs="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection