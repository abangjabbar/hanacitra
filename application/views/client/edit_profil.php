<!-- Begin Page Content -->
<style>
    .button {
        text-align: center;
    }
</style>

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?= $title; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=<?= site_url('client'); ?>>Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href=<?= site_url('client/profil'); ?>>Profil Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-md">
                <?= form_open_multipart('client/editprofil'); ?>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Admin" width="200">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="custom-file-label"> </label>
                                <input class="form-control" type="file" id="image" name="image" for="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-sm-6 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-6 col-form-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>" onkeyup="myFunction()">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-6 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="company_name" id="company_name" value="<?= $user['company_name']; ?>" onkeyup="myFunction()">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-sm-6 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-12">
                                    <input type="number" min="1" step="1" class=" form-control" name="telp" id="telp" value="<?= $user['telp']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-6 col-form-label">Alamat</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $user['alamat']; ?>" onkeyup="myFunction()">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-6 col-form-label"></label>
                                <div class="col-sm-12 button">
                                    <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

</section>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    function myFunction() {
        var x = document.getElementById('name');
        x.value = x.value.toUpperCase();
        if (y = document.getElementById('company_name')) {
            y.value = y.value.toUpperCase();
        }
    }
</script>
<script>
    function myFunction() {
        var z = document.getElementById('alamat');
        z.value = z.value.toUpperCase();
    }
</script>