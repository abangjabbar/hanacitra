<div class="row">
    <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Solusi Untuk Bisnis Anda</h1>
                <h2>Kami menyediakan jasa pembuatan karton box untuk kemasan dengan berbagai jenis dan bentuk</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="<?= site_url("auth") ?>" class="btn-get-started scrollto">Pesan Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url('assets/'); ?>arsha/img/pngegg.png" width="350" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
        <div class="container">

            <div class="row" data-aos="zoom-in">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-1.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-2.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-3.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-4.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-5.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('assets/'); ?>arsha/img/clients/client-6.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section><!-- End Cliens Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Kami menyediakan jasa pembuatan karton box untuk kemasan.</p>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Desain</a></h4>
                        <p>Desain dapat sesuai dengan yang anda inginkan.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Pengerjaan</a></h4>
                        <p>Pengerjaan dilakukan sesuai dengan estimasi pesanan.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Pengiriman</a></h4>
                        <p>Pengiriman dilakukan langsung dari pihak kami</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>Klik Untuk Memesan</h3>
                    <p>Penjelasan lebih lanjut ada disini</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="<?= site_url('client/menuProduk'); ?>">Klik Untuk Memesan</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
            </div>

            <div class="row">

                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Jl. Radar AURI Gg. Bhakti No. 79 RT/RW 07/11 Mekarsari Cimanggis Depok Jawa Barat Indonesia</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>02187753730 / 02187753577</p>
                        </div>

                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.2940447569989!2d106.87778102914916!3d-6.371241566889834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed4b2a444b03%3A0x898cbc2764ad4c80!2sJl.%20Bakti%20No.162%2C%20Mekarsari%2C%20Kec.%20Cimanggis%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016452!5e0!3m2!1sen!2sid!4v1633576663630!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main>