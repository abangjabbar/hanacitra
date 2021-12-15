<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1><?= $title; ?></h1>
                <h2></h2>
            </div>
        </div>
    </div>

</section><!-- End top2 -->

<section>
    <?php if ($pesanan == false) : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <h4 style="text-align: center;">
                            <?= $status ?>
                        </h4>
                        <hr>
                        <div class="primary-btn center" style="text-align: center;">
                            <a href="<?php echo base_url('client/multiplesave'); ?>" class="btn btn-primary">Pesan Disini!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?php foreach ($pesanan as $order) : ?>
                    <div class="card card-margin" style="width: 70rem;">
                        <div class="card-header no-border">
                        </div>
                        <div class="card-body pt-0">
                            <div class="row gutters-sm">
                                <div class="col-md-9 mb-3">
                                    <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day"><?= date('d', strtotime($order->po_tgl)); ?></span>
                                                <span class="widget-49-date-month"><?= date('M', strtotime($order->po_tgl)); ?></span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title"><?= $order->id; ?></span>
                                                <span class="widget-49-meeting-time"><?= date('l, d F Y', strtotime($order->po_tgl)); ?></span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <li class="widget-49-meeting-item"><span><?= $order->nama_barang; ?></span></li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <div class="widget-49-meeting-info">
                                                        <span class="widget-49-pro-title"><?= $status ?></span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <?php if ($pesanan[0]->status == 1) : ?>
                                                        <a href="<?php echo base_url(); ?>client/detailpesanan/<?php echo $order->id; ?>" style="float: right;">Klik untuk upload bukti pembayaran</a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 mb-3">
                                    <div class="primary-btn" style="float: right;">
                                        <a href="<?php echo base_url(); ?>client/detailpesanan/<?php echo $order->id; ?>" class="btn btn-primary">Detail Pesanan</a>
                                    </div>
                                    <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total Pembayaran:</span>
                                        <?= "Rp " . number_format($order->grand_total, 2, ",", "."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- Modal Detail Desain Pesanan -->
<div class="modal fade" id="desain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="desainLabel">Desain Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($groupImage as $group) : ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?= base_url('assets/drawing_client/' . $group['image']); ?>" alt="<?= $group['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="card-footer">
                                    <a href="<?= base_url('client/detail/' . $group['group_image']); ?>" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>