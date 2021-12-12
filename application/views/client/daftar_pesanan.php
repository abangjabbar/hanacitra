<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Daftar Transaksi</h1>
                <h2></h2>
            </div>
        </div>
    </div>

</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Session</th>
                        <th scope="col">Alamat Pengiriman</th>
                        <th class="text-center" scope="col">Detail Desain</th>
                        <th class="text-center" scope="col">Detail Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesanan as $order) : ?>
                        <tr class="inner-box">
                            <th scope="row">
                                <div class="event-date">
                                    <span><?= $i; ?></span>
                                </div>
                            </th>
                            <td class="center">
                                <h4><?= $order->nama_barang; ?></h4>
                            </td>
                            <td class="center">
                                <div class="event-wrap">
                                    <h3><a href="#"><?= $order->kualitas_nama; ?></a></h3>
                                    <div class="meta">
                                        <div class="organizers">
                                            <a href="#"><?= $order->subkualitas_nama; ?></a>
                                        </div>
                                        <div class="time">
                                            <span><?= $order->po_tgl; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="center">
                                <div class="r-no">
                                    <span><?= $order->alamat_pengiriman; ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="primary-btn">
                                    <a href="<?php echo base_url('client/detailImagePesanan/' . $order->id); ?>" class="btn btn-primary">Detail Desain</a>
                                </div>
                            </td>
                            <td class="center">
                                <div class="primary-btn">
                                    <a href="<?php echo base_url(); ?>client/detailpesanan/<?php echo $order->id; ?>" class="btn btn-primary">Detail Pesanan</a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Desain Pesanan</h5>
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