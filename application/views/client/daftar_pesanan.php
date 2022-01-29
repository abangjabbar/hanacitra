<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1><?= $title; ?></h1>
                <?php if ($order == true) : ?>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="" type="button" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#addOrder">
                            Tambah Order</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section><!-- End top2 -->

<section>
    <?php if ($order == false) : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <h4 style="text-align: center;">
                            <?= $status ?>
                        </h4>
                        <p style="text-align: center;">Silahkan pesan corrugated box sesuai dengan yang anda butuhkan!</p>
                        <hr>
                        <div class="primary-btn center" style="text-align: center;">
                            <a href="<?php echo base_url('client/tambahOrder'); ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrder">Pesan Disini!</a>
                        </div>
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
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <?php foreach ($order as $order) : ?>
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row gutters-sm">
                                <div class="col-md-8 mb-3">
                                    <br>
                                    <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day"><?= date('d', strtotime($order->tgl_order)); ?></span>
                                                <span class="widget-49-date-month"><?= date('M', strtotime($order->tgl_order)); ?></span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title"><?= $order->order_nomor; ?></span>
                                                <span class="widget-49-meeting-time"><?= tgl_indonesia($order->tgl_order); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <ol class="widget-49-meeting-points">
                                            <?php foreach ($barang[$order->id] as $stuff) : ?>
                                                <li class="widget-49-meeting-item"><span><?= $stuff->nama_barang; ?></span></li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <div class="widget-49-meeting-info">
                                                        <strong class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"><?= $order->status; ?></span></strong>
                                                        <p><?= $status[$order->id]; ?></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 mb-3">
                                    <div class="primary-btn" style="float: right;">
                                        <a href="<?php echo base_url(); ?>client/order/<?php echo $order->id; ?>" class="btn btn-primary">Detail Pesanan</a>
                                    </div>
                                    <h5 class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total Pembayaran:</span>
                                        <?php foreach ($harga[$order->id] as $stuff) : ?>
                                            <?= "Rp " . number_format($stuff->grand_total, 2, ",", "."); ?>
                                        <?php endforeach; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- Modal Tambah Order Desain Pesanan -->
<div class="modal fade" id="addOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addOrderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderLabel">Tambah Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="col-sm-12 mt-2">
                        <div class="row">
                            <?= form_open_multipart('client/tambahOrder'); ?>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" id="order_nomor" name="order_nomor" value="<?php echo $nomorOrder; ?>" hidden>
                                <?= form_error('order_nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Alamat Pengiriman</label>
                                <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= set_value('alamat_pengiriman'); ?>" placeholder="Alamat Pengiriman">
                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="date">Tanggal Pengiriman</label>
                                <input type="date" id="tgl_pengiriman" name="tgl_pengiriman" class="form-control date-input" value="<?= set_value('tgl_pengiriman'); ?>" placeholder="DD-MM-YYYY">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>