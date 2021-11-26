<section id="hero" class="d-flex align-items-center">

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
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Daftar Transaksi</h2>
        </div>
        <div class="row">
            <div class="col-md-8 align-items-center">
                <?php foreach ($pesanan as $order) : ?>
                    <div class="card bg-light mb-3">
                        <h5 class="card-header">Pesanan</h5>
                        <div class="card-body text-dark">
                            <h5 class="card-title"><?= $order->id; ?></h5>
                            <p class="card-text"><?= $order->nama_barang; ?></p>
                            <p class="card-text"><?= $order->po_tgl; ?></p>
                            <a href="<?= site_url('client/detailPesanan'); ?>" class="btn btn-primary">Detail pesanan</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container">
        <?= $this->session->flashdata('message'); ?>

        <div class="table-responsive custom-table-responsive">

            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Order</th>
                        <th scope="col">Nama Projek Pesanan</th>
                        <th scope="col">Material</th>
                        <th scope="col">Substance</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Alamat Pengiriman</th>
                        <th scope="col">Desain Box</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesanan as $order) : ?>
                        <tr scope="row">
                            <td>
                                <?= $i; ?>
                            </td>
                            <td><?= $order->id; ?></td>
                            <td><?= $order->nama_barang; ?></td>
                            <td><?= $order->kualitas_nama; ?></td>
                            <td><?= $order->subkualitas_nama; ?></td>
                            <td><?= $order->deskripsi; ?></td>
                            <td><?= $order->kuantitas; ?></td>
                            <td><?= $order->alamat_pengiriman; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>client/detailImagePesanan/<?php echo $order->id; ?>" class="btn btn-primary">Detail</a>
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