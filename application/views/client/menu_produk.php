<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Pesan Sesuai Dengan Kebutuhan Anda</h1>
                <h2>Kami menyediakan berbagai macam corrugated box sesusai dengan
                    yang anda butuhkan</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="<?= site_url("auth") ?>" class="btn-get-started scrollto">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Jenis Box Yang Tersedia</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menu Produk</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <?php foreach ($box as $b) : ?>
                    <div class="col-md-3 mb-3">
                        <div class="card text-dark bg-light" style="max-width: 18rem;">
                            <img src="<?= base_url('assets/img/jenisbox/') . $b['image']; ?>" class="card-img-top" style="align-items: center;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;"><?= $b['jenis']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Cetak Kustom</h2>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="main-body">

            <div class="card mb-3">
                <a href="<?= site_url('client/multiplesave'); ?>"><img src="<?php echo base_url('assets/images/2.png'); ?>" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h4 class="card-title">Cetak Kustom</h4>
                    <h5 class="card-text">Disini anda dapat meng-kustom corrogated box anda sesuai
                        dengan yang anda inginkan
                    </h5>
                </div>
            </div>

        </div>
    </div>
</section>