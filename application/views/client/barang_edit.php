<style>
    .main-body {
        max-width: 1000px;
        margin: auto;
    }

    .card {
        max-width: 700px;
        margin: auto;
    }

    .alert-danger {
        max-width: 300px;
        margin: auto;
    }
</style>




<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h4>Edit Barang</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <div class="breadcrumb-content">
                        <h3>Edit Barang</h3>
                        <p>Silahkan isi form untuk pemesanan corrugated box</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Order</h4>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('client/proses_edit_barang'); ?>
                        <input type="hidden" name="id" id="id" value="<?= $barang['id']; ?>">
                        <input type="hidden" name="order_id" id="order_id" value="<?= $barang['order_id']; ?>">
                        <div class="col-md-12 mb-3">
                            <h5 for="inputAddress">Nama Barang</h5>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>" placeholder="Nama Barang" required>
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="inputAddress">Ukuran</h5>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Panjang</label>
                                <div class="col-md-3">
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="number" class="form-control" id="panjang" name="panjang" value="<?= $barang['panjang']; ?>" placeholder="Panjang" required>
                                        <span class="input-group-text" id="addon-wrapping">cm</span>
                                        <?= form_error('panjang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Lebar</label>
                                <div class="col-sm-3">
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="number" class="form-control" id="lebar" name="lebar" value="<?= $barang['lebar']; ?>" placeholder="Lebar" required>
                                        <span class="input-group-text" id="addon-wrapping">cm</span>
                                        <?= form_error('lebar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Tinggi</label>
                                <div class="col-sm-3">
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="number" class="form-control" id="tinggi" name="tinggi" value="<?= $barang['tinggi']; ?>" placeholder="Tinggi" required>
                                        <span class="input-group-text" id="addon-wrapping">cm</span>
                                        <?= form_error('tinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="kualitas">Material</h5>
                            <select class="form-control input-lg" name="kualitas" id="kualitas" value="<?= set_value('kuatlitas'); ?>" required>
                                <option value="" disabled>Pilih Material</option>
                                <?php
                                foreach ($kualitas as $row)
                                    echo '<option value="' . $row->id_kualitas . '">' . $row->kualitas_nama . '</option>';
                                ?>
                            </select>
                            <?= form_error('kualitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="kualitas">Substance</h5>
                            <select name="subkualitas" id="subkualitas" value="<?= $barang['subkualitas']; ?>" class="form-control input-lg" required>
                                <option value="">Pilih Substance</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="input">Deskripsi Cetakan yang Anda Inginkan</h5>
                            <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" style="height: 100px" required><?= $barang['deskripsi']; ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="input">Kuantitas</h5>
                            <input type="number" class="form-control" placeholder="Kuantitas" id="kuantitas" value="<?= $barang['kuantitas']; ?>" name="kuantitas" required></input>
                            <?= form_error('kuantitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>

<!-- Script untuk Kualitas dan Subkualitas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var barang = <?= json_encode($barang); ?>;
    $(document).ready(function() {

        (function() {
            if (barang.kualitas != '') {
                $('#kualitas').val(barang.kualitas);
                $.ajax({
                    url: "<?php echo base_url(); ?>client/fetch_subkualitas",
                    method: "POST",
                    data: {
                        id_kualitas: barang.kualitas
                    },
                    success: function(data) {
                        $('#subkualitas').html(data);
                        $('#subkualitas').val(barang.subkualitas);
                    }
                })
            }
        })();
        $('#kualitas').change(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>client/fetch_subkualitas",
                method: "POST",
                data: {
                    id_kualitas: $('#kualitas').val()
                },
                success: function(data) {
                    $('#subkualitas').html(data);
                }
            })
        })


    });
</script>