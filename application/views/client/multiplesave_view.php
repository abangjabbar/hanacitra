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
                    <h2>Pemesanan Custom</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-12">
                    <div class="card border-info mb-3">
                        <div class="card-header">Form Pemesanan</div>
                        <div class="card-body">
                            <h4 class="card-title">Pemesanan Custom</h4>
                            <hr>
                            <?= form_open_multipart('client/multiplesave'); ?>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= set_value('nama_barang'); ?>" placeholder="Nama Barang">
                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputAddress">Ukuran</label>
                                <p>*ukuran dalam cm</p>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="panjang" name="panjang" value="<?= set_value('panjang'); ?>" placeholder="Panjang">
                                    <?= form_error('panjang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="lebar" name="lebar" value="<?= set_value('lebar'); ?>" placeholder="Lebar">
                                    <?= form_error('lebar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="tinggi" name="tinggi" value="<?= set_value('tinggi'); ?>" placeholder="Tinggi">
                                    <?= form_error('tinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Material</label>
                                <input type="text" class="form-control" id="material" name="material" value="<?= set_value('material'); ?>" placeholder="Material Box">
                                <?= form_error('material', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="floatingTextarea2">Deskripsi Cetakan yang Anda Inginkan</label>
                                <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>" style="height: 100px"></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Desain</label>
                                <p>Upload desain atau logo anda, apabila ingin berwarna</p>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="">
                                    <div class="input-group mb-3">
                                        <input type="file" for="image" class="form-control" id="image" name="image[]" value="<?= set_value('image[]'); ?>" multiple required>
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input">Kuantitas</label>
                                <input type="number" class="form-control" placeholder="Kuantitas" id="kuantitas" value="<?= set_value('kuantitas'); ?>" name="kuantitas"></input>
                                <?= form_error('kuantitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputCity">Tanggal Pengiriman</label>
                                <input type="date" class="form-control" id="deliv_tgl" value="<?= set_value('deliv_tgl'); ?>" name="deliv_tgl">
                                <?= form_error('deliv_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Alamat Pengiriman</label>
                                <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= set_value('alamat_pengiriman'); ?>" placeholder="Alamat Lengkap">
                                <?= form_error('alamat_pengiriman', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </div>
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