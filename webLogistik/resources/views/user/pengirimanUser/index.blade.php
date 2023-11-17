@extends('user.template.appuser')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class=" datatable table">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">NO. Resi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">lokasi Tujuan</th>
                    <th scope="col">Berat paket</th>
                    {{-- <th scope="col">deskripsi</th> --}}
                    <th scope="col">status</th>
                    <th scope="col">akun</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @php
                  foreach ($pembayaran as $pm) {
                    $pp[] = $pm->pengiriman_id;
                 } 
                    @endphp
                  @foreach($pengiriman as $p)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->penerima->nama}}</td>
                    <td>{{$p->kode}}</td>
                    <td>{{$p->tanggal}}</td>
                    <td>{{$p->lokasi_tujuan}}</td>
                    <td>{{$p->paket->berat}} .Kg</td>
                    {{-- <td>{{$p->paket->deskripsi}}</td> --}}
                    <td>{{$p->akun->fullname}}</td>
                    <td> @if(in_array($p->id , $pp))
                        <button class="btn btn-primary">sudah dibayar</button>
                        @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$p->id}}">belum bayar</button>
                        @endif
                        <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header badge-info">
                                  <h5 class="modal-title text-center" id="exampleModalLabel">Form pembayaran</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body bg-secondary-light">
                                    <form action="{{url('pembayaran/update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="bg-light rounded h-100 p-4">
                                                        <!-- input pertama -->
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select " name="metode" id="layanan{{$p->id}}" aria-label="Floating label select example" onchange="pilih('{{$p->id}}')">
                                                                <option>--- pilih Metode ---</option>
                                                                <option value="dompet">dompetku</option>
                                                                <option value="cod">COD</option>                                                               
                                                            </select>
                                                            <label for="layanan">metode</label>
                                                        </div>
                                                        <input type="text" name="keterangan" value="{{$p->deskripsi}}">
                                                        <div class="d-none" id="dompet{{$p->id}}">
                                                          <div class="form-floating mb-3">
                                                            <input type="text" name="deskripsi" class="form-control " id="floatingKode" value="{{$p->akun->dompet->saldo}}" readonly>
                                                            <label for="floatingKode">Saldo anda</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="harga_bayar" class="form-control " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                                            <label for="floatingKode">harga bayar</label>
                                                        </div>
                                                        </div>
                                                        <div class="d-none" id="cod{{$p->id}}">
                                                            <div class="form-floating mb-3" >
                                                                <input type="text" name="harga_bayar" class="form-control " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="{{$p->akun->dompet->saldo}}">
                                                                <label for="floatingKode">harga yang harus dibayar</label>
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer badge-info">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <input class="btn btn-danger" name="proses" value="simpan" type="submit">
                                  </form>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            function pilih(id){
                              var dompetElement = document.getElementById("dompet" + id);
                              var codElement = document.getElementById("cod" + id);

                              // Periksa apakah elemen ditemukan sebelum manipulasi
                              if (dompetElement && codElement) {
                                  // Sembunyikan semua elemen terlebih dahulu
                                  dompetElement.classList.add("d-none");
                                  codElement.classList.add("d-none");

                                  var layananSelect = document.getElementById("layanan" + id);
                                  var selectedLayanan = layananSelect.options[layananSelect.selectedIndex].value;

                                  // Tampilkan elemen input yang sesuai dengan opsi yang dipilih
                                  if (selectedLayanan === "dompet") {
                                      dompetElement.classList.remove("d-none");
                                  } else if (selectedLayanan === "cod") {
                                      codElement.classList.remove("d-none");
                                  }
                              }
                              };
                        </script>
                    </td>
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

  </main><!-- End #main -->
 
@endsection