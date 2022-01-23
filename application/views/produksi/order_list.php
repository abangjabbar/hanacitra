<section id="top2" class="d-flex align-items-center">
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>
    </div>
</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Daftar Order
            </div>
            <div class="card-body">
                <div class="scroll">
                    <div class="table-responsive custom-table-responsive">
                        <table id="example" class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Order</th>
                                    <th scope="col">Alamat Pengiriman</th>
                                    <th scope="col">Tanggal Pengiriman</th>
                                    <th scope="col">Harga Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi as $row) : ?>
                                    <tr scope="row">
                                        <td><?= $i; ?></td>
                                        <td><?= $row->order_nomor; ?></td>
                                        <td><?= $row->alamat_pengiriman; ?></td>
                                        <td><?= $row->tgl_pengiriman; ?></td>
                                        <td><?= "Rp " . number_format($row->grand_total  != null ? $row->grand_total : 0, 2, ",", "."); ?></td>
                                        <td><?= $row->status; ?></td>
                                        <td><a href="<?php echo base_url(); ?>produksi/order/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">Detail</a></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>