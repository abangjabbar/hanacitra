<section id="top2" class="d-flex align-items-center">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

</section><!-- End top2 -->

<section>
    <div class="container">
        <?= form_open_multipart('sales/proses_edit_harga'); ?>
        <input type="hidden" name="id" id="id" value="<?= $harga['id']; ?>">
        <div class="col-md-12 mb-3">
            <label for="inputAddress">ID Pesanan</label>
            <input disabled type="number" class="form-control" id="id_pesanan" name="id_pesanan" value="<?= $harga['id_pesanan']; ?>" placeholder="ID Pesanan">
            <?= form_error('id_pesanan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="floatingTextarea2">Harga Per Item</label>
            <div class="input-group input-group-md mb-2 text-dark inputBayarDiv">
                <span class="input-group-text fw-bolder">Rp.</span>
                <input type="number" class="form-control" id="harga_item" placeholder="Harga Per Item" name="harga_item" value="<?= $harga['harga_item']; ?>"></input>
                <?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Total Harga</label>
            <div class="input-group input-group-md mb-2 text-dark inputBayarDiv">
                <span class="input-group-text fw-bolder">Rp.</span>
                <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?= $harga['total_harga']; ?>" placeholder="Total Harga">
                <?= form_error('total_harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">PPN</label>
            <div class="input-group input-group-md mb-2 text-dark inputBayarDiv">
                <span class="input-group-text fw-bolder">Rp.</span>
                <input type="number" class="form-control" id="ppn" name="ppn" value="<?= $harga['ppn']; ?>" placeholder="PPN">
                <?= form_error('ppn', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Diskon</label>
            <div class="input-group input-group-md mb-2 text-dark inputBayarDiv">
                <span class="input-group-text fw-bolder">Rp.</span>
                <input type="number" class="form-control" id="diskon" name="diskon" value="<?= $harga['diskon']; ?>" placeholder="Diskon">
                <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Grand Total</label>
            <div class="input-group input-group-md mb-2 text-dark inputBayarDiv">
                <span class="input-group-text fw-bolder">Rp.</span>
                <input type="number" class="form-control fw-bolder" id="grand_total" name="grand_total" value="<?= $harga['grand_total']; ?>" placeholder="Grand Total">
                <?= form_error('grand_total', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</section>