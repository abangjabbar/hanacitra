<!-- Begin Page Content -->
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

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <?= $this->session->flashdata('message'); ?>
                <div class="profile-img">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="150" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-head">
                    <h3>
                        <?= $user['name']; ?>
                    </h3>
                    <p class="proile-rating"><?= $user['email']; ?></p>
                    <h5>
                        Member sejak <?= date('d F Y', $user['date_created']) ?>
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation" class="active"><a href="#track" aria-controls="track" role="tab" data-toggle="tab">Data Profil</a></li>
                        <li role="presentation"><a href="#albums" aria-controls="albums" role="tab" data-toggle="tab">Data Pesanan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="<?= site_url('client/editprofil'); ?>" role="button">Edit Profil</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <ul class="navbar-nav">
                    <div class="profile-work">
                        <p>PROFIL</p>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('client/editprofil'); ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Edit Profil</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Ganti Password</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('auth/logout'); ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Log Out</span></a>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="col-md-8">
                <br>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="track">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user['name']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user['email']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="albums">
                        <div class="related-artist">
                            <div class="col-md-12">
                                <a class="col-md-4 artist-next" href="#"><i class="fas fa-money-check fa-3x"></i><br>Pesanan</a>
                                <div class="col-md-4 artist-next" href="#"><i class="fas fa-money-check-alt fa-3x"></i><br>Transaksi</div>
                                <div class="col-md-4 artist-next" href="#"><i class="fas fa-truck fa-3x"></i><br>Pengiriman</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->