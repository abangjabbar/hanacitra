<section id="top2" class="d-flex align-items-center">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="scroll">
            <div class="table-responsive-xl custom-table-responsive">
                <table class="table custom-table" class="center" style="width:2400px;">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Order</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Susbstance</th>
                            <th scope="col">Kualitas</th>
                            <th scope="col">Desain Box</th>
                            <th scope="col">Panjang</th>
                            <th scope="col">Lebar</th>
                            <th scope="col">Tinggi</th>
                            <th scope="col">kuantitas</th>
                            <th scope="col" style="width: max-content;">Total Biaya Transaksi</th>
                            <th scope="col">Tanggal Pengiriman</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pesanan as $row) : ?>
                            <tr scope="row">
                                <td><?= $i; ?></td>
                                <td style="color: blue;"><?= $status; ?></td>
                                <td><?= $row->id; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->telp; ?></td>
                                <td><?= $row->company_name; ?></td>
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
                                <td><?= $row->deliv_tgl; ?></td>
                                <td><?= $row->alamat_pengiriman; ?></td>
                                <td><a href="#" class="more">Details</a></td>
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
            <div class="table-responsive-xl">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Pesanan</th>
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
                                <td id="dengan-rupiah"><?= $row['id_pesanan']; ?></td>
                                <td><?= "Rp " . number_format($row['harga_item'], 2, ",", "."); ?></td>
                                <td><?= "Rp " . number_format($row['total_harga'], 2, ",", "."); ?></td>
                                <td><?= "Rp " . number_format($row['ppn'], 2, ",", "."); ?></td>
                                <td><?= "Rp " . number_format($row['diskon'], 2, ",", "."); ?></td>
                                <td><?= "Rp " . number_format($row['grand_total'], 2, ",", "."); ?></td>
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