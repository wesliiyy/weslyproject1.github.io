<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Monitoring Material PT BMI</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/assets/assets/img/bmi.png">

    <script src="<?= base_url(); ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/sweetalert2/sweetalert2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/assets/css/components.css">

</head>

<body class="<?= $this->uri->segment(1) == 'sjmaterial' ? 'sidebar-mini' : null ?>">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url(); ?>/assets/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= $this->fungsi->user_login()->name ?> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"><?= $this->fungsi->user_login()->username ?></div>
                            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url('dashboard') ?>">Monitoring Material</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url('dashboard') ?>">BMI</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Hakanan Awal</li>
                        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
                        <?php
                        if ($this->session->userdata('role') == 1) { ?>
                            <li class="menu-header">Menu Master</li>
                            <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('customer') ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>
                            <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('supplier') ?>"><i class="fas fa-truck"></i> <span>Supplier</span></a></li>
                            <li class="nav-item dropdown <?= $this->uri->segment(1) == 'part' || $this->uri->segment(1) == 'proses' ?  'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i> <span>Produk</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment(1) == 'part' ? 'class="active"' : '' ?>><a href="<?= site_url('part') ?>">Part</a></li>
                                    <li <?= $this->uri->segment(1) == 'proses' ? 'class="active"' : '' ?>><a href="<?= site_url('proses') ?>">Proses</a></li>
                                </ul>
                            </li>
                            <li <?= $this->uri->segment(1) == 'material' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('material') ?>"><i class="fas fa-truck-loading"></i> <span>Material</span></a></li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 2) { ?>
                            <li class="menu-header">Menu Master</li>
                            <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('customer') ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>
                            <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('supplier') ?>"><i class="fas fa-truck"></i> <span>Supplier</span></a></li>
                            <li class="nav-item dropdown <?= $this->uri->segment(1) == 'part' || $this->uri->segment(1) == 'proses' ?  'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i> <span>Produk</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment(1) == 'part' ? 'class="active"' : '' ?>><a href="<?= site_url('part') ?>">Part</a></li>
                                    <li <?= $this->uri->segment(1) == 'proses' ? 'class="active"' : '' ?>><a href="<?= site_url('proses') ?>">Proses</a></li>
                                </ul>
                            </li>
                            <li <?= $this->uri->segment(1) == 'material' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('material') ?>"><i class="fas fa-truck-loading"></i> <span>Material</span></a></li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('role') == 1) {  ?>
                            <li class="menu-header">Menu Mutasi</li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/in') ?>"><i class="fas fa-sign-in-alt"></i> <span>Mutasi In</span></a></li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/out') ?>"><i class="fas fa-sign-out-alt"></i> <span>Mutasi Out</span></a></li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 3) {  ?>
                            <li class="menu-header">Menu Mutasi</li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/in') ?>"><i class="fas fa-sign-in-alt"></i> <span>Mutasi In</span></a></li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/out') ?>"><i class="fas fa-sign-out-alt"></i> <span>Mutasi Out</span></a></li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 1) {  ?>
                            <li class="menu-header">Menu Surat Jalan</li>
                            <li <?= $this->uri->segment(1) == 'sjmaterial' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('sjmaterial') ?>"><i class="fas fa-file-signature"></i> <span>Surat Jalan</span></a></li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('role') == 2) {  ?>
                            <li class="menu-header">Menu Surat Jalan</li>
                            <li <?= $this->uri->segment(1) == 'sjmaterial' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('sjmaterial') ?>"><i class="fas fa-file-signature"></i> <span>Surat Jalan</span></a></li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 1) {  ?>
                            <li class="menu-header">Menu Stock Opname</li>
                            <li <?= $this->uri->segment(1) == 'opname' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('opname') ?>"><i class="fas fa-clipboard"></i> <span>Stock Opname</span></a></li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('role') == 2) {  ?>
                            <li class="menu-header">Menu Stock Opname</li>
                            <li <?= $this->uri->segment(1) == 'opname' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('opname') ?>"><i class="fas fa-clipboard"></i> <span>Stock Opname</span></a></li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 1) {  ?>
                            <li class="menu-header">Menu Laporan</li>
                            <li class="nav-item dropdown <?= $this->uri->segment(1) == 'report' ?  'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Laporan</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>><a href="<?= site_url('report/in') ?>">Mutasi In</a></li>
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>><a href="<?= site_url('report/out') ?>">Mutasi Out</a></li>
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sjmaterial' ? 'class="active"' : '' ?>><a href="<?= site_url('report/sjmaterial') ?>">Surat Jalan</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php
                        if ($this->session->userdata('role') == 2) {  ?>
                            <li class="menu-header">Menu Laporan</li>
                            <li class="nav-item dropdown <?= $this->uri->segment(1) == 'report' ?  'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Laporan</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>><a href="<?= site_url('report/in') ?>">Mutasi In</a></li>
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>><a href="<?= site_url('report/out') ?>">Mutasi Out</a></li>
                                    <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sjmaterial' ? 'class="active"' : '' ?>><a href="<?= site_url('report/sjmaterial') ?>">Surat Jalan</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->session->userdata('role') == 1) { ?>
                            <li class="menu-header">Menu User</li>
                            <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('user') ?>"><i class="fas fa-user-edit"></i> <span>List User</span></a></li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>
            <div class="main-content">
                <?php echo $contents ?>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Wesly Marpaung</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/moment/moment.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/assets/node_modules/sweetalert2/sweetalert2.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->

    <script>
        var flash = $('#flash').data('flash');
        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: flash
            })
        }
        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table2').DataTable();
        });
    </script>
</body>

</html>