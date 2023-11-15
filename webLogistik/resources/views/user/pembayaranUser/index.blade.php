@extends('user.template.appuser')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-white rounded h-100 p-4">
                        <!-- input pertama -->
                        <label>Metode</label>
                        <div class="form-floating mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="metode" id="" value="Dompetku">Dompet <br>
                                <input class="form-check-input" type="radio" name="metode" id="" value="COD">COD
                            </div>
                        </div>

                        <!-- input kedua -->
                        <div class="form-floating mb-3 ">
                            <input type="text" name="harga_total" class="form-control " id="floatingKategori" placeholder="Masukkan Harga Total">
                            <label for="floatingKategori">Harga Total</label>
                        </div>

                        <!-- input ke tiga -->
                        <div class="form-floating mb-3 ">
                            <input type="text" name="keterangan" class="form-control " id="floatingDeskripsi" placeholder="Masukkan Keterangan">
                            <label for="floatingDeskripsi">Keterangan</label>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <!-- input ke empat -->
                        <div class="form-floating mb-3 ">
                            <select class="form-select " name="pengiriman_id" id="kirim" aria-label="Floating label select example">
                                <option selected>--- Kode Pengiriman ---</option>
                            </select>
                            <label for="saldo">Kode Pengiriman</label>
                        </div>

                        <!-- input ke lima -->
                        <div class="form-floating mb-3 ">
                            <select class="form-select " name="akun_id" id="akun" aria-label="Floating label select example">
                                <option selected>--- Username ---</option>
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
</main><!-- End #main -->
@endsection