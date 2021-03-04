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
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Senin-Jumat: 8.00 to 16.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: 02187753730 / 02187753577</p>
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
                                    <li class="active"><a href="<?php echo site_url('hanacitra/beranda') ?>">Beranda</a></li>
                                    <li><a href="#">Produk</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo site_url('hanacitra/jenisBentuk') ?>">- Jenis Bentuk Box</a></li>
                                            <li><a href="<?php echo site_url('substances/jenisBahan') ?>">- Jenis Bahan Box</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Customer Kami</a></li>
                                    <li><a href="#">Galeri</a></li>
                                    <li><a href="<?php echo site_url('hanacitra/tentangkami') ?>">Tentang Kami</a></li>
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