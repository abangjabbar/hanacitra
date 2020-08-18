<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Hana Citra Buana</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/img/core-img/favicon.ico')?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <p>Welcome to Hana Citra Buana Site!</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Senin-Jumat: 8.00 to 16.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: (+12)-345-6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="<?php echo base_url() ?>assets/images/logo-hcb.png" width="300"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="<?php echo site_url('hanacitra/berandaCust') ?>">Beranda</a></li>
                                    <li><a href="#">Produk</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo site_url('hanacitra/jenisBentukCust') ?>">- Jenis Bentuk Box</a></li>
                                            <li><a href="<?php echo site_url('substances/jenisBahanCust') ?>">- Jenis Bahan Box</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pesanan</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo site_url('orders') ?>">- Daftar Pesanan</a></li>
                                            <li><a href="#">- Kemajuan Pesanan</a></li>
                                            <li><a href="#">- Pengiriman</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Transaksi</a></li>
                                    <li class="active"><a href="<?php echo site_url('hanacitra/tentangkamiCust') ?>">Tentang Kami</a></li>
                                </ul>

                                <!-- Book Icon -->
                                <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                    <a href="#" class="btn akame-btn">Pesan Sekarang</a>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Tentang Kami</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('orders/beranda') ?>"><i class="icon_house_alt"></i>Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Akame About Area Start -->
    <section class="akame--about--area">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12 col-lg-6">
                    <div class="section-heading text-right mb-80 pr-5 pt-3">
                        <p>Depok • Sejak 2012</p>
                        <h2>Tentang Perusahaan Kami</h2>
                        <span>Tentang Kami</span>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about--us--content mb-80">
                        <p>Kami CV. Hana Citra Buana adalah perusahaan yang bergerak dibidang jasa cetak dan pembuatan corrugated karton box untuk kemasan.</p>
                        <img src="img/core-img/signature.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akame About Area End -->

<!-- Our Expert Area Start -->
    <section class="akame-our-expert-area about-us-page section-padding-80-0">

        <!-- Side Thumbnail -->
        <div class="side-thumbnail" style="background-image: url(img/bg-img/14.png);"></div>

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>We Do The Best For You</h2>
                        <p>Kami tidak membatasi order yang diberikan kepada kami dari yang sedikit (satu) sampai yang terbanyak. Untuk beberapa tipe cetakan per hari bisa kami kerjakan cepat berdasarkan desain yang kami terima.</p>
                    </div>
                    <!-- Our Certificate -->
                    <div class="our-certificate-area mb-60 d-flex align-items-center">
                        <img src="<?php echo base_url() ?>assets/images/core-img/certificate-1.png" alt="">
                        <img src="<?php echo base_url() ?>assets/images/core-img/certificate-2.png" alt="">
                        <img src="<?php echo base_url() ?>assets/images/core-img/certificate-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_phone"></i>
                        <h4>Kontak</h4>
                        <p>02187753730 / 02187753577</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_pin"></i>
                        <h4>Alamat</h4>
                        <p>Jl. Radar AURI Gg. Bhakti No. 79 RT/RW 07/11 Mekarsari Cimanggis Depok Jawa Barat Indonesia</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_clock"></i>
                        <h4>Jam Operasional</h4>
                        <p>08:00 am to 16:00 pm</p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_mail"></i>
                        <h4>Email</h4>
                        <p>hanacitrabuana@yahoo.co.id</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Expert Area End -->


<!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>

                        <p class="mb-30">Kami menyediakan jasa pembuatan karton box Dengan berbagai jenis dan bentuk</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Jam Operasional</h4>

                        <!-- Open Times -->
                        <div class="open-time">
                            <p>Monday: Friday: 08.00 - 16.00</p>
                            <p>Saturday: 10.00 - 14.00</p>
                        </div>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">

                        <!-- Widget Title -->
                        <h4 class="widget-title">Hubungi Kami</h4>

                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Tel: 02187753730 / 02187753577</p>
                            <p>E-mail: hanacitrabuana@yahoo.co.id</p>
                            <p>Address: Jl.Radar Auri Gg.Bhakti No.79 Mekarsari Cimanggis Depok Jawa Barat</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <!-- Popper -->
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- All Plugins -->
    <script src="<?php echo base_url('assets/js/akame.bundle.js')?>"></script>
    <!-- Active -->
    <script src="<?php echo base_url('assets/js/default-assets/active.js')?>"></script>

</body>

</html>