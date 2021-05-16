 <!-- Breadcrumb Area Start -->
 <section class="breadcrumb-area section-padding-80">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="breadcrumb-content">
                     <h2>Corrugated Box</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Jenis Box</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Area End -->

 <div class="container">
     <div class="row no-gutters">
         <?php foreach ($box as $b) : ?>
             <div class="col-12 col-sm-4">
                 <div class="single-service-area mb-80 wow fadeInUp mx-auto">
                     <img src="<?= base_url('assets/img/jenisbox/') . $b['image']; ?>" alt="">
                     <h5><?= $b['jenis']; ?></h5>
                     <p><?= $b['keterangan']; ?></p>
                 </div>
             </div>
         <?php endforeach; ?>
     </div>
 </div>

 <hr>

 <!-- Breadcrumb Area Start -->
 <section class="breadcrumb-area section-padding-80">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="breadcrumb-content">
                     <h2>Cetak Costum</h2>
                 </div>
                 <hr>
                 <div class="single-images" style="margin-top:50px;margin: bottom 50px">
                     <a href="<?php echo site_url('auth') ?>"><img src="<?php echo base_url('assets/images/2.png'); ?>" href=""></a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Area End -->