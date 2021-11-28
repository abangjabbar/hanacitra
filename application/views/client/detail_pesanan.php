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
                                <?php foreach ($pesanan as $order) : ?>
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
                                <?php endforeach; ?>
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
                                        <td class="right">$8.497,00</td>
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
                                            <strong>$7.477,36</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</section>