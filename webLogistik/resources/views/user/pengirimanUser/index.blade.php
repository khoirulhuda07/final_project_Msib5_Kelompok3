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
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input pertama -->
                            <div class="form-floating mb-3">
                                <input type="text" name="kode" class="form-control " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label for="floatingKode">Kode Pengiriman</label>
                            </div>
                            <!-- input kedua -->
                            <div class="form-floating mb-3">
                                <input type="date" name="tanggal" class="form-control" id="floatingKategori" placeholder="Masukkan Tanggal" value="">
                                <label for="floatingKategori">Tanggal</label>
                            </div>

                            <!-- input ke tiga -->
                            <div class="form-floating mb-3">
                                <input type="text" name="lokasi_tujuan" class="form-control" id="floatingDeskripsi" placeholder="Masukkan Lokasi Tujuan" value="">
                                <label for="floatingDeskripsi">Lokasi Tujuan</label>
                            </div>

                            <!-- input ke empat -->
                            <div class="form-floating mb-3">
                                <select class="form-select" name="paket_id" id="Deskirpsi" aria-label="Floating label select example">
                                    <option selected>--- Deskirpsi Paket ---</option>
                                </select>
                                <label for="Deskirpsi">Deskirpsi Paket</label>
                            </div>

                            <!-- input ke lima -->
                            <div class="form-floating mb-3">
                                <select class="form-select " name="layanan_id" id="layanan" aria-label="Floating label select example">
                                    <option selected>--- Nama Layanan ---</option>
                                </select>
                                <label for="layanan">Nama Layanan</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input ke enam -->
                            <div class="form-floating mb-3">
                                <select class="form-select " name="penerima_id" id="nama" aria-label="Floating label select example">
                                    <option selected>--- Nama Penerima ---</option>
                                </select>
                                <label for="nama">Nama Penerima</label>
                            </div>

                            <!-- input ke tujuh -->
                            <div class="form-floating mb-3">
                                <select class="form-select" id="akun" aria-label="Floating label select example">
                                    <option selected>--- Username ---</option>
                                </select>
                                <label for="username">Username</label>
                            </div>

                            <!-- input ke delapan -->
                            <div class="form-floating mb-3">
                                <select class="form-select" name="kurir_id" id="kurir" aria-label="Floating label select example">
                                    <option selected>--- Nama Kurir ---</option>
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
</main><!-- End #main -->
@endsection