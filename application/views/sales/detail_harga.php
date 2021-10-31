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
                            <th scope="col">Id Pesanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga Item</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">PPN</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail as $row) : ?>
                            <tr scope="row">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td><?= $row->id_pesanan; ?></td>
                                <td><?= $row->jumlah; ?></td>
                                <td><?= $row->harga_item; ?></td>
                                <td><?= $row->total_harga; ?></td>
                                <td><?= $row->ppn; ?></td>
                                <td><?= $row->diskon; ?></td>
                                <td><?= $row->grand_total; ?></td>
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