<div class="container-fluid">

    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>
    </div>

</div>

<section>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Manajemen Akun</li>
                <li class="breadcrumb-item">Edit Akun</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <div class="breadcrumb-content">
                        <h3>Edit Akun</h3>
                        <p>Silahkan ganti Role sesuai dengan ID Role nya</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-4">
                            <table class="table table-striped table-bordered width=" 30px">
                                <thead>
                                    <tr>
                                        <th scope="col">Role</th>
                                        <th scope="col">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Administrator</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>Produksi</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Sales</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>Client</td>
                                        <td>6</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('administrator/proses_edit_akun'); ?>
                        <input type="hidden" name="id" id="id" value="<?= $akun['id']; ?>">
                        <div class="col-md-12 mb-3">
                            <h5 for="inputAddress">ID ROLE</h5>
                            <input type="number" class="form-control" id="role_id" name="role_id" value="<?= $akun['role_id']; ?>" placeholder="ID Role" required>
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5 for="input">IS ACTIVE</h5>
                            <input type="number" class="form-control" placeholder="iS ACTIVE" id="is_active" name="is_active" value="<?= $akun['is_active']; ?>" required></input>
                            <?= form_error('kuantitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>