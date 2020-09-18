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
                                    <li class="active"><a href="<?php echo site_url('hanacitra/berandaCust') ?>">Beranda</a></li>
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
                                    <li><a href="<?php echo site_url('hanacitra/tentangkamiCust') ?>">Tentang Kami</a></li>
                                </ul>

                                <!-- Book Icon -->
                                <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                    <a href="<?php echo site_url('orders/addNewOrderCust') ?>" class="btn akame-btn">Pesan Sekarang</a>
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

    <div class="container body-container">
        <div class="center">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('orders') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('orders/addOrderCust2 ') ?>" method="post" enctype="multipart/form-data" >

                           <div class="form-group">
                                <label for="kualitas">Kualitas*</label>
                                <select class="form-control input-lg" name="kualitas" id="kualitas" required>
                                    <option value="">Pilih Kualitas</option>
                                    <?php 
                                    foreach($kualitas as $row)
                                    echo '<option value="'.$row->id_kualitas.'">'.$row->kualitas_name.'</option>';
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="subkualitas" id="subkualitas" class="form-control input-lg">
                                    <option value="">Pilih Subkualitas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="harga_subkualitas" id="harga_subkualitas" class="form-control input-lg">
                                    <option value="">Pilih</option>
                                </select>   
                            </div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>
        </div>
    </div>


   <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"></a>

                        <p class="mb-30">We would love to serve you and let you enjoy your culinary experience. Excepteur sint occaecat cupidatat non proident.</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Opening times</h4>

                        <!-- Open Times -->
                        <div class="open-time">
                            <p>Monday: Friday: 10.00 - 23.00</p>
                            <p>Saturday: 10.00 - 19.00</p>
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
                        <h4 class="widget-title">Contact Us</h4>

                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Tel: (+12) 345 678 910</p>
                            <p>E-mail: Hello.colorlib@gmail.com</p>
                            <p>Address: Iris Watson, P.O. Box 283 8562 Fusce Rd, NY</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#kualitas').change(function() {
                var id_kualitas = $('#kualitas').val();
                if(id_kualitas != '')
                {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/orders/fetch_subkualitas",
                        method:"POST",
                        data:{
                            id_kualitas: id_kualitas
                        },
                        success:function(data)
                        {
                            $('#subkualitas').html(data);
                        }
                    })
                }
            });
            
            $('#subkualitas').change(function(){
                var id_subkualitas = $('#subkualitas').val();
                if(id_subkualitas != '')
                {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/orders/fetch_harga_subkualitas",
                        method:"POST",
                        data:{
                            id_subkualitas:id_subkualitas
                        },
                        success:function(data)
                        {
                            $('#harga_subkualitas').html(data);
                        }
                    })
                }
            });

        });
        </script>   



    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- All Plugins -->
    <script src="<?php echo base_url('assets/js/akame.bundle.js')?>"></script>
    <!-- Active -->
    <script src="<?php echo base_url('assets/js/default-assets/active.js')?>"></script>
    

</body>

</html>