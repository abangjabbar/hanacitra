<?php $this->load->view('templates/header') ?>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url() ?>template/BS3/assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Tim Produksi
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('orders/orderAdmin') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Kelola Pesanan</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-note2"></i>
                        <p>Kelola Kemajuan Pesanan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('pengiriman') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Kelola Pengiriman</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('substances') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Kelola Stock</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>

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
        <div class="center">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('substances') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data" >

                        <input type="hidden" name="id" value="<?php echo $substance->id_substance?>" />

                        <div class="form-group">
                                <label for="kualitas">Kualitas*</label>
                                <select class="form-control" name="kualitas" id="kualitas" required>
                                    <option value="<?php echo $substance->kualitas;?>">Pilih Kualitas</option>
                                    <?php 
                                    foreach($kualitas as $row)
                                    echo '<option value="'.$row->id_kualitas.'">'.$row->kualitas_nama.'</option>';
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="subkualitas" name="subkualitas" id="subkualitas" class="form-control">
                                    <option value="<?php echo $substance->subkualitas;?>">Pilih Subkualitas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="harga_subkualitas" name="harga_subkualitas" id="harga_subkualitas" class="form-control">
                                    <option value="<?php echo $substance->harga_subkualitas;?>">Harga</option>
                                </select>   
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jumlah Stok</label>
                                <input class="form-control <?php echo form_error('stok_substance') ? 'is-invalid':'' ?>"
                                 type="number" name="stok_substance" placeholder="Jumlah Stok" value="<?php echo $substance->stok_substance;?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('stok_substance') ?>
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
            <?php $this->load->view('templates/footer') ?>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
        $(document).ready(function(){

            $('#kualitas').change(function() {
                var id_kualitas = $('#kualitas').val();
                if(id_kualitas != '')
                {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/substances/fetch_subkualitas",
                        method:"POST",
                        data:{
                            id_kualitas: id_kualitas
                        },
                        success:function(data)
                        {
                            $('#subkualitas').html(data);
                        }
                    })
                }
            });
            
            $('#subkualitas').change(function(){
                var id_subkualitas = $('#subkualitas').val();
                if(id_subkualitas != '')
                {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/substances/fetch_harga_subkualitas",
                        method:"POST",
                        data:{
                            id_subkualitas:id_subkualitas
                        },
                        success:function(data)
                        {
                            $('#harga_subkualitas').html(data);
                        }
                    })
                }
            });

        });
        </script> 
    </html>