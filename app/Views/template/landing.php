<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPECO KOTA BLITAR</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('/public/favicon.ico') ?>" rel="icon">
    <link href="<?= base_url('/public/favicon.ico') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/leaftlet/leaflet.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/fontawesome/css') ?>/all.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= base_url('/public/assets_landing') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/css/custom.css" rel="stylesheet">
</head>

<body>
    <style>
        .input-group-text {
            padding: 0.75rem 0.75rem !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            color: #444444;
        }
    </style>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="<?= base_url() ?>"><i class="fa fa-fire"></i> SIPECO</a></h1>
            </div>
            <?php $MD = new \App\Models\MUtils(); ?>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#maps-features">Maps</a></li>
                    <?php foreach ($MD->getInfoLanding() as $row) : ?>
                        <li><a class="nav-link scrollto" href="#<?= $row['info_landing_seo'] ?>"><?= $row['info_landing_nama'] ?></a></li>
                    <?php endforeach; ?>
                    <?php if (!session()->get('user_id')) : ?>
                        <li><a class="nav-link scrollto" href="#" id="btn-login">Login</a></li>
                    <?php else : ?>
                        <li><a class="nav-link scrollto" href="<?= base_url('/administrator') ?>">Dashboard</a></li>
                    <?php endif ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- Content Render -->
    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>SIPECO</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('auth/login'); ?>" id="form-login" onsubmit="return false">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <!-- <div class="form-group"> -->
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in-alt mr-2"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('/public/assets_landing') ?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/leaftlet/leaflet.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/toastr/toastr.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('/public/assets_landing') ?>/js/main.js"></script>
    <?= $this->renderSection('custom_js'); ?>
    <script>
        $('#btn-login').click(
            function() {
                $('#form-login').trigger('reset');
                $('#loginModal').modal('show');
            }
        );
        $('#form-login').submit(
            function() {
                $('#loginModal').modal('hide');
                $.ajax({
                    url: this.action,
                    type: 'post',
                    data: new FormData(this),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(result, textStatus, xhr) {
                        if (result.status > 0) {
                            window.location.replace('<?= base_url('/administrator'); ?>');
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        );
    </script>

</body>

</html>