@extends('user.template.appuser')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pengiriman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Pengiriman</li>
            </ol>
        </nav>
        <form action="{{url('user/pengirimanUser/pull')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input pertama -->
                             <div class="form-floating mb-3 " >
                                <input type="text" name="berat" class=" form-control  @error('berat') is-invalid @enderror" id="floatingKode" style="transition: all 0.15s linear" placeholder="Masukkan Kode Pengiriman" value="">
                                <label style="transition: all 0.15s linear" for="floatingKode">berat paket</label>
                                @error('berat')
                                <div classs="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror                          
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"style="transition: all 0.15s linear" name="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label style="transition: all 0.15s linear" for="floatingKode">deskripsi</label>
                                @error('deskripsi')
                                <div classs="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror                            
                            </div>
                            {{-- <div class="form-floating mb-3">
                                <input type="text" name="pengiriman" class="form-control " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label for="floatingKode">Kode Pengiriman</label>
                            </div> --}}
                            <!-- input kedua -->
                            <div class="form-floating mb-3">
                                <input type="date" name="tanggal" style="transition: all 0.15s linear" class="form-control  @error('tanggal') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Tanggal" value="">
                                <label for="floatingKategori" style="transition: all 0.15s linear">Tanggal</label>
                                @error('tanggal')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror                           
                            </div>

                            <!-- input ke tiga -->
                            <div class="form-floating mb-3">
                                <input type="text" style="transition: all 0.15s linear" name="lokasi_tujuan" class="form-control  @error('lokasi_tujuan') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Lokasi Tujuan" value="">
                                <label for="floatingDeskripsi" style="transition: all 0.15s linear">Lokasi Tujuan</label>
                                @error('lokasi_tujuan')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <!-- input ke empat -->
                            {{-- <div class="form-floating mb-3">
                                <select class="form-select" name="paket_id" id="Deskirpsi" aria-label="Floating label select example">
                                    <option selected>--- Deskirpsi Paket ---</option>
                                </select>
                                <label for="Deskirpsi">Deskirpsi Paket</label>
                            </div> --}}
                            <!-- input ke lima -->
                            <div class="form-floating mb-3  ">
                                <select style="transition: all 0.15s linear" class="form-select @error('layanan') is-invalid @enderror" name="layanan" id="layanan" aria-label="Floating label select example">
                                    <option selected>--- Nama Layanan ---</option>
                                    @foreach($layanan as $l)
                                    <option value="{{$l->id}}">{{$l->nama_layanan}}</option>
                                    @endforeach
                                </select>
                                <label for="layanan">Nama Layanan</label>
                                @error('layanan')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input ke enam -->
                            <div class="form-floating mb-3  ">
                                <input type="text" name="penerima" class="form-control @error('penerima') is-invalid @enderror " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label for="floatingKode">Nama Penerima</label>
                                @error('penerima')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <div class="form-floating mb-3  ">
                                <input type="text"style="transition: all 0.15s linear" name="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label style="transition: all 0.15s linear" for="floatingKode">Nomor Telepon</label>
                                @error('no_tlp')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            {{-- <div class="form-floating mb-3">
                                <select class="form-select " name="penerima_id" id="nama" aria-label="Floating label select example">
                                    <option selected>--- Nama Penerima ---</option>
                                </select>
                                <label for="nama">Nama Penerima</label>
                            </div> --}}

                            <!-- input ke tujuh -->
                            <div class="form-floating mb-3  ">
                                <select class="form-select @error('akun') is-invalid @enderror" name="akun" id="akun" aria-label="Floating label select example">
                                    <option selected>--- Username ---</option>
                                    @foreach($akun as $ak)
                                    <option value="{{$ak->id}}">{{$ak->fullname}}</option>
                                    @endforeach
                                </select>
                                <label for="username">Username</label>
                                @error('akun')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <!-- input ke delapan -->
                            <br>
                            <button name="proses" value="save" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

         
</main><!-- End #main -->
@endsection