@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach($pembayaran as $pm)
<form action="{{route('pembayaran.update',$pm->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Edit Data Pembayaran</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                      <!-- input ke empat -->
                      <label>Metode</label>
                      <div class="form-floating mb-3">
                        @foreach ($bayar as $byr)
                         @php $sel = ($byr == $pm->metode) ? 'checked' : ''; @endphp
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="metode" id="floatingLevel_{{$loop->iteration}}" value="{{$byr}}"{{ $sel}}>
                            <label class="form-check-label" for="floatingLevel">{{$byr}}</label>
                          </div>
                          @endforeach
                      </div>
            
                  
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="harga_total" class="form-control" id="floatingKategori" placeholder="Masukkan Harga Total" value="{{$pm->harga_total}}">
                  <label for="floatingKategori">Harga Total</label>
                </div>
        
                <!-- input ke tiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="keterangan" class="form-control" id="floatingDeskripsi" placeholder="Masukkan Keterangan" value="{{$pm->keterangan}}">
                  <label for="floatingDeskripsi">Keterangan</label>
                </div>
      
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                  <!-- input ke empat -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="pengiriman_id" id="kirim" aria-label="Floating label select example">
                        <option selected>--- Kode Pengiriman ---</option>
                        @foreach ($pengiriman as $kirim)
                        @php $sel = ($kirim->id == $pm->pengiriman_id) ? 'selected' : ''; @endphp
                            <option value="{{$kirim->id}}" {{$sel}} >{{$kirim->kode}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Kode Pengiriman</label>
                  </div> 
              
                  <!-- input ke lima -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="akun_id" id="akun" aria-label="Floating label select example">
                        <option selected>--- Username ---</option>
                        @foreach ($akun as $user)
                        @php $sel = ($user->id == $pm->akun_id) ? 'selected' : ''; @endphp
                            <option value="{{$user->id}}"{{$sel}}>{{$user->username}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Username</label>
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