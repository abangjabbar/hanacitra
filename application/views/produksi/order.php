<section id="top2" class="d-flex align-items-center">

    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>
    </div>

</section><!-- End top2 -->

<section>
    <div class="container">
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div class="row contacts">
                    <div class="col invoice-to">
                        <?php if (count($history) > 0) : ?>
                            <h5 class="to">History Reject Order</h5>
                            <div class="address">Berisi alasan mengapa order sempat direject</div>
                            <a data-toggle="modal" data-target="#history" type=" button" class="btn btn-primary">History Reject Order</a>
                        <?php endif; ?>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><?= $order->order_nomor; ?></h1>
                        <div class="date">Tanggal Order dibuat: <?= $order->tgl_order; ?></div>
                        <div class="date">Tanggal Pengiriman: <?= $order->tgl_pengiriman; ?></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" style="width: 2000px;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th class="text-left" width="300px">NAMA BARANG</th>
                                <th scope="col" class="text-left">PANJANG</th>
                                <th scope="col" class="text-center">LEBAR</th>
                                <th scope="col" class="text-left">TINGGI</th>
                                <th scope="col">SUBSTANCE</th>
                                <th scope="col" class="text-left" width="200px">KUALITAS</th>
                                <th scope="col" class="text-left" width="300px">DESKRIPSI</th>
                                <th scope="col" class="text-left" width="300px">DETAIL DESAIN</th>
                                <th scope="col" class="text-right">KUANTITAS</th>
                                <th scope="col" class="text-right">HARGA PER ITEM</th>
                                <th scope="col" class="text-right" width="300px">TOTAL HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang as $row) : ?>
                                <tr scope="row">
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td id="dengan-rupiah" class="text-left">
                                        <strong><?= $row->nama_barang; ?></strong>
                                    </td>
                                    <td id="dengan-rupiah" class="qty"><?= $row->panjang; ?></td>
                                    <td id="dengan-rupiah" class="qty"><?= $row->lebar; ?></td>
                                    <td id="dengan-rupiah" class="qty"><?= $row->tinggi; ?></td>
                                    <td id="dengan-rupiah" class="text-center"><?= $row->kualitas_nama; ?></td>
                                    <td id="dengan-rupiah" class="text-left"><?= $row->subkualitas_nama; ?></td>
                                    <td id="dengan-rupiah" class="text-left"><?= $row->deskripsi; ?></td>
                                    <td id="dengan-rupiah" class="text-left">
                                        <strong><a href="<?= base_url(); ?>produksi/detailDesain/<?= $row->id; ?>">Detail Desain</a></strong>
                                    </td>
                                    <td id="dengan-rupiah" class="unit"><?= $row->kuantitas; ?></td>
                                    <td class="unit">Rp
                                        <text id="<?= 'hargaItem-' . ($i - 1); ?>"> <?= $row->harga_item != null ? $row->harga_item : 0; ?> </text>
                                    </td>
                                    <td class="total">Rp
                                        <text id="<?= 'totalHargaItem-' . ($i - 1); ?>"> <?= $row->total_harga != null ? $row->total_harga : 0; ?></text>
                                    </td>
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
                                <?= form_open_multipart(); ?>
                                <tr>
                                    <td class="left">
                                        <strong>PPN</strong>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="ppn" name="ppn" value="<?= $order->ppn != null ? $order->ppn : 0; ?>" placeholder="PPN" readonly>
                                        <?= form_error('ppn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </td>
                                </tr>
                                <input hidden type="text" class="form-control" id="diskon" name="diskon" value="<?= $order->diskon != null ? $order->diskon : 0; ?>" placeholder="Diskon">
                                <tr>
                                    <td>
                                        <strong for="inputAddress">Grand Total</strong>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="grand_total" name="grand_total" value="<?= $order->grand_total != null ? $order->grand_total : 0; ?>" placeholder="Nama Barang" readonly>
                                        <?= form_error('grand_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if ($isKonfirmasiOrder == true) : ?>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#konfirmasi"><?= $buttonName; ?></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- History Reject Modal-->
<div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">History Alasan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <?php foreach ($history as $row) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h5><?= $row->tgl_alasan; ?></h5>
                                <h5><?= $row->alasan; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Submit Order -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Order</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin?</h4>
                <p>Periksa kembali sebelum melakukan konfirmasi!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script>
    $(document).ready(function() {

        const base_url = "<?= base_url(); ?>produksi";

        $.ajax({
            url: "<?= base_url(); ?>produksi/deleteNotif",
            method: "POST",
            data: {
                id: <?= $order->id; ?>
            },
            success: function() {
                console.log("Refreshing notif..");
                queryNotif(base_url);
            }
        })

        $('#submit').click(function() {
            console.log("log");
            $.ajax({
                url: "<?php echo base_url(); ?>produksi/KonfirmasiOrder",
                method: "POST",
                data: {
                    id: <?= $order->id; ?>,
                    status: "<?= $nextStatus; ?>"
                },
                success: function() {
                    alert("Berhasil dikonfirmasi!");
                    window.location.replace("<?php echo base_url(); ?>produksi/daftarorder");
                }
            })
        });
    });
</script>
<style>
    .scroll {
        height: 400 px;
        overflow: scroll;
    }
</style>