<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: center;">
                <div class="breadcrumb-content">
                    <h3>Halaman Order</h3>
                    <p>Pastikan Pesanan yang Dibuat Sudah Sesuai Dengan Keinginan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php foreach ($order as $row) : ?>
            <div class="col-md-12">
                <h4>ORDER <?= $row->order_nomor; ?></h4>
            </div>
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <h5>Status Pesanan: </h5>
                        <strong><?= $row->status; ?></strong>
                        <p> <?= $status; ?> </p>
                        <?php if (count($history) > 0) : ?>
                            <div class="col-md-12">
                                <a type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#history">History Alasan Revisi</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if ($order[0]->status == "Menunggu Submit") : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label for="inputCity">Tanggal Pengiriman</label>
                            <input type="date" class="form-control" id="tgl_pengiriman" value="<?= $order[0]->tgl_pengiriman; ?>" name="deliv_tgl">
                            <?= form_error('tgl_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputAddress">Alamat Pengiriman</label>
                            <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= $order[0]->alamat_pengiriman; ?>" placeholder="Alamat Lengkap">
                            <?= form_error('alamat_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3" style="float: right;">
                            <button id="update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($order[0]->status == "Menunggu Submit Revisi") : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label for="inputCity">Tanggal Pengiriman</label>
                            <input type="date" class="form-control" id="tgl_pengiriman" value="<?= $order[0]->tgl_pengiriman; ?>" name="deliv_tgl">
                            <?= form_error('tgl_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputAddress">Alamat Pengiriman</label>
                            <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= $order[0]->alamat_pengiriman; ?>" placeholder="Alamat Lengkap">
                            <?= form_error('alamat_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3" style="float: right;">
                            <button id="update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label for="inputCity">Tanggal Pengiriman</label>
                            <input readonly type="date" class="form-control" id="tgl_pengiriman" value="<?= $order[0]->tgl_pengiriman; ?>" name="deliv_tgl">
                            <?= form_error('tgl_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputAddress">Alamat Pengiriman</label>
                            <input readonly type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= $order[0]->alamat_pengiriman; ?>" placeholder="Alamat Lengkap">
                            <?= form_error('alamat_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <br>
    <?php if ($order[0]->status == "Menunggu Bukti Pembayaran") : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <div class="card-header">
                            Silahkan unggah bukti pembayaran dan surat purchase order anda
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <?= form_open_multipart('client/uploadPO'); ?>
                                <div class="col-sm-8">
                                    <!-- <input type="hidden" name="id" value=""> -->
                                    <input type="hidden" name="order_id" id="order_id" value="<?= $order[0]->id; ?>">
                                    <div class="col-sm-12">
                                        <input type="file" for="image" class="form-control" id="image" name="image[]" value="<?= set_value('image'); ?>" multiple required>
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Unggah</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($order[0]->status == "Menunggu Submit") : ?>
        <div class="container">
            <div class="col-md-12 mb-3">
                <h5>Silahkan tambahkan item yang ingin anda pesan</h5>
                <a href="<?php echo base_url(); ?>client/tambahBarang/<?php echo $order['0']->id; ?>" class="btn btn-primary">+Tambah Item</a>
            </div>
        </div>
    <?php elseif ($order[0]->status == "Menunggu Submit Revisi") : ?>
        <div class="container">
            <div class="col-md-12 mb-3">
                <h5>Silahkan tambahkan item yang ingin anda pesan</h5>
                <a href="<?php echo base_url(); ?>client/tambahBarang/<?php echo $order['0']->id; ?>" class="btn btn-primary">+Tambah Item</a>
            </div>
        </div>
    <?php endif; ?>
    <br>
    </div>
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-header">
                <p>Daftar Item yang Anda Pesan</p>
            </div>
            <div class="card-body">
                <div class="scroll">
                    <div class="table-responsive custom-table-responsive">
                        <table class="table custom-table table-hover" class="center" style="width:1400px;">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" style="text-align: center;">No.</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Susbstance</th>
                                    <th scope="col">Kualitas</th>
                                    <th scope="col">Deskripisi</th>
                                    <th scope="col">Desain Box</th>
                                    <th scope="col">Panjang</th>
                                    <th scope="col">Lebar</th>
                                    <th scope="col">Tinggi</th>
                                    <th scope="col" style="text-align:center;">Kuantitas</th>
                                    <?php if ($order[0]->status == "Menunggu Submit") : ?>
                                        <th scope="col" style="text-align:center;">Aksi</th>
                                    <?php elseif ($order[0]->status == "Menunggu Submit Revisi") : ?>
                                        <th scope="col" style="text-align:center;">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang as $row) : ?>
                                    <tr scope=" row">
                                        <td style="text-align: center;"><?= $i; ?></td>
                                        <td><?= $row->nama_barang; ?> </td>
                                        <td><?= $row->kualitas_nama; ?> </td>
                                        <td><?= $row->subkualitas_nama; ?> </td>
                                        <td><?= $row->deskripsi; ?> </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#desain"><strong>
                                                    Detail Desain</strong></a>
                                        </td>
                                        <td><?= $row->panjang; ?>cm </td>
                                        <td><?= $row->lebar; ?>cm </td>
                                        <td><?= $row->tinggi; ?>cm </td>
                                        <td style="text-align:center;"><?= $row->kuantitas; ?> </td>
                                        <?php if ($order[0]->status == "Menunggu Submit") : ?>
                                            <td style="width: 11%;">
                                                <a href="<?php echo base_url(); ?>client/editBarang/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">
                                                    Edit</a>
                                                <form action="<?= site_url('client/hapusBarang'); ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $row->id; ?>">
                                                    <input type="hidden" name="order_id" value="<?= $row->order_id; ?>">
                                                    <button class="btn btn-danger btn-sm">
                                                        Hapus</button>
                                                </form>
                                            </td>
                                        <?php elseif ($order[0]->status == "Menunggu Submit Revisi") : ?>
                                            <td style="width: 11%;">
                                                <a href="<?php echo base_url(); ?>client/editBarang/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">
                                                    Edit</a>
                                                <form action="<?= site_url('client/hapusBarang'); ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $row->id; ?>">
                                                    <input type="hidden" name="order_id" value="<?= $row->order_id; ?>">
                                                    <button class="btn btn-danger btn-sm">
                                                        Hapus</button>
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php if ($order[0]->status == "Menunggu Submit" || $order[0]->status == "Menunggu Submit Revisi") : ?>
            <div class="container">
                <div class="col-md-4 mb-3" style="float: right;">
                    <h4 Style="text-align: right;">Silahkan submit order anda</h4>
                    <button type="submit" data-bs-toggle="modal" data-id="<?= $order[0]->user_id; ?>" data-bs-target="#submit" class="btn btn-lg btn-primary" style="float: right;">
                        Submit</button>
                </div>
            </div>
        <?php endif; ?>

</section>

<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script>
    $(document).ready(function() {

        const base_url = "<?= base_url(); ?>/client";

        $.ajax({
            url: "<?= base_url(); ?>client/deleteNotif",
            method: "POST",
            data: {
                id: <?= $order[0]->id; ?>
            },
            success: function() {
                console.log("Refreshing notif..");
                queryNotif(base_url);
            }
        })

        $('#update').click(function() {
            const href = window.location.href;
            $.ajax({
                url: "<?php echo base_url(); ?>client/updateOrder",
                method: "POST",
                data: {
                    orderId: href.substring(href.lastIndexOf('/') + 1),
                    tgl_pengiriman: $('#tgl_pengiriman').val(),
                    alamat_pengiriman: $('#alamat_pengiriman').val()
                },
                success: function() {
                    alert("Order information updated!")
                }
            })
        });

    });
</script>

<!-- History Reject Modal-->
<div class="modal fade" id="history" tabindex="-1" aria-labelledby="historyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyLabel">History Alasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal Detail Desain Pesanan -->

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
                            <?php foreach ($images as $hhh) : ?>
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/drawing_client/' . $hhh->image); ?>" alt="<?= $hhh->image; ?>" class="img-thumbnail" style="width: 200%;">
                                        </div>
                                    </div>
                                    <?php var_dump($image); ?>
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

<!-- Modal Submit Order -->
<div class="modal fade" id="submit" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitLabel">Submit Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah Order Anda Sudah Sesuai?</h4>
                <p>Periksa kembali pesanan anda sebelum melakukan submit order!</p>
            </div>
            <div class="modal-footer">
                <?= form_open_multipart('client/submitOrder'); ?>
                <input hidden id="id" name="id" value="<?= $order['0']->id; ?>">
                <input hidden id="user_id" name="user_id" value="<?= $order['0']->user_id; ?>">
                <button type="submit" class="btn btn-lg btn-primary" style="float: right;">
                    Submit</button>
            </div>
        </div>
    </div>
</div>