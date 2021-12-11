<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Daftar Transaksi</h1>
                <h2>Kami menyediakan berbagai macam corrugated box sesusai dengan
                    yang anda butuhkan</h2>
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
                        <th scope="col">Speakers</th>
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