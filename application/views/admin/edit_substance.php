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
                                <a href="<?php echo site_url('substances') ?>"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
                                    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                                    <input type="hidden" name="id" value="<?php echo $substance->id_substance?>" />

                                    <div class="form-group">
                                        <label for="name">Jenis*</label>
                                        <input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
                                         type="text" name="jenis" placeholder="Jenis Box" value="<?php echo $substance->jenis ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('jenis') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">BF</label>
                                        <input class="form-control <?php echo form_error('bf') ? 'is-invalid':'' ?>"
                                         type="text" name="bf" min="0" placeholder="BF" value="<?php echo $substance->bf ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('bf') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">CF</label>
                                        <input class="form-control <?php echo form_error('cf') ? 'is-invalid':'' ?>"
                                         type="text" name="cf" min="0" placeholder="Alamat" value="<?php echo $substance->cf ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('cf') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">CBF</label>
                                        <input class="form-control <?php echo form_error('cbf') ? 'is-invalid':'' ?>"
                                         type="text" name="cbf" min="0" placeholder="CBF" value="<?php echo $substance->cbf ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('cbf') ?>
                                        </div>
                                    </div>

                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                </form>

                    </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
            <?php $this->load->view('templates/footer') ?>
    </body>

    </html>