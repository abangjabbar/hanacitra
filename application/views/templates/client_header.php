<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Fontawesome -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Favicons -->
    <link rel="icon" href="<?= base_url('assets/'); ?>images/logo-hana.png">
    <link href="<?= base_url('assets/'); ?>/arsha/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/'); ?>arsha/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>arsha/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/'); ?>arsha/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha - v4.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background: #20B2AA;">
        <div class="container d-flex align-items-center">

            <a href="index.html" class="logo me-auto"><img src="<?= base_url("assets/images/logo-hana.png"); ?>" alt="" class="img-fluid"></a>
            <h3 class="logo me-auto"><a href="<?= site_url('client'); ?>">HANA CITRA</a></h3>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= site_url('client/index'); ?>">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Jenis Bentuk Box</a></li>
                            <li><a href="#">Jenis Bahan Box</a></li>
                            <li><a href="#">Stok Bahan Box</a></li>
                        </ul>
                    </li>
                    <li><a href="#portfolio">Daftar Transaksi</a></li>
                    <li><a href="#team">Pengiriman</a></li>
                    <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Profil Perusahaan</a></li>
                            <li><a href="#">Kontak Kami</a></li>
                            <li><a href="#">Customer Kami</a></li>
                            <li><a href="#">Galeri</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('client/menuProduk'); ?>"><strong>Pesan Disini!</strong></a></li>
                    <li class="dropdown"><a href="#"><img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="70"> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= site_url('client/profil'); ?>">Profil Saya</a></li>
                            <li><a href="<?= site_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->