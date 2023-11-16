@extends('user.template.appuser')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Saldo Dompetku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Saldo Dompetku dapat digunakan untuk pembayaran pengiriman (order domestik). Tambah dompetku dan kelola riwayat transaksinya di sini.</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="col">

        <div class="row-lg-8">
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="container" style="padding: 20px;">
                  <div class="row">
                    <div class="col-md-9">
                      <h2 class="card-title">Total Saldo</h2>
                      <h2 style="font-weight: bold;">Rp. 0 </h2>
                      <p class="card-text">Pelajari lebih lanjut tentang <a href="" style="text-decoration: none;">Dompetku Logistik</a></p>
                    </div>
                    <div class="col-md-3 text-center">
                      <a href="{{url('user/dompetku')}}" class="btn btn-danger my-5">Tambah Saldo <i class="bi bi-plus-lg"></i></a>
                    </div>
                  </div>
                  <hr>
                  <table class="table table-striped">
                    <div class="search-bar">
                      <div class="row mb-3">
                        <div class="col-md-10">
                          <form class="search-form d-flex align-items-center" method="POST" action="#">
                            <div class="input-group">
                              <span class="input-group-text" id="inputGroupPrepend2">ID Transaksi</span>
                              <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" placeholder="Cari di sini">
                            </div>
                          </form>
                        </div>
                        <div class="col-md-2">
                          <a href="{{url('user/dompetku/laporanPDF')}}" class="btn btn-outline-secondary">Download <i class="ri-download-line"></i></a>
                        </div>
                      </div>
                    </div>  
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Jumlah TopUp</th>
                        <th scope="col">Bonus Poin</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($topup as $row)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$row->waktu}}</td>
                          <td>{{$row->saldo}}</td>
                          <td>{{$row->bonus}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection