@extends('user.template.appuser')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="fs-2 text-center">Riwayat Pembayaran anda</h1>
      <nav>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <table class=" table-responsive datatable table">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">metode pembayaran</th>
                    <th scope="col">harga bayar</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">NO resi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pembayaran as $p)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->metode}}</td>
                    <td>{{$p->harga_total}}</td>
                    <td>{{$p->keterangan}}</td>
                    <td>{{$p->pengiriman->kode}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->!-- End #main -->
@endsection