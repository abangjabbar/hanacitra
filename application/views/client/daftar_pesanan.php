<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1><?= $title; ?></h1>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="" type="button" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#addOrder">
                        Tambah Order</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- End top2 -->


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#cari">FILTER</button>
                        <?php if ($filter['order_nomor'] !== null && $filter['order_nomor'] !== '') : ?>
                            <a type="button" class="btn btn-outline-primary" id="filter_order_nomor" disabled>Nomor Order : <?= $filter['order_nomor']; ?> <i class="far fa-times-circle"></i></a>
                        <?php endif; ?>
                        <?php if ($filter['status'] !== null && $filter['status'] !== '') : ?>
                            <a type="button" class="btn btn-outline-primary" id="filter_status" disabled>Status : <?= $filter['status']; ?> <i class="far fa-times-circle"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo $pagination; ?>
                    </div>
                </div>
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

<!-- Search Modal-->
<div class="modal fade" id="cari" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cariLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cariLabel">FILTER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <strong for="inputAddress">Nomor Order</strong>
                    <input type="text" class="form-control" id="order_nomor_filter_value" name="harga_item" value="<?= $filter['order_nomor']; ?>" placeholder="Nomor Order">
                </div>
                <div class="col-md-12">
                    <strong for="inputAddress">Status</strong>
                    <select id="status" value="<?= $filter['status']; ?>" class="form-control input-lg">
                        <option value="">Pilih Status</option>
                        <option value="Menunggu Submit">Menunggu Submit</option>
                        <option value="Menunggu Konfirmasi Admin">Menunggu Konfirmasi Admin</option>
                        <option value="Menunggu Submit Revisi">Menunggu Submit Revisi</option>
                        <option value="Order Berhasil, Menunggu Bukti Pembayaran">Order Berhasil, Menunggu Bukti Pembayaran</option>
                        <option value="Pembayaran Terkonfirmasi">Pembayaran Terkonfirmasi</option>
                        <option value="Menunggu Konfirmasi Pembayaran Dari Admin">Menunggu Konfirmasi Pembayaran Dari Admin</option>
                        <option value="Order Sedang Diproses">Order Sedang Diproses</option>
                        <option value="Order Dikirim">Order Dikirim</option>
                        <option value="Order Selesai">Order Selesai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="search" data-dismiss="modal">Search</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script type="text/javascript">
    var filterValue = <?= json_encode($filter); ?>;


    function reset(id) {
        $(id).val('');
        filter();
    }

    function filter() {


        $.ajax({
            url: "<?= base_url(); ?>client/daftarPesanan",
            method: "POST",
            data: {
                updateFilter: true,
                order_nomor: $('#order_nomor_filter_value').val(),
                status: $('#status').val()
            },
            success: function(data) {
                document.open();
                document.write(data);
                document.close();
            }
        })
    }
    $(document).ready(function() {
        $('#status').val(filterValue.status);
        $('#search').click(filter);
        $('#filter_order_nomor').click(() => reset('#order_nomor_filter_value'));
        $('#filter_status').click(() => reset('#status'));

    });
</script>