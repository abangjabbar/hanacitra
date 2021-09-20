<style>
    .card-body {
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column text-center">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Admin" width="200">
                                <div class="mt-3">
                                    <h4><?= $user['name']; ?></h4>
                                    <p class="text-secondary mb-1"><?= $user['company_name']; ?></p>
                                    <p class="text-muted font-size-sm"><?= $user['alamat']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <a class="nav-link pb-0" href="<?= site_url('client/editprofil'); ?>">
                                    <i class="fas fa-fw fa-sign-out-alt"></i>
                                    <span>Edit Profil</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <a class="nav-link pb-0" href="<?= site_url('client/editprofil'); ?>">
                                    <i class="fas fa-fw fa-key"></i>
                                    <span>Ganti Password</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <a class="nav-link pb-0" href="<?= site_url('auth/logout'); ?>">
                                    <i class="fas fa-fw fa-door-open"></i>
                                    <span>Log Out</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user['name']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Perusahan</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user['company_name']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nomor Telepon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user['telp']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user['alamat']; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="col-md-8">
                        <div class="breadcrumb-content">
                            <h2>Daftar Transaksi</h2>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex flex-column align-items-center text-center mb-3">Menunggu Pembayaran</h6>
                                    <a href="#"><i class="fas fa-7x fa-clock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex flex-column align-items-center text-center mb-3">Transaksi berlangsung</h6>
                                    <a href="#"><i class="fas fa-7x fa-money-check-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex flex-column align-items-center text-center mb-3">Semua Transaksi</h6>
                                    <a href="#"><i class="fas fa-7x fa-money-check-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
</section>
<!-- /.container-fluid -->