<?php $this->load->view('templates/header') ?>


<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url() ?>template/BS3/assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: pengirimans-color="blue | azure | green | orange | red | purple" -->


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
                <li class="active">
                    <a href="<?php echo site_url('pengiriman') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Kelola Pengiriman</p>
                    </a>
                </li>
                <li>
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
                    <button type="button" class="navbar-toggle" pengirimans-toggle="collapse" pengirimans-target="#navigation-example-2">
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
                            <a href="#" class="dropdown-toggle" pengirimans-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" pengirimans-toggle="dropdown">
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
                              <a href="#" class="dropdown-toggle" pengirimans-toggle="dropdown">
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
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Daftar Pengiriman Pesanan</h4>
                                <h3 class="category"><a href="<?php echo site_url('pengiriman/addpengiriman') ?>">Tambah</a></h3>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID pengiriman</th>
                                        <th>ID Order</th>
                                        <th>Tanggal pengiriman</th>
                                        <th>Alamat</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($pengiriman as $pengirimans): ?>
                                    <tr>
                                        <td>
                                            <?php echo $pengirimans->id_order ?>
                                        </td>
                                        <td>
                                            <?php echo $pengirimans->id_order ?>
                                        </td>
                                        <td>
                                            <?php echo $pengirimans->tanggal ?>
                                        </td>
                                        <td>
                                            <?php echo $pengirimans->alamat ?>
                                        </td>
                                        <td width="250">
                                            <a onclick="deleteConfirm('<?php echo site_url('pengiriman/delete/'.$pengirimans->id_order) ?>')"
                                             href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
            <?php $this->load->view('templates/footer') ?>
            <?php $this->load->view('_partials/modal') ?> 
    <script>
    function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
    }
    </script>

    <script>
    $(function () {
    $('#btn-edit').click(function (e) {
            e.preventDefault();
            $('#modal').modal({
                backdrop: 'static',
                show: true
            });
            id = $(this).data('id_order');
            // mengambil nilai data-id yang di click
            $.ajax({
                url: 'profile/edit/' + id_order,
                success: function (data) {
                    $("input[name='id_order']").val(data.id_order);
                }
            });
       });
    }
    </script>

    </body>

    </html>