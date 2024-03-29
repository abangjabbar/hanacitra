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
                        <?php if ($isEditEnabled == true) : ?>
                            <div class="text-gray-light">
                                <h3>Reject Order</h3>
                            </div>
                            <div class="address">Reject order apabila ada kesalahan ketika client input order</div>
                            <a data-toggle="modal" data-target="#reject" type=" button" class="btn btn-primary" width="400px">Reject</a>
                        <?php endif; ?>
                        <?php if (count($history) > 0) : ?>
                            <h5 class="to">History Reject Order</h5>
                            <div class="address">Berisi alasan mengapa order sempat direject</div>
                            <a data-toggle="modal" data-target="#history" type=" button" class="btn btn-primary">History Reject Order</a>
                        <?php endif; ?>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><?= $order->order_nomor; ?></h1>
                        <div class="date">Tanggal Order dibuat: <?= tgl_indonesia($order->tgl_order); ?></div>
                        <div class="date">Tanggal Pengiriman: <?= tgl_indonesia($order->tgl_pengiriman); ?></div>
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
                                        <strong><a href="<?= base_url(); ?>sales/detailDesain/<?= $row->id; ?>">Detail Desain</a></strong>
                                    </td>
                                    <td id="dengan-rupiah" class="unit"><?= $row->kuantitas; ?></td>
                                    <td class="unit">Rp
                                        <text id="<?= 'hargaItem-' . ($i - 1); ?>"> <?= $row->harga_item != null ? $row->harga_item : 0; ?> </text>
                                        <?php if ($isEditEnabled == true) : ?>
                                            <a href="#" data-toggle="modal" data-id="<?= $i - 1; ?>" data-target="#updateHargaItem">edit</a>
                                        <?php endif; ?>
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
                                <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
                                <tr>
                                    <td>
                                        <strong for="inputAddress">Grand Total</strong>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="grand_total" name="grand_total" value="<?= $order->grand_total != null ? $order->grand_total : 0; ?>" placeholder="Grand Total" readonly>
                                        <?= form_error('grand_total', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong for="inputAddress">Simpan</strong></td>

                                    <td>
                                        <?php if ($isEditEnabled == true) : ?>
                                            <button class="btn btn-primary" id="save">Save</button>
                                        <?php endif; ?>
                                        <?php if ($isEditEnabled == false) : ?>
                                            <p>Data Sudah Tersimpan</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if ($isKonfirmasiPembayaran == true) : ?>
                    <div class="col-sm-12 mt-2">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <h4>Surat Purchase order dan Bukti Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($images as $image) : ?>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <embed type="application/pdf" src="<?= base_url('assets/po_client/' . $image['image']); ?>" width="450" height="600"></embed>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#konfirmasi">Konfirmasi Pembayaran Berhasil</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal Submit Order -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
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
                <button type="button" id="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
            </div>
        </div>
    </div>
</div>


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

<!-- Reject Modal-->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Alasan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <strong for="inputAddress">Alasan</strong>
                    <textarea class="form-control" id="alasan" name="alasan" value="" placeholder="Alasan" required></textarea>
                    <?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="saveAlasan" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Harga Modal-->
<div class="modal fade" id="updateHargaItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Harga</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                        <strong for="inputAddress">Harga Item</strong>
                        <input type="number" class="form-control" id="harga_item" name="harga_item" value="<?= set_value('harga_item'); ?>" placeholder="Harga Item" required>
                        <?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="saveHargaItem" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script>
    $(document).ready(function() {

        const base_url = "<?= base_url(); ?>sales";

        $.ajax({
            url: "<?= base_url(); ?>sales/deleteNotif",
            method: "POST",
            data: {
                id: <?= $order->id; ?>
            },
            success: function() {
                console.log("Refreshing notif..");
                queryNotif(base_url);
            }
        })
    });
</script>


<script type="text/javascript">
    let index;
    var listBarang = <?= json_encode($barang); ?>;
    var order = <?= json_encode($order); ?>;
    let rawTotal;
    let ppn;
    calculateGrandTotal();

    function onclick(event) {
        event.preventDefault();
        const barang = listBarang[index];
        barang.harga_item = $('#harga_item').val();
        barang.total_harga = barang.kuantitas * barang.harga_item;
        listBarang[index] = barang;
        $('#hargaItem-' + index).html(barang.harga_item);
        $('#totalHargaItem-' + index).html(barang.total_harga);
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        rawTotal = calculateRawTotal();
        ppn = Math.ceil(0.1 * rawTotal);
        const diskon = $('#diskon').val();
        const grandTotal = rawTotal + ppn - diskon;

        $('#ppn').val(ppn);
        $('#grand_total').val(grandTotal);
    }

    function calculateRawTotal() {
        rawTotal = 0;
        listBarang.forEach(barang => {
            rawTotal = rawTotal + barang.total_harga * 1;
        });
        return rawTotal;
    }

    function onChangeDiskon() {
        const diskon = $('#diskon').val();
        const grandTotal = rawTotal + ppn - diskon;
        $('#grand_total').val(grandTotal);
    }

    $(document).ready(function() {

        $('#saveHargaItem').click(onclick);

        $('#updateHargaItem').on('shown.bs.modal', function(event) {
            index = $(event.relatedTarget).data('id');
        });

        $('#diskon').keyup(onChangeDiskon);

        $('#save').click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>sales/updateHarga",
                method: "POST",
                data: {
                    order_id: order.id,
                    id: order.harga_order_id,
                    ppn: $('#ppn').val(),
                    diskon: $('#diskon').val(),
                    grand_total: $('#grand_total').val(),
                    listBarang: JSON.stringify(listBarang)
                },
                success: function() {
                    alert("Order information updated!");
                    window.location.replace("<?php echo base_url(); ?>sales/daftarorder");
                },
                error: function() {
                    alert("Order information update failed!");
                    window.location.replace("<?php echo base_url(); ?>sales/daftarorder");
                }
            })
        });

        $('#saveAlasan').click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>sales/saveAlasan",
                method: "POST",
                data: {
                    order_id: order.id,
                    alasan: $('#alasan').val()
                },
                success: function() {
                    alert("Berhasil ter-reject!");
                    window.location.replace("<?php echo base_url(); ?>sales/daftarorder");
                }
            })
        });

        $('#submit').click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>sales/submitOrder",
                method: "POST",
                data: {
                    id: order.id,
                },
                success: function() {
                    alert("Berhasil disubmit!");
                    window.location.replace("<?php echo base_url(); ?>sales/daftarorder");
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