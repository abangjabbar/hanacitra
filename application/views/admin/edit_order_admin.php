<?php $this->load->view('templates/header') ?>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url() ?>template/BS3/assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


<?php $this->load->view('templates/sidebar') ?>

    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                
                    <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('orders/orderAdmin') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
                            oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $order->id_order?>" />

                            <div class="form-group">
                                <label for="name">Jenis Box*</label>
                                <input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
                                 type="text" name="jenis" placeholder="Jenis Box" value="<?php echo $order->jenis ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis_box') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Jumlah</label>
                                <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
                                 type="number" name="jumlah" min="0" placeholder="Jumlah" value="<?php echo $order->jumlah ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('jumlah') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
                                 type="text" name="alamat" min="0" placeholder="Alamat" value="<?php echo $order->alamat ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Tanggal</label>
                                <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
                                 type="text" name="tanggal" min="0" placeholder="Tanggal" value="<?php echo $order->tanggal ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Drawing</label>
                                <input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
                                 type="file" name="image" />
                                <input type="hidden" name="old_image" value="<?php echo $order->image ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('image') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Spesifikasi</label>
                                <input class="form-control <?php echo form_error('spesifikasi') ? 'is-invalid':'' ?>"
                                 type="text" name="spesifikasi" min="0" placeholder="Spesifikasi" value="<?php echo $order->spesifikasi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('spesifikasi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Dimensi</label>
                                <input class="form-control <?php echo form_error('dimensi') ? 'is-invalid':'' ?>"
                                 type="text" name="dimensi" min="0" placeholder="Dimensi" value="<?php echo $order->dimensi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('dimensi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Substance</label>
                                <input class="form-control <?php echo form_error('substances') ? 'is-invalid':'' ?>"
                                 type="text" name="substance" min="0" placeholder="Substance" value="<?php echo $order->substances ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('substances') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Deskripsi*</label>
                                <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
                                 name="deskripsi" placeholder="Deskripsi pesanan..."><?php echo $order->deskripsi ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('deskripsi') ?>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>
                </div>
                    </div>


                </div>
            </div>
        </div>
            <?php $this->load->view('templates/footer') ?>
    </body>

    </html>