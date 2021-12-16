<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?= base_url('assets/'); ?>arsha/po/style.css" rel="stylesheet">

<section id="top">
    <div class="container">
        <div class="section-title">
            <h2><?= $title; ?> </h2>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="card border-dark mb-3">
                <div class="card-body">
                    <strong>Status Pesanan: </strong>
                    <?= $status ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($pesanan[0]->status == 1) : ?>
        <div class="container">
            <div class="col-md-12">
                <?= form_open_multipart('client/uploadBuktiTf'); ?>
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <p class="card-title">
                            <strong>Upload Bukti Transfer</strong>
                        </p>
                        <div class="input-group mb-3">
                            <input type="hidden" name="pesanan_id" id="pesanan_id" value="<?= $pesanan[0]->id; ?>">
                            <input type="file" for="image" class="form-control" id="image" name="image" value="<?= set_value('image'); ?>" multiple required>
                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="col-md-12">
            <?php foreach ($pesanan as $order) : ?>
                <div class="bg-white card mb-4 order-list shadow-sm">
                    <div class="gold-members p-4">
                        <a href="#">
                        </a>
                        <div class="media">
                            <div class="media-body">
                                <a href="#">
                                    <span class="float-right text-info" style="float: right;">Akan dikirimkan pada <br><?php echo date('d F Y', strtotime($order->deliv_tgl)); ?> <i class="icofont-check-circled text-success"></i></span>
                                </a>
                                <h5>
                                    ORDER <?= $order->id; ?>
                                </h5>
                                <h4 class="mb-2">
                                    <?= $order->nama_barang; ?>
                                </h4>
                                <h5 class="mb-2">
                                    Tipe Flute
                                    <br>
                                    <?= $order->kualitas_nama; ?>
                                </h5>
                                <h5 class="mb-2">
                                    Substance
                                    <br>
                                    <?= $order->subkualitas_nama; ?>
                                </h5>
                                <p class="text-gray mb-1"><i class="icofont-location-arrow"></i>Dengan Ukuran:
                                </p>
                                <table class="table table-striped" style="width: 40%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Panjang</th>
                                            <th style="text-align: center;">Lebar</th>
                                            <th style="text-align: center;">Tinggi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center" style="text-align: center;"><?= $order->panjang; ?>cm</td>
                                            <td class="center" style="text-align: center;"><?= $order->lebar; ?>cm</td>
                                            <td class="center" style="text-align: center;"><?= $order->tinggi; ?>cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h5>
                                    Kuantitas: <?= $order->kuantitas; ?>
                                </h5>
                                <p class="text-gray mb-1"><i class="icofont-location-arrow"></i>Deskripsi:
                                </p>
                                <div class="col-md-5">
                                    <p class="text-gray mb-1"><i class="icofont-location-arrow"></i>
                                        <?= $order->deskripsi; ?>
                                    </p>
                                </div>
                                <h5>Desain Box:</h5>
                                <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#desain">
                                    Detail Desain</a>
                                <br>
                                <br>
                                <div class="invoice-from">
                                    <small>dikirimkan ke</small>
                                    <address class="m-t-5 m-b-5">
                                        <strong class="text-inverse"><?= $order->company_name; ?></strong><br>
                                        <?= $order->alamat_pengiriman; ?><br>
                                        Phone: <?= $order->telp; ?><br>
                                        Fax:
                                    </address>
                                </div>
                                <hr>
                                <div style="float: right;">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>client/invoice/<?php echo $order->id; ?>"><i class="icofont-refresh"></i>INVOICE</a>
                                </div>
                                <p class="text-gray mb-3"><i class="icofont-list"></i> Pesanan ini dibuat pada <i class="icofont-clock-time ml-2"></i><?php echo date('d F Y, H:i', strtotime($order->po_tgl)); ?></p>
                                </p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nama Barang</th>
                                        <th>Kualitas</th>
                                        <th>Substance</th>
                                        <th class="right">Harga Item</th>
                                        <th class="center">Kuantitas</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <tr>
                                        <td class="center"><?= $i; ?></td>
                                        <td class="left"><?= $order->nama_barang; ?></td>
                                        <td class="left"><?= $order->kualitas_nama; ?></td>
                                        <td class="left"><?= $order->subkualitas_nama; ?></td>

                                        <td class="right"><?= "Rp " . number_format($order->harga_item, 2, ",", "."); ?></td>
                                        <td class="center"><?= $order->kuantitas; ?></td>
                                        <td class="right"><?= "Rp " . number_format($order->total_harga, 2, ",", "."); ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-sm-5">

                            </div>

                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right"><?= "Rp " . number_format($order->total_harga, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Diskon</strong>
                                            </td>
                                            <td class="right"><?= "Rp " . number_format($order->diskon, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>PPN</strong>
                                            </td>
                                            <td class="right"><?= "Rp " . number_format($order->ppn, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong><?= "Rp " . number_format($order->grand_total, 2, ",", "."); ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal Detail Desain Pesanan -->
<!-- Modal -->
<div class="modal fade" id="desain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="desainLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="desainLabel">Desain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="col-sm-12 mt-2">
                        <div class="row">
                            <?php foreach ($images as $image) : ?>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/drawing_client/' . $image['image']); ?>" alt="<?= $image['image']; ?>" class="img-thumbnail" style="width: 200%;">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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