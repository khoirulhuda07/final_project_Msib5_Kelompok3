@extends('homepage.template.apphomepage')

@section('content')

<main id="main">
    <section class="section" data-aos="zoom-in" data-aos-delay="200">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 me-auto">
                    <h2 class="mb-12 text-center mt-4 fw-bold" style="font-family: 'Josefin Sans', sans-serif;">LACAK PAKETMU DISINI</h2>
                    <div class="col-md-12 mt-3">
                        <form method="POST">
                            <input type="text" class=" border-5 form-control" name="kode" required>
                            <input type="submit" class="btn btn-primary btn-lg d-block mt-5  mx-auto rounded-3 fw-light" style="margin-bottom: 13%;" name="proses" value="Cek">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection