@extends('homepage.template.apphomepage')

@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">

    <div class="hero-content" data-aos="fade-up">
        <h2><span>Real-Time</span><br>Together Logistik</h2>
        <div>
            <a href="#about" class="btn-get-started scrollto rounded-3">
                <i class="fa-solid fa-square-phone fa-xl p-2"></i>Staff Kami</a>
            <a href="#portfolio" class="btn-projects scrollto rounded-3">
                <i class="fa-solid fa-square-phone fa-xl p-2"></i>Customer Service</a>
        </div>
    </div>

    <div class="hero-slider swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url('asset/img/hero:carousel/11.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('asset/img/hero-carousel/12.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('asset/img/hero-carousel/13.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('asset/img/hero-carousel/14.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('asset/img/hero-carousel/15.jpg');"></div>
        </div>
    </div>

</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-right">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="{{asset('homepage/img/about/16.png')}}" alt="">
                </div>
                <div class="col-lg-6 content" style="margin-top: 130px;">
                    <h2 style="color: #50d8af;">Smart Delivery</h2>
                    <h2 class="text-black">Sukses rate COD semakin tinggi, penjualan semakin laris</h2>
                    <p>Tingkatkan keberhasilan pengiriman dengan <span style="color: #0c2e8a; font-weight: bold;">Logistik</span> yang dapat membantumu menentukan ekspedisi terbaik untuk kecamatan tujuan secara otomatis.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container" data-aos="fade-left">
            <div class="row">
                <div class="col-lg-6 content " style="margin-top: 130px;">
                    <h2 style="color: #50d8af;">Easy Claim</h2>
                    <h2 class="text-black">Cukup duduk manis tunggu klaim paketmu teratasi</h2>
                    <p>Tanpa proses administrasi yang rumit dan panjang ke pihak ekspedisi, tim kami siap bantu proses pengajuan klaim jadi lebih mudah dan lancar sampai selesai.</p>
                </div>
                <div class="col-lg-6 about-img">
                    <img src="{{asset('homepage/img/about/17.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container" data-aos="fade-right">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="{{asset('homepage/img/about/18.png')}}" alt="">
                </div>
                <div class="col-lg-6 content" style="margin-top: 130px;">
                    <h2 style="color: #50d8af;">Monitoring</h2>
                    <h2 class="text-black">Ambil kendali pengiriman dengan lebih cepat dan terjamin</h2>
                    <p>Permudah proses pelaporan, pengecekan, serta penanganan masalah yang mungkin hadir dalam perjalanan dengan bantuan tim support yang berdedikasi.</p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Services</h2>
                <p>Logistik memperkenalkan layanan pengiriman terbaik kami yang dirancang khusus untuk memenuhi kebutuhan Anda. Dengan komitmen untuk memberikan kemudahan, keandalan, dan kenyamanan dalam setiap pengiriman, kami siap membantu Anda mengirimkan barang Anda dengan aman dan tepat waktu</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-truck" style="color: #50d8af;"></i></div>
                        <h4 class="title"><a href="">Pickup</a></h4>
                        <p class="description">
                            Kami mengutamakan pengiriman tepat waktu. Dengan jaringan luas dan metode transportasi yang efisien,
                            kami menjamin barang Anda sampai ke tujuan sesuai dengan jadwal yang Anda inginkan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-people-group"></i></div>
                        <h4 class="title"><a href="">CS Profesional dan Responsif</a></h4>
                        <p class="description">
                            Tim layanan pelanggan kami selalu siap membantu Anda. Jika Anda memiliki pertanyaan atau
                            membutuhkan bantuan, kami akan dengan senang hati membantu Anda.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-cash-register"></i></div>
                        <h4 class="title"><a href="">Cek Tarif Pengiriman Mudah</a></h4>
                        <p class="description">Kami menawarkan tarif pengiriman yang kompetitif dan terjangkau.
                            Anda tidak perlu khawatir tentang biaya yang terlalu tinggi.</p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-shield"></i></div>
                        <h4 class="title"><a href="">Keamanan Barang</a></h4>
                        <p class="description">Kami memahami betapa berharganya barang yang anda kirim. Oleh karena
                            itu, kami mengambil langkah-langkah ekstra dalam penanganan dan penjagaan barang. Anda bisa tenang karena barang anda dalam keamanan.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Clients</h2>
                <p>
                    Kami juga bekerjama dengan perusahaan-perusahan yang ada di bawah ini sebagai penyedia layanan dalam pengiriman barang
                </p>
            </div>

            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('homepage/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Testimonials</h2>
                <p>Kami memberikan informasi dan bukti atas kualitas layanan kepada pelanggan yang sudah pernah pernah menggunakan Logistik.
                </p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <img src="{{asset('homepage/img/quote-sign-left.png')}}" class="quote-sign-left" alt="">
                                Saya telah menjadi pelanggan
                                setia selama beberapa tahun sekarang. Mereka selalu memberikan
                                pengantaran yang tepat waktu, selalu tiba dalam
                                kondisi terbaik, dan saya tidak pernah kecewa.
                                <img src="{{asset('homepage/img/quote-sign-right.png')}}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{asset('homepage/img/testimonial-1.jpg')}}" class="testimonial-img" alt="">
                            <h3>Hilmi</h3>
                            <h4>Leader &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <img src="{{asset('homepage/img/quote-sign-left.png')}}" class="quote-sign-left" alt="">
                                Pesanan saya dari tiba dengan cepat dan barang yang diterima juga dalam keadaan baik. Pelayanan yang luar biasa, saya pasti akan kembali jika ingin mengirimkan lagi terima kasih logistik.
                                <img src="{{asset('homepage/img/quote-sign-right.png')}}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{asset('homepage/img/testimonial-2.jpg')}}" class="testimonial-img" alt="">
                            <h3>Dea</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <img src="{{asset('homepage/img/quote-sign-left.png')}}" class="quote-sign-left" alt="">
                                Sangat puas dengan pelayanan Logistik. Pengiriman tepat waktu pelayanan juga sangat baik dan ramah kepada Customer
                                dalam hal pengemasan juga sangat baik dan teratur!
                                <img src="{{asset('homepage/img/quote-sign-right.png')}}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{asset('homepage/img/testimonial-3.jpg')}}" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <img src="{{asset('homepage/img/quote-sign-left.png')}}" class="quote-sign-left" alt="">
                                Terima kasih kepada pelayanan Logistik atas pengiriman yang efisien. Pesanan saya selalu akurat, dan itu sangat membantu
                                dalam situasi sibuk harganya juga terjangkau.
                                <img src="{{asset('homepage/img/quote-sign-right.png')}}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{asset('homepage/img/testimonial-4.jpg')}}" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <img src="{{asset('homepage/img/quote-sign-left.png')}}" class="quote-sign-left" alt="">
                                Saya kagum dengan pelayanan Logistik. Pesanan datang lebih cepat dari yang saya harapkan, dan pelayanan pelanggan mereka
                                sangat responsif juga selalu ramah terhadap pelanggan.
                                <img src="{{asset('homepage/img/quote-sign-right.png')}}" class="quote-sign-right" alt="">
                            </p>
                            <img src="{{asset('homepage/img/testimonial-5.jpg')}}" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
        <div class="container " data-aos="fade-up">
            <div class="section-header">
                <h2>Our Team</h2>
            </div>
            <div class="row ">
                <div class="col-lg-3 col-md-6 mx-auto " data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="member">
                        <div class="pic"><img src="{{asset('homepage/img/Author/team-1.jpg')}}" alt=""></div>
                        <div class="details">
                            <h4>Khoirul Huda</h4>
                            <span>Chief Executive Officer</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mx-auto" data-aos="zoom-in-up" data-aos-delay="200">
                    <div class="member">
                        <div class="pic"><img src="{{asset('homepage/img/Author/team-2.jpg')}}" alt=""></div>
                        <div class="details">
                            <h4>Devia Fitri N</h4>
                            <span>Frond End Developer</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mx-auto" data-aos="zoom-in-up" data-aos-delay="300">
                    <div class="member">
                        <div class="pic"><img src="{{asset('homepage/img/Author/michail.png')}}" alt=""></div>
                        <div class="details">
                            <h4>Michail</h4>
                            <span>Back End Developer</span>
                            <div class="social">
                                <a href="https://twitter.com/michailtj39"><i class="bi bi-twitter"></i></a>
                                <a href="https://www.facebook.com/michail.tjhang"><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/michailtj39/"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/michailtj39/"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mx-auto" data-aos="zoom-in-up" data-aos-delay="400">
                    <div class="member">
                        <div class="pic"><img src="{{asset('homepage/img/Author/team-4.jpg')}}" alt=""></div>
                        <div class="details">
                            <h4>Angelina Yulfaningtyas</h4>
                            <span>Front End Developer</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mx-auto" data-aos="zoom-in-up" data-aos-delay="500">
                    <div class="member">
                        <div class="pic"><img src="{{asset('homepage/img/Author/team-3.jpg')}}" alt=""></div>
                        <div class="details">
                            <h4>Achbar Wahyudhi</h4>
                            <span> Front End Developer</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p>
                    Kami siap siap untuk menjawab pertanyaan, masukan, atau kebutuhan Anda.
                    Silakan gunakan informasi kontak di bawah ini untuk menghubungi tim kami:
                </p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <address>Jalan Kyai Saleh Nomor 10, Kelurahan Mugassari, Kecamatan Semarang Selatan.</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="bi bi-phone"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+62 5589 55488 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">logistik@gmail.com</a></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container mb-4" data-aos="fade-up">
            <iframe src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126715.84305051474!2d110.33466248881972!3d-7.024552223899592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4d3f0d024d%3A0x1e0432b9da5cb9f2!2sSemarang%2C%20Semarang%20City%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1698916364506!5m2!1sen!2sid" width="100%" height="380" style="border:0;" allowfullscreen></iframe>
        </div>

        <!-- <div class="container">
        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>

            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>

            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div> -->
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection