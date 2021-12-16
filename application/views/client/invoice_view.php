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
            <?php foreach ($pesanan as $order) : ?>
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="invoice">
                            <!-- begin invoice-company -->
                            <div class="invoice-company text-inverse f-w-600">
                                <span class="pull-right hidden-print">
                                    <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                                </span>
                                CV. HANA CITRA BUANA
                            </div>
                            <!-- end invoice-company -->
                            <!-- begin invoice-header -->
                            <div class="invoice-header">
                                <div class="invoice-from">
                                    <small>from</small>
                                    <address class="m-t-5 m-b-5">
                                        <strong class="text-inverse">CV. HANA CITRA BUANA</strong><br>
                                        Pedurenan Depok No. 30<br>
                                        RT.005 RW.001 Cisalak Pasar<br>
                                        Cimanggis - Depok<br>
                                        Phone: (021) 87753730, 87754577<br>
                                    </address>
                                </div>
                                <div class="invoice-to">
                                    <small>to</small>
                                    <address class="m-t-5 m-b-5">
                                        <strong class="text-inverse"><?= $order->company_name; ?></strong><br>
                                        <?= $order->alamat; ?><br>
                                        Phone: <?= $order->telp; ?><br>
                                        Fax: (123) 456-7890
                                    </address>
                                </div>
                                <div class="invoice-date">
                                    <small>Invoice</small>
                                    <div class="date text-inverse m-t-5"><?= date('d F Y', strtotime($order->po_tgl)); ?></div>
                                    <div class="invoice-detail">
                                        <?= $order->id; ?><br>
                                        <?= $order->nama_barang; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end invoice-header -->
                            <!-- begin invoice-content -->
                            <div class="invoice-content">
                                <!-- begin table-responsive -->
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
                                <!-- end table-responsive -->
                                <!-- begin invoice-price -->
                                <div class="invoice-price">
                                    <div class="invoice-price-left">
                                        <div class="invoice-price-row">
                                            <div class="sub-price">
                                                <small>SUBTOTAL</small>
                                                <span class="text-inverse"><?= "Rp " . number_format($order->total_harga, 2, ",", "."); ?></span>
                                            </div>
                                            <div class="sub-price">
                                                <i class="fa fa-plus text-muted"></i>
                                            </div>
                                            <div class="sub-price">
                                                <small>PPN (10%)</small>
                                                <span class="text-inverse"><?= "Rp " . number_format($order->ppn, 2, ",", "."); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-price-right">
                                        <small>TOTAL</small> <span class="f-w-600"><?= "Rp " . number_format($order->grand_total, 2, ",", "."); ?></span>
                                    </div>
                                </div>
                                <!-- end invoice-price -->
                            </div>
                            <!-- end invoice-content -->
                            <!-- begin invoice-note -->
                            <div class="invoice-note">
                                * Batas pembayaran adalah 30 hari<br>
                            </div>
                            <!-- end invoice-note -->
                            <br>
                            <!-- begin invoice-footer -->
                            <div class="invoice-footer">
                                <p class="text-center m-b-5 f-w-600">
                                    TERIMA KASIH ATAS KERJA SAMANYA
                                </p>
                                <p class="text-center">
                                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> hanacitrabuana.com</span>
                                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i>0815-1013-8243 / 0858-1080-4954</span>
                                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> hanacitrabuana@gmail.com</span>
                                </p>
                            </div>
                            <!-- end invoice-footer -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>