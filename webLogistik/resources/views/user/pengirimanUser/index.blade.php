@extends('user.template.appuser')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('my/home')}}">Home</a></li>
        <li class="breadcrumb-item active">Riwayat Pengiriman</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h5 class="card-title ml-4 border-bottom">Riwayat Pengiriman Anda</h5>
            <div class="card-body">
              <a href="{{url('my/pengirimanUser/create')}}" class="btn btn-primary my-3">buat pengiriman paket &nbsp;<i class="fa-solid fa-plus"></i></a>
            </a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">NO. Resi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">lokasi Tujuan</th>
                    <th scope="col">Berat paket</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">status</th>
                    
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
                    <td>{{$p->paket->berat}} Kg</td>
                    <td>{{$p->paket->deskripsi}}</td>
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
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="bg-light rounded h-100 p-4">
                                                        <!-- input pertama -->
                                                        <div class="form-floating mb-3  @error('metode') is-invalid @enderror">
                                                            <select class="form-select " name="metode" id="layanan{{$p->id}}" aria-label="Floating label select example" onchange="pilih('{{$p->id}}')">
                                                                <option>--- pilih Metode ---</option>
                                                                <option value="Dompetku">dompetku</option>
                                                                <option value="COD">COD</option>                                                               
                                                            </select>
                                                            <label for="layanan">metode</label>
                                                            @error('metode')
                                                            <div classs="invalid-feedback">
                                                              {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                         <input type="text" name="akun_id" value="{{$p->users->id}}" >
                                                        <input type="text" name="pengiriman_id" id="" value="{{$p->id}}" >
                                                        <input type="text" name="id" value="{{$p->users->dompet->id}}" >
                                                        <input type="text" name="keterangan" value="{{$p->paket->deskripsi}}" >
                                                        <div class="d-none" id="Dompetku{{$p->id}}">
                                                          <div class="form-floating mb-3">
                                                            <input type="text" name="deskripsi" class="form-control " id="floatingKode" value="Rp. {{$p->users->dompet->saldo}}" readonly>
                                                            <label for="floatingKode">Saldo anda</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="number" name="harga_bayar" class="form-control  @error('harga_bayar') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                                            <label for="floatingKode">harga bayar</label>
                                                            @error('harga_bayar')
                                                            <div classs="invalid-feedback">
                                                              {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                        <div class="d-none" id="COD{{$p->id}}">
                                                            <div class="form-floating mb-3" >
                                                                <input type="number" name="" class="form-control " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                                                <label for="floatingKode">harga yang harus dibayar</label>
                                                            </div>
                                                    </div>
                                                    <button name="proses" value="simpan" type="submit" class="btn btn-primary ml-auto">Submit</button>
                                </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer badge-info">
                                 
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            function pilih(id){
                              var dompetElement = document.getElementById("Dompetku" + id);
                              var codElement = document.getElementById("COD" + id);

                              // Periksa apakah elemen ditemukan sebelum manipulasi
                              if (dompetElement && codElement) {
                                  // Sembunyikan semua elemen terlebih dahulu
                                  dompetElement.classList.add("d-none");
                                  codElement.classList.add("d-none");

                                  var layananSelect = document.getElementById("layanan" + id);
                                  var selectedLayanan = layananSelect.options[layananSelect.selectedIndex].value;

                                  // Tampilkan elemen input yang sesuai dengan opsi yang dipilih
                                  if (selectedLayanan === "Dompetku") {
                                      dompetElement.classList.remove("d-none");
                                  } else if (selectedLayanan === "COD") {
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

  </main>
  <!-- End #main -->
 
@endsection