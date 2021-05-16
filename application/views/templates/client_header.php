<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/./img/core-img/favicon.ico') ?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css') ?>">

    <script src="https://kit.fontawesome.com/e590c2247f.js" crossorigin="anonymous"></script>

    <style>
        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }
    </style>

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
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Senin-Jumat: 8.00 to 16.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: 02187753730 / 02187753577 </p>
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
                        <a class="nav-brand" href=""><img Src="<?php echo base_url() ?>assets/images/logo-hcb.png" width="250"></a>

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
                                    <li <?= $this->uri->segment(2) == 'index' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
                                        <a href=" <?php echo site_url('home') ?>">Beranda</a>
                                    </li>
                                    <li class="dropdown <?= $this->uri->segment(2) == 'jenisBentuk' ? 'active' : '' ?>"><a href="#">Produk</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo site_url('home/cetakCustom') ?>">- Cetak Custom</a></li>
                                            <li><a href="<?php echo site_url('home/jenisBentuk') ?>">- Jenis Bentuk Box</a></li>
                                            <li><a href="<?php echo site_url('home/jenisBahan') ?>">- Jenis Bahan Box</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pesanan</a></li>
                                    <li><a href="#">Transaksi</a></li>
                                    <li><a href="#">Kemajuan Pesanan</a></li>
                                    <li> <a href="#">Tentang Kami</a></li>
                                    <li class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="40" height="40" class="rounded-circle">
                                        </a>
                                        <ul class="dropdown">
                                            <a class="dropdown-item" href="<?php echo site_url('client/profil') ?>">Profil</a>
                                            <a class="dropdown-item" href="#">Edit Profile</a>
                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logingoutModal">Log Out</a>
                                        </ul>
                                    </li>
                                    <!-- Nav Item - User Information -->
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->