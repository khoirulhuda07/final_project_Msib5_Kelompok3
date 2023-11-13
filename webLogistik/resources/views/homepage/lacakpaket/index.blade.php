@extends('homepage.template.apphomepage')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        </div>
    </section>
    <script>
            var settings = {
  "url": "http://localhost/master/webLogistik/public/api/lacak/",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Cookie": "XSRF-TOKEN=eyJpdiI6IjBjL29XS1BTL05KS1ZRdThYRkc0clE9PSIsInZhbHVlIjoiRGJVbXRrdVcrOFFrditUSDRxRkhQb1ptbWZ5akhpOE92Q29QTzlYdnlLWVAvdEVXTjVMZElESnNOdWJTeUVNR3lmOE9CRlo4OUZZQ2M0elQ0UTdsdExKb1RKeVFJaGc5UWVEZHpYUE94N1g0aHdWZTdyWU5RQzFmU2Y5MkRsbXIiLCJtYWMiOiJlMTM0ODJkZjkyZGEwYWRhMDFmZGFkMTAxZjg1ZDRiYTY5NGMzYTU4MzFhNzEwZWU2OWNlYTEyMDc3MTM4NTIxIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IldDNVgzajVnTkF3MWU2THR6MXJiSkE9PSIsInZhbHVlIjoiSHF1cUYrSXBLazBNSXYrT3dtWjNJOUpscS9adTB0NXcyVHBUcDA2SWhPUU5FV3U1SHhtQ2xsSGtoR3pSOGJUeS9FRDFUNzVjYWdmTTFzYzZtYTNBTHFIbjRaZXNtTnN1WS9VS1Y4M2NydnJOSzk1RzJGVDFDcktNL1NPVDNvNkEiLCJtYWMiOiIyZDMxODY1MDRkMWVhNThlNDQyNDU5ZWEwNzM3YzAxMGViODA1ODkyYjVlNGFlMGY0ZjJjNzAxNDE1MGZhYTEwIiwidGFnIjoiIn0%3D"
  },
};

$.ajax(settings).done(function (response) {
  var data = [];
  data.push = response;
});    
    </script>
</main>
@endsection