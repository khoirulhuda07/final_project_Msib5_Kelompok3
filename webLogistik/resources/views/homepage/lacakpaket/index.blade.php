@extends('homepage.template.apphomepage')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include SweetAlert CSS and JS from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<main id="main">
    <section class="section" data-aos="zoom-in" data-aos-delay="200">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 me-auto">
                    <h2 class="mb-12 text-center mt-4 fw-bold" style="font-family: 'Josefin Sans', sans-serif;">LACAK PAKETMU DISINI</h2>
                    <div class="col-md-12 mt-3">
                            <input type="text" class=" border-5 form-control" id="kode" required>
                            <input type="submit" class="btn btn-primary btn-lg d-block mt-5  mx-auto rounded-3 fw-light" style="margin-bottom: 13%;" name="proses" value="Cek" onclick="cek()">
                    </div>
                </div>
            </div>
            <div id="cn" class="row -top-32 d-none " data-aos-delay="300">
                <h2 class="text-center" data-aos="fade-up">Informasi Paket Anda</h2>
                <div class="col-md-12 mb-5 mt-5 mb-md-0" data-aos="fade-up">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label  class="fw-bold text-primary ">Status Paket Anda Sekarang</label>
                      <input type="text" name="name" class="form-control" id="statua"  readonly>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label  class="fw-bold text-primary ">nama Penerima</label>
                      <input type="email" class="form-control" name="email" id="nama" readonly>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0 ">
                      <label  class="fw-bold text-primary ">tanggal</label>
                      <input type="text" class="form-control" name="subject" id="tanggal" readonly>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label class="fw-bold text-primary ">Kurir</label>
                      <input type="text" class="form-control"  name="subject" id="kurir" readonly>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label  class="fw-bold text-primary ">Tujuan Pengiriman</label>
                      <input type="text" class="form-control" name="subject" id="tujuan" readonly>
                    </div>
                  </div>
                </div>
              </div> 
        </div>
    </section>
    <script>
function cek(){
    var settings = {
  "url": "http://localhost/master/webLogistik/public/api/lacak/",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Cookie": "XSRF-TOKEN=eyJpdiI6IjBjL29XS1BTL05KS1ZRdThYRkc0clE9PSIsInZhbHVlIjoiRGJVbXRrdVcrOFFrditUSDRxRkhQb1ptbWZ5akhpOE92Q29QTzlYdnlLWVAvdEVXTjVMZElESnNOdWJTeUVNR3lmOE9CRlo4OUZZQ2M0elQ0UTdsdExKb1RKeVFJaGc5UWVEZHpYUE94N1g0aHdWZTdyWU5RQzFmU2Y5MkRsbXIiLCJtYWMiOiJlMTM0ODJkZjkyZGEwYWRhMDFmZGFkMTAxZjg1ZDRiYTY5NGMzYTU4MzFhNzEwZWU2OWNlYTEyMDc3MTM4NTIxIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IldDNVgzajVnTkF3MWU2THR6MXJiSkE9PSIsInZhbHVlIjoiSHF1cUYrSXBLazBNSXYrT3dtWjNJOUpscS9adTB0NXcyVHBUcDA2SWhPUU5FV3U1SHhtQ2xsSGtoR3pSOGJUeS9FRDFUNzVjYWdmTTFzYzZtYTNBTHFIbjRaZXNtTnN1WS9VS1Y4M2NydnJOSzk1RzJGVDFDcktNL1NPVDNvNkEiLCJtYWMiOiIyZDMxODY1MDRkMWVhNThlNDQyNDU5ZWEwNzM3YzAxMGViODA1ODkyYjVlNGFlMGY0ZjJjNzAxNDE1MGZhYTEwIiwidGFnIjoiIn0%3D"
  },
};
    $.ajax(settings).done(function (response) {
  var h = response.data;
  var data = h;
  var input = $('#kode').val();
  console.log(input);
    var kondisi = false;
  $('#default').empty();
    for (var i = 0; i < data.length; i++) {
      if (data[i].kode == input) {
        $('#cn').removeClass("d-none");
        $('#nama').val(data[i].penerima);
        $('#tanggal').val(data[i].tanggal);
        $('#kurir').val(data[i].kurir);
        $('#tujuan').val(data[i].lokasi_tujuan);
        kondisi = true;
      };
    }
    if (!kondisi) {
        Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "nomor resi tidak ditemukan",
});
        }
});
};    
    </script>
</main>
@endsection