@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
<form action="{{route('pembayaran.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Pembayaran</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <label>Metode</label>
                  <div class="form-floating mb-3">
                    @foreach ($bayar as $byr)
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode" id="floatingLevel_{{$loop->iteration}}" value="{{$byr}}">
                        <label class="form-check-label" for="floatingLevel">{{$byr}}</label>
                      </div>
                      @endforeach
                  </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="harga_total" class="form-control" id="floatingKategori" placeholder="Masukkan Harga Total">
                  <label for="floatingKategori">Harga Total</label>
                </div>
        
                <!-- input ke tiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="keterangan" class="form-control" id="floatingDeskripsi" placeholder="Masukkan Keterangan">
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
                            <option value="{{$kirim->id}}">{{$kirim->kode}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Kode Pengiriman</label>
                  </div> 
              
                  <!-- input ke lima -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="akun_id" id="akun" aria-label="Floating label select example">
                        <option selected>--- Username ---</option>
                        @foreach ($akun as $user)
                            <option value="{{$user->id}}">{{$user->username}}</option>
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
<!-- form end -->
@endsection