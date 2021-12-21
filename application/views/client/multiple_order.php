<section id="top2" class="d-flex align-items-center">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>



</section><!-- End top2 -->
<section id="top">
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
                    <div class="col-md-12 mb-3">
                        <button id="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <a href="<?php echo base_url(); ?>client/tambahBarang/<?php echo $order['0']->id; ?>" class="btn btn-primary">tambah barang</a>
    </div>
    <div class="container">
        <div class="scroll">
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table" class="center" style="width:2400px;">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Susbstance</th>
                            <th scope="col">Kualitas</th>
                            <th scope="col">Desain Box</th>
                            <th scope="col">Panjang</th>
                            <th scope="col">Lebar</th>
                            <th scope="col">Tinggi</th>
                            <th scope="col">kuantitas</th>
                            <th scope="col" style="width: max-content;">Total Biaya Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $row) : ?>
                            <tr scope="row">
                                <td><?= $i; ?></td>
                                <td><?= $row->nama_barang; ?> </td>
                                <td><?= $row->kualitas_nama; ?> </td>
                                <td><?= $row->subkualitas_nama; ?> </td>
                                <td style="text-align:center;">
                                    <a href=" <?php echo base_url(); ?>sales/detailImagePesanan/<?php echo $row->id; ?>" class="btn btn-primary">Detail</a>
                                </td>
                                <td style="text-align:center;"><?= $row->panjang; ?> </td>
                                <td style="text-align:center;"><?= $row->lebar; ?> </td>
                                <td style="text-align:center;"><?= $row->tinggi; ?> </td>
                                <td style="text-align:center;"><?= $row->kuantitas; ?> </td>
                                <td style="text-align:center;"><?= $row->grand_total; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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