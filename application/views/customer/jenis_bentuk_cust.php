<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
    <link rel="icon" href="<?php echo base_url('assets/./img/core-img/favicon.ico')?>">

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
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Senis-Juamt: 8.00 to 16.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: 02187753730 / 02187753577</p>
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
                        <a class="nav-brand" href=""><img Src="<?php echo base_url() ?>assets/images/logo-hcb.png" width="300"></a>

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
                                            <li class="active"><a href="<?php echo site_url('hanacitra/jenisBentukCust') ?>">- Jenis Bentuk Box</a></li>
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
                                    <li><a href="<?php echo site_url('hanacitra/tentangkamiCust') ?>">Tentang Kami</a></li>
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
                        <h2>Jenis Bentuk Karton Box</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Jenis Bentuk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

        <section class="akame-news-area section-padding-0-80">
        <div class="container">
            <div class="row mx-sm-n4 akame-blog-masonary">

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/A1.jpg" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Bentuk Box Normal/Standard ( A1 )</a>
                            <p>Karton box model ini merupakan model standard yang paling banyak ditemukan serta paling dibutuhkan karena biaya produksinya yang tergolong rendah dan mudah dibuat. Pada dasarnya model box ini bisa digunakan untuk mempackaging/mengemas hampir semua barang. Cocok untuk: Makanan, Minuman, Snack, Kue, Pakaian, Automotive part, buku, electronic, briquete, lilin, sepatu, permata, books, movies, pupuk, rokok, buah,dll.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="500ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/a2.jpg" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Bentuk Box Overlap ( A2 )</a>
                            <p>Model karton box ini sebenarnya sama dengan model A1 namun memiliki penutup yang lebih beberapa inchi, milimeter, cm . Box ini biasanya digunakan untuk barang yang ditumpuk cukup banyak dan ditangani secara kasar. Dengan adanya penambahan beberapa milimeter pada bagian tutup akan menambah kekuatan perlindungan dari Barang di dalam kemasan. Makanan, Minuman, Snack, Kue, Pakaian, Automotive part, buku, electronic, briquete, lilin.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="800ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/a5.jpg" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Bentuk Box Full Overlap (A5)</a>
                            <p>Model karton box ini sebenarnya sama dengan model A1 namun kedua penutup(Flap) Mengisi penuh pada bagian tutupnya. Bentuk biasa kotak dengan dimensi Panjang x Lebar X Tinggi. Tutup atas/bawah atau flap tumpang tindih, ujung flap menuntup sampai ujung box. <br> Cocok untuk: Makanan, Minuman, Snack, Kue, Pakaian, Automotive part, buku, electronic, briquete, lilin, sepatu, permata, books, movies, pupuk.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="800ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/c3-c4.jpg" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Top – Bottom (C3-C4)</a>
                            <p>Model kardus ini sama seperti model C1,C2 tetapi pada bagian atas dan bawah box berupa flap atau model box A1 dan tinggi penutupnya memiliki tinggi yang sama dengan bagian badan box. Bagian tutup memiliki ukuran yang lebih besar daripada bagian badannya. </p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="800ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/die-cut.jpg" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Die-Cut (E)</a>
                            <p>Bentuk box tidak biasa , misalnya ada lobang ventilasi, lobang untuk pegangan dll. Proses pembuatan karton boxnya dengan menggunakan template pisau untuk menghasilkan suatu bentuk box  yang dingginkan. Box die-cut biasanya dipakai untuk makanan,minuman,box arsip dll</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Item -->
                <div class="col-12 col-sm-6 col-lg-4 px-4 akame-blog-masonary-item mb-50 wow fadeInUp" data-wow-delay="800ms">
                    <!-- Single Post Area -->
                    <div class="single-post-area">
                        <div class="post-thumbnail">
                            <a><img src="<?php echo base_url() ?>assets/images/pad.png" width="200" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a class="post-title">Pad</a>
                            <p>Bentuk box kotak tanpa tutup , berfungsi sebagai penguat karton agar tidak jebol/rusak, posisi pad biasanya didalam box. Penambahan Pad biasanya dipakai untuk pengepakan barang2 yang berat, seperti pengepakan kaleng, botol,serbuk chemicals, garment, dll.</p>
                        </div>
                    </div>
                </div>

        </div>
    </section>

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