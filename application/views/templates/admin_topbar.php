<style>
    .circle {
        width: 20px;
        height: 20px;
        line-height: 20px;
        border-radius: 50%;
        color: white;
        text-align: center;
        background: red;
        margin-left: 5px
    }
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow">
                    <a href="#" id="dropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>Notifikasi</strong>
                        <div class="circle" id="notifCounter" style="display: none;">79</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="overflow-y: auto; max-height:15rem;">
                        <ul id="notifikasi" class="list-group"></ul>
                    </div>
                </li>

                <div class=" topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
        <script src="<?= base_url('assets/notif.js'); ?>" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                const base_url = "<?= base_url(); ?>sales";

                queryNotif(base_url);
                setInterval(() => {
                    console.log("Reload notif...")
                    queryNotif(base_url);
                }, 30000);

            });
        </script>