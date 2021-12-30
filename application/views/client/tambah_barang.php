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
                    <h4>Tambah Item Box</h4>
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
                        <h3>Tambah Item Box</h3>
                        <p>Silahkan isi form untuk pemesanan corrugated box</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>Form Pemesanan</p>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('client/tambahBarang/' . $orderId); ?>
                        <div class="col-md-12 mb-3">
                            <h5 for="inputAddress">Nama Item Box</h5>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= set_value('nama_barang'); ?>" placeholder="Nama Barang" required>
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="inputAddress">Ukuran</h5>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Panjang</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="number" class="form-control" id="panjang" name="panjang" value="<?= set_value('panjang'); ?>" placeholder="Panjang" required>
                                    <?= form_error('panjang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label class="col-sm-1 col-form-label" for="inputAddress">cm</label>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Lebar</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="number" class="form-control" id="lebar" name="lebar" value="<?= set_value('lebar'); ?>" placeholder="Lebar" required>
                                    <?= form_error('lebar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label class="col-sm-1 col-form-label" for="inputAddress">cm</label>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="inputAddress">Tinggi</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="number" class="form-control" id="tinggi" name="tinggi" value="<?= set_value('tinggi'); ?>" placeholder="Tinggi" required>
                                    <?= form_error('tinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label class="col-sm-1 col-form-label" for="inputAddress">cm</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="kualitas">Material</h5>
                            <select class="form-control input-lg" name="kualitas" id="kualitas" value="<?= set_value('kualitas'); ?>" required>
                                <option value="">Pilih Material</option>
                                <?php
                                foreach ($kualitas as $row)
                                    echo '<option value="' . $row->id_kualitas . '">' . $row->kualitas_nama . '</option>';
                                ?>
                            </select>
                            <?= form_error('kualitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="kualitas">Substance</h5>
                            <select name="subkualitas" id="subkualitas" value="<?= set_value('subkualitas'); ?>" class="form-control input-lg">
                                <option value="">Pilih Substance</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="floatingTextarea2">Deskripsi Cetakan yang Anda Inginkan</h5>
                            <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>" style="height: 100px" required></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="mb-3 row">
                                <h5 for="image">Desain</h5>
                                <input type="hidden" name="id" value="">
                                <div class="col-sm-12">
                                    <input type="file" for="image" class="form-control" id="image" name="image[]" value="<?= set_value('image'); ?>" multiple required>
                                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-12">
                                    *Upload desain yang anda inginkan
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="input">Kuantitas</h5>
                            <input type="number" class="form-control" placeholder="Kuantitas" id="kuantitas" value="<?= set_value('kuantitas'); ?>" name="kuantitas" required></input>
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
    $(document).ready(function() {

        $('#kualitas').change(function() {
            var id_kualitas = $('#kualitas').val();
            if (id_kualitas != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>client/fetch_subkualitas",
                    method: "POST",
                    data: {
                        id_kualitas: id_kualitas
                    },
                    success: function(data) {
                        $('#subkualitas').html(data);
                    }
                })
            }
        });

    });
</script>