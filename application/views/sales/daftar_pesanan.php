<section id="top2" class="d-flex align-items-center">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

</section><!-- End top2 -->

<section>
    <div class="container">

        <div class="scroll">
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Order</th>
                            <th scope="col">Nama Projek Pesanan</th>
                            <th scope="col">Material</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Desain Box</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pesanan as $order) : ?>
                            <tr scope="row">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td><?= $order['id']; ?></td>
                                <td><?= $order['nama_barang']; ?></td>
                                <td>
                                    <?= $order['material'] ?>
                                </td>
                                <td><?= $order['deskripsi']; ?></td>
                                <td><?= $order['kuantitas']; ?></td>
                                <td><?= $order['alamat_pengiriman']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>sales/detailImagePesanan/<?php echo $order['id']; ?>" class="btn btn-primary">Detail</a>
                                </td>
                                <td></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container">

        <div class="scroll">
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Harga Per Item</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">PPN</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Grand Total</th>
                            <th scope="col">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $row) : ?>
                            <tr scope="row">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td><?= $row['id_pesanan']; ?></td>
                                <td><?= $row['kuantitas']; ?></td>
                                <td><?= $row['harga_item']; ?></td>
                                <td><?= $row['total_harga'] ?></td>
                                <td><?= $row['ppn']; ?></td>
                                <td><?= $row['diskon']; ?></td>
                                <td><?= $row['grand_total']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>sales/editHarga/<?php echo $row['id']; ?>" class="btn btn-primary">Detail</a>
                                </td>
                                <td></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<style>
    .scroll {
        height: 400px;
        overflow: scroll;
    }
</style>