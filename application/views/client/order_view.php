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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <?php if (count($history) > 0) : ?>
            <div class="col-md-12">
                <a type=" button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#history">History Alasan Revisi</a>
            </div>
        <?php endif; ?>
    </div>
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
    <br>
    <div class="container">
        <div class="col-md-12 mb-3">
            <h5>Silahkan tambahkan item yang ingin anda pesan</h5>
            <a href="<?php echo base_url(); ?>client/tambahBarang/<?php echo $order['0']->id; ?>" class="btn btn-primary">+Tambah Item</a>
        </div>
    </div>
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
                        <table class="table custom-table" class="center" style="width:1200px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">No.</th>
                                    <th scope="col" style="text-align: center;">Nama Barang</th>
                                    <th scope="col" style="text-align: center;">Susbstance</th>
                                    <th scope="col" style="text-align: center;">Kualitas</th>
                                    <th scope="col" style="text-align: center;">Deskripisi</th>
                                    <th scope="col" style="text-align: center;">Desain Box</th>
                                    <th scope="col" style="text-align: center;">Panjang</th>
                                    <th scope="col" style="text-align: center;">Lebar</th>
                                    <th scope="col" style="text-align: center;">Tinggi</th>
                                    <th scope="col" style="text-align: center;">Kuantitas</th>
                                    <th scope="col" style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang as $row) : ?>
                                    <tr scope=" row">
                                        <td style="text-align: center;"><?= $i; ?></td>
                                        <td style="text-align: center;"><?= $row->nama_barang; ?> </td>
                                        <td style="text-align: center;"><?= $row->kualitas_nama; ?> </td>
                                        <td style="text-align: center;"><?= $row->subkualitas_nama; ?> </td>
                                        <td style="text-align: center;"><?= $row->deskripsi; ?> </td>
                                        <td style="text-align:center;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#desain"><strong>
                                                    Detail Desain</strong></a>
                                        </td>
                                        <td style="text-align:center;"><?= $row->panjang; ?>cm </td>
                                        <td style="text-align:center;"><?= $row->lebar; ?>cm </td>
                                        <td style="text-align:center;"><?= $row->tinggi; ?>cm </td>
                                        <td style="text-align:center;"><?= $row->kuantitas; ?> </td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url(); ?>client/editBarang/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">
                                                Edit</a>
                                            <a href="#" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row->id; ?>">
                                                Hapus</a>
                                        </td>
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
        <div class="container">
            <div class="col-md-4 mb-3" style="float: right;">
                <h4 Style="text-align: right;">Silahkan submit order anda</h4>
                <?= form_open_multipart('client/submitOrder'); ?>
                <input hidden id="id" name="id" value="<?= $order['0']->id; ?>">
                <button type="submit" class="btn btn-lg btn-primary" style="float: right;">
                    Submit</button>
            </div>
        </div>

</section>

<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script>
    $(document).ready(function() {

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