<!-- Begin Page Content -->
<style>
    .card {
        width: 50%;
        height: 100px;
        margin: auto;
        position: relative;
    }
</style>

<div class="container-fluid">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?= $title; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <hr>
</div>

<div class="container">
    <div class="card" style="width: 70rem;">
        <img class="card-img-top" src="<?php echo base_url('assets/images/2.png'); ?>" alt="Card image cap">
        <div class="card-body">
            <?= form_open_multipart('client/cetakCustom'); ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Nama Projek Cetakan</label>
                    <input type="text" class="form-control" id="projek_pesanan" name="projek_pesanan" placeholder="1234 Main St">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputAddress">Jenis Box</label>
                    <input type="text" class="form-control" id="jenis_box" name="jenis_box" placeholder="1234 Main St">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="floatingTextarea2">Spesifikasi Cetakan yang Anda Inginkan</label>
                    <textarea class="form-control" placeholder="Spesifikasi" id="spesifikasi" name="spesifikasi" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class=" form-group col-md-12">
                    <div class="form-group files color">
                        <label>Upload Your File </label>
                        <input type="file" class="form-control" multiple="10" id="image" name="image">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Alamat Pengiriman</label>
                    <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" placeholder="1234 Main St">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Jumlah yang ini dipesan</label>
                    <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>