<section id="top2" class="d-flex align-items-center">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="scroll">
            <div class="table-responsive">
                <table class="table custom-table" style="width:1200px;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Panjang</th>
                            <th scope="col">Lebar</th>
                            <th scope="col">Tinggi</th>
                            <th scope="col">Substance</th>
                            <th scope="col">Kualitas</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga Per Item</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $row) : ?>
                            <tr scope="row">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td id="dengan-rupiah"><?= $row->nama_barang; ?></td>
                                <td id="dengan-rupiah"><?= $row->panjang; ?></td>
                                <td id="dengan-rupiah"><?= $row->lebar; ?></td>
                                <td id="dengan-rupiah"><?= $row->tinggi; ?></td>
                                <td id="dengan-rupiah"><?= $row->kualitas_nama; ?></td>
                                <td id="dengan-rupiah"><?= $row->subkualitas_nama; ?></td>
                                <td id="dengan-rupiah"><?= $row->kuantitas; ?></td>
                                <td id="dengan-rupiah"><?= $row->deskripsi; ?></td>
                                <td>Rp
                                    <text id="<?= 'hargaItem-' . ($i - 1); ?>"> <?= $row->harga_item != null ? $row->harga_item : 0; ?> </text>
                                    <?php if ($isEditEnabled == true) : ?>
                                        <a href="#" data-toggle="modal" data-id="<?= $i - 1; ?>" data-target="#updateHargaItem">edit</a>
                                    <?php endif; ?>
                                </td>
                                <td>Rp
                                    <text id="<?= 'totalHargaItem-' . ($i - 1); ?>"> <?= $row->total_harga != null ? $row->total_harga : 0; ?></text>
                                </td>
                                <td></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" style="float:right;">
                <div class="card-body">
                    <?= form_open_multipart(); ?>
                    <div class="col-md-12 mb-3">
                        <strong for="inputAddress">PPN</strong>
                        <input type="text" class="form-control" id="ppn" name="ppn" value="<?= $order->ppn != null ? $order->ppn : 0; ?>" placeholder="PPN" readonly>
                        <?= form_error('ppn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <strong for="inputAddress">Diskon</strong>
                        <input type="text" class="form-control" id="diskon" name="diskon" value="<?= $order->diskon != null ? $order->diskon : 0; ?>" placeholder="Diskon">
                        <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <strong for="inputAddress">Grand Total</strong>
                        <input type="text" class="form-control" id="grand_total" name="grand_total" value="<?= $order->grand_total != null ? $order->grand_total : 0; ?>" placeholder="Nama Barang" readonly>
                        <?= form_error('grand_total', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <?php if ($isEditEnabled == true) : ?>
                        <button class="btn btn-primary" id="save">Save</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php if ($isEditEnabled == true) : ?>
            <a data-toggle="modal" data-target="#reject" type=" button" class="btn btn-primary">Reject</a>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <?php if (count($history) > 0) : ?>
            <a data-toggle="modal" data-target="#history" type=" button" class="btn btn-primary">History Alasan Revisi</a>
        <?php endif; ?>
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
                    <div class="col-md-12 mb-3">
                        <strong for="inputAddress">Alasan</strong>
                        <textarea class="form-control" id="alasan" name="alasan" value="" placeholder="Alasan" required></textarea>
                        <?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="saveAlasan" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
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
        console.log(rawTotal);
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
                }
            })
        });

        $('#saveAlasan').click(function() {
            console.log("save");
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

    });
</script>
<style>
    .scroll {
        height: 400 px;
        overflow: scroll;
    }
</style>