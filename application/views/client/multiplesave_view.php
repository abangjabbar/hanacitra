<style>
    .main-body {
        max-width: 1000px;
        margin: auto;
    }

    .card {
        max-width: 700px;
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
                            <?= form_open_multipart('client/tambah'); ?>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Nama Projek Cetakan</label>
                                <input type="text" class="form-control" id="projek_pesanan" name="projek_pesanan" placeholder="Nama Projek">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Material</label>
                                <input type="text" class="form-control" id="material" name="material" placeholder="Material Box">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="floatingTextarea2">Deskripsi Cetakan yang Anda Inginkan</label>
                                <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="">
                                    <div class="input-group mb-3">
                                        <input type="file" for="image" class="form-control" id="image" name="image[]" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input">Kuantitas</label>
                                <input type="number" class="form-control" placeholder="Kuantitas" id="kuantitas" name="kuantitas"></input>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputCity">Tanggal Pengiriman</label>
                                <input type="date" class="form-control" id="deliv_tgl" name="deliv_tgl">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress">Alamat Pengiriman</label>
                                <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" placeholder="1234 Main St">
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