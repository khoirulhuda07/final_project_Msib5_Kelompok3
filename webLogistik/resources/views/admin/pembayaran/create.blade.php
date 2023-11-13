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
                      <div class="form-check form-check-inline @error('metode') is-invalid @enderror">
                        <input class="form-check-input" type="radio" name="metode" id="floatingLevel_{{$loop->iteration}}" value="{{$byr}}">
                        <label class="form-check-label" for="floatingLevel">{{$byr}}</label>
                      </div>
                      @endforeach
                       @error('metode')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                  </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3 ">
                  <input type="text" name="harga_total" class="form-control @error('harga_total') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Harga Total">
                  <label for="floatingKategori">Harga Total</label>
                  @error('harga_total')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
        
                <!-- input ke tiga -->
                <div class="form-floating mb-3 ">
                  <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Keterangan">
                  <label for="floatingDeskripsi">Keterangan</label>
                  @error('keterangan')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
      
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                  <!-- input ke empat -->
                  <div class="form-floating mb-3 ">
                    <select class="form-select @error('pengiriman_id') is-invalid @enderror" name="pengiriman_id" id="kirim" aria-label="Floating label select example">
                        <option selected>--- Kode Pengiriman ---</option>
                        @foreach ($pengiriman as $kirim)
                            <option value="{{$kirim->id}}">{{$kirim->kode}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Kode Pengiriman</label>
                    @error('pengiriman_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div> 
              
                  <!-- input ke lima -->
                  <div class="form-floating mb-3 ">
                    <select class="form-select @error('akun_id') is-invalid @enderror" name="akun_id" id="akun" aria-label="Floating label select example">
                        <option selected>--- Username ---</option>
                        @foreach ($akun as $user)
                            <option value="{{$user->id}}">{{$user->username}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Username</label>
                    @error('akun_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
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