@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
<form action="{{route('pengiriman.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Pengiriman</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="kode" class="form-control" id="floatingKode" placeholder="Masukkan Kode Pengiriman">
                  <label for="floatingKode">Kode Pengiriman</label>
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="date" name="tanggal" class="form-control" id="floatingKategori" placeholder="Masukkan Tanggal">
                  <label for="floatingKategori">Tanggal</label>
                </div>
        
                <!-- input ke tiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="lokasi_tujuan" class="form-control" id="floatingDeskripsi" placeholder="Masukkan Lokasi Tujuan">
                  <label for="floatingDeskripsi">Lokasi Tujuan</label>
                </div>
      
                <!-- input ke empat -->
                <div class="form-floating mb-3">
                    <select class="form-select" name="paket_id" id="Deskirpsi" aria-label="Floating label select example">
                        <option selected>--- Deskirpsi Paket ---</option>
                        @foreach ($paket as $pkt)
                            <option value="{{$pkt->id}}">{{$pkt->deskripsi}}</option>
                        @endforeach
                    </select>
                    <label for="Deskirpsi">Deskirpsi Paket</label>
                  </div> 
                
                <!-- input ke lima -->
                <div class="form-floating mb-3">
                    <select class="form-select" name="layanan_id" id="layanan" aria-label="Floating label select example">
                        <option selected>--- Nama Layanan ---</option>
                        @foreach ($layanan as $lyn)
                            <option value="{{$lyn->id}}">{{$lyn->nama_layanan}}</option>
                        @endforeach
                    </select>
                    <label for="layanan">Nama Layanan</label>
                  </div> 

              </div>
          </div>
          <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                  <!-- input ke enam -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="penerima_id" id="nama" aria-label="Floating label select example">
                        <option selected>--- Nama Penerima ---</option>
                        @foreach ($penerima as $terima)
                            <option value="{{$terima->id}}">{{$terima->nama}}</option>
                        @endforeach
                    </select>
                    <label for="nama">Nama Penerima</label>
                  </div> 
              
                  <!-- input ke tujuh -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="akun_id" id="akun" aria-label="Floating label select example">
                        <option selected>--- Username ---</option>
                        @foreach ($akun as $user)
                            <option value="{{$user->id}}">{{$user->username}}</option>
                        @endforeach
                    </select>
                    <label for="saldo">Username</label>
                  </div> 

                  <!-- input ke delapan -->
                  <div class="form-floating mb-3">
                    <select class="form-select" name="kurir_id" id="kurir" aria-label="Floating label select example">
                        <option selected>--- Nama Kurir ---</option>
                        @foreach ($kurir as $kr)
                            <option value="{{$kr->id}}">{{$kr->nama_kurir}}</option>
                        @endforeach
                    </select>
                    <label for="kurir">Nama Kurir</label>
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