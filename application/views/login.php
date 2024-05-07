<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Page</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/assets/assets/img/bmi.png">

    <script src="<?= base_url(); ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?= base_url(); ?>/assets/assets/img/bmi.png" alt="logo" width="80" class="mb-4 shadow-light">
                        <h4 class="text-dark font-weight-normal">Selamat Datang</h4>
                        <div class="mb-4"></div>
                        <h4 class="font-weight-bold">Website Material Control</h4>
                        <h4 class="font-weight-bold">PT Bintang Matrix Indoensia</h4>
                        <div class="mb-4"></div>
                        <p class="text-muted">Silahkan login terlebih dahulu</p>
                        <form action="<?= site_url('auth/process') ?>" method="POST">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Mohon isi username anda
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="4" required>
                                <div class="invalid-feedback">
                                    Mohon isi password anda
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" name="login" class="btn btn-success btn-lg btn-icon icon-right mb">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-x position-relative overlay-gradient-bottom" data-background="<?= base_url(); ?>/assets/assets/img/login_page.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">PT Bintang Matrix Indonesia</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bekasi, Bantar Gebang</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/moment/moment.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url(); ?>/assets/assets/js/page/modules-sweetalert.js"></script>
</body>

</html>