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
            <label for="inputAddress">Kuantitas Barang</label>
            <input disabled type="number" type="text" class="form-control" id="kuantitas" name="kuantitas" value="<?= $harga['kuantitas']; ?>" placeholder="Kuantitas Barang">
            <?= form_error('kuantitas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="floatingTextarea2">Harga Per Item</label>
            <input type="number" class="form-control" placeholder="Harga Per Item" id="harga_item" name="harga_item" value="<?= $harga['harga_item']; ?>" style="height: 100px"></input>
            <?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?= $harga['total_harga']; ?>" placeholder="Total Harga">
            <?= form_error('total_harga', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">PPN</label>
            <input type="number" class="form-control" id="ppn" name="ppn" value="<?= $harga['ppn']; ?>" placeholder="PPN">
            <?= form_error('ppn', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Diskon</label>
            <input type="text" class="form-control" id="dengan-rupiah" id="diskon" name="diskon" value="<?= $harga['diskon']; ?>" placeholder="Diskon">
            <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <label for="inputAddress">Grand Total</label>
            <input type="text" class="form-control" id="dengan-rupiah-5" id="grand_total" name="grand_total" value="<?= $harga['grand_total']; ?>" placeholder="Grand Total">
            <?= form_error('grand_total', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</section>

<style>
    .scroll {
        height: 400px;
        overflow: scroll;
    }
</style>

<script type="text/javascript">
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>