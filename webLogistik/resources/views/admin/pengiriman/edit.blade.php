@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach ($pengiriman as $pn)
<form action="{{route('pengiriman.update',$pn->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Pengiriman</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="{{$pn->kode}}">
                  <label for="floatingKode">Kode Pengiriman</label>
                  @error('kode')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Tanggal" value="{{$pn->tanggal}}">
                  <label for="floatingKategori">Tanggal</label>
                  @error('tanggal')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
        
                <!-- input ke tiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="lokasi_tujuan" class="form-control @error('lokasi_tujuan') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Lokasi Tujuan" value="{{$pn->lokasi_tujuan}}">
                  <label for="floatingDeskripsi">Lokasi Tujuan</label>
                  @error('lokasi_tujuan')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
      
                <!-- input ke empat -->
                <label>Jabatan</label>
                  <div class="form-floating mb-3">
                    @foreach ($status as $items)
                    @php $sel = ($items == $pn->status) ? 'checked' : ''; @endphp
                      <div class="form-check form-check-inline @error('status') is-invalid @enderror">
                        <input class="form-check-input" type="radio" name="status" id="floatingstatus_{{$loop->iteration}}" value="{{$items}}" {{$sel}}>
                        <label class="form-check-label" for="floatingstatus">{{$items}}</label>
                      </div>
                      @endforeach
                      @error('status')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                  </div>

                <!-- input ke lima -->
                <div class="form-floating mb-3">
                    <select class="form-select @error('paket_id') is-invalid @enderror" name="paket_id" id="Deskirpsi" aria-label="Floating label select example">
                        <option selected>--- Deskirpsi Paket ---</option>
                        @foreach ($paket as $pkt)
                        @php $sel = ($pkt->id == $pn->paket_id) ? 'selected' : ''; @endphp
                            <option value="{{$pkt->id}}" {{$sel}}>{{$pkt->deskripsi}}</option>
                        @endforeach
                    </select>
                    @error('paket_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <label for="Deskirpsi">Deskirpsi Paket</label>
                  </div> 
                </div>
              </div>
              <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                  <!-- input ke enam -->
                  <div class="form-floating mb-3">
                      <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id" id="layanan" aria-label="Floating label select example">
                          <option selected>--- Nama Layanan ---</option>
                          @foreach ($layanan as $lyn)
                          @php $sel = ($lyn->id == $pn->layanan_id) ? 'selected' : ''; @endphp
                              <option value="{{$lyn->id}}" {{$sel}}>{{$lyn->nama_layanan}}</option>
                          @endforeach
                      </select>
                      @error('layanan_id')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                      <label for="layanan">Nama Layanan</label>
                    </div> 

                  <!-- input ke tujuh -->
                  <div class="form-floating mb-3">
                    <select class="form-select @error('penerima_id') is-invalid @enderror" name="penerima_id" id="nama" aria-label="Floating label select example">
                        <option selected>--- Nama Penerima ---</option>
                        @foreach ($penerima as $terima)
                        @php $sel = ($terima->id == $pn->penerima_id) ? 'selected' : ''; @endphp
                            <option value="{{$terima->id}}" {{$sel}}>{{$terima->nama}}</option>
                        @endforeach
                    </select>
                    @error('penerima_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <label for="nama">Nama Penerima</label>
                  </div> 
              
                  <!-- input ke delapan -->
                  <div class="form-floating mb-3">
                    <select class="form-select @error('akun_id') is-invalid @enderror" name="akun_id" id="akun" aria-label="Floating label select example">
                        <option selected>--- Username ---</option>
                        @foreach ($akun as $user)
                        @php $sel = ($user->id == $pn->akun_id) ? 'selected' : ''; @endphp
                            <option value="{{$user->id}}" {{$sel}}>{{$user->username}}</option>
                        @endforeach
                    </select>
                    @error('akun_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <label for="saldo">Username</label>
                  </div> 
                  <br>
                    <button name="proses" value="save" type="submit" class="btn btn-warning">Update</button>
              </div>
            </div>
        </div>
    </div>
</form>
<!-- form end -->
@endforeach
@endsection