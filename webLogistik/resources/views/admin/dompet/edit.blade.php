@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach($dompet as $d)
<form action="{{route('dompet.update',$d->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Dompet</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="saldo" class="form-control" id="saldo" placeholder="Cek Saldo" value="{{$d->saldo}}">
                  <label for="floatingKode">Saldo</label>
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="bonus" class="form-control" id="floatingKategori" placeholder="Cek Bonus" value="{{$d->bonus}}">
                  <label for="floatingKategori">Bonus</label>
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