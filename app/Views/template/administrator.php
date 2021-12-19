<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('/public/favicon.ico') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('/public/favicon.ico') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        SIPECO KOTA BLITAR
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?= base_url('/public/assets_admin') ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('/public/assets_admin') ?>/css/paper-dashboard.min1036.css" rel="stylesheet" />
    <link href="<?= base_url('/public/fontawesome/css') ?>/all.min.css" rel="stylesheet" />
    <link href="<?= base_url('/public/assets_admin') ?>/select2/select2.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_admin') ?>/coloris/coloris.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_admin') ?>/summernote/summernote-bs4.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_landing') ?>/vendor/leaftlet/leaflet.css" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('/public/assets_admin') ?>/css/custom.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets_admin') ?>/demo/demo.css" rel="stylesheet" />

    <!--   Core JS Files   -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/core/jquery.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/js/core/popper.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/moment.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/sweetalert2.min.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/jquery.validate.min.js"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/bootstrap-datetimepicker.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Plugin for the Bootstrap Table -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/nouislider.min.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/bootstrap-notify.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/js/plugins/loadingoverlay.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/select2/select2.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/coloris/coloris.min.js"></script>
    <script src="<?= base_url('/public/assets_admin') ?>/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url('/public/assets_landing') ?>/vendor/leaftlet/leaflet.js"></script>

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="default" data-active-color="danger">
            <div class="logo">
                <a href="<?=base_url('/administrator')?>" class="simple-text logo-mini text-center" style="position: absolute;">
                    <div class="logo-image-small text-center" style="font-size: 28px;">
                        <i class="fa fa-fire"></i>
                    </div>
                </a>
                <a href="<?=base_url('/administrator')?>" class="simple-text logo-normal text-center" style="font-weight: 600; font-family: 'Poppins'; font-size: 20px; padding-top: 8px;">
                    SIPECO
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?= base_url('/public/users_img') ?>/<?= img_check(session()->get('user_img')); ?>" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?= session()->get('user_nama'); ?>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#" onclick="dt_user_form(this)" target-id="<?= session()->get('user_id'); ?>">
                                        <span class="sidebar-mini-icon"><i class="fa fa-user"></i></span>
                                        <span class="sidebar-normal">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/auth/logout'); ?>">
                                        <span class="sidebar-mini-icon"><i class="fa fa-sign-out-alt"></i></span>
                                        <span class="sidebar-normal">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?= ($sidebar_active['menu'] == 'dashboard') ? 'active' : '' ?>">
                        <a href="<?= base_url('/administrator'); ?>">
                            <i class="fa fa-house-damage"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="<?= ($sidebar_active['menu'] == 'info_landing') ? 'active' : '' ?>">
                        <a href="<?= base_url('/administrator/info_landing'); ?>">
                            <i class="fa fa-chalkboard-teacher"></i>
                            <p>Info Landing</p>
                        </a>
                    </li>
                    <li class="<?= ($sidebar_active['menu'] == 'maps') ? 'active' : '' ?>">
                        <a data-toggle="collapse" href="#maps">
                            <i class="fa fa-map-marked-alt"></i>
                            <p>
                                Maps <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?= ($sidebar_active['menu'] == 'maps') ? 'show' : '' ?>" id="maps">
                            <ul class="nav">
                                <li class="<?= ($sidebar_active['child'] == 'layer') ? 'active' : '' ?>">
                                    <a href="<?= base_url('/administrator/layer'); ?>">
                                        <span class="sidebar-mini-icon">
                                            <i class="fa fa-layer-group"></i>
                                        </span>
                                        <span class="sidebar-normal"> Layer </span>
                                    </a>
                                </li>
                                <li class="<?= ($sidebar_active['child'] == 'properties') ? 'active' : '' ?>">
                                    <a href="<?= base_url('/administrator/properties'); ?>">
                                        <span class="sidebar-mini-icon">
                                            <i class="fa fa-project-diagram"></i>
                                        </span>
                                        <span class="sidebar-normal"> Properties</span>
                                    </a>
                                </li>
                                <li class="<?= ($sidebar_active['child'] == 'color') ? 'active' : '' ?>">
                                    <a href="<?= base_url('/administrator/color'); ?>">
                                        <span class="sidebar-mini-icon">
                                            <i class="fa fa-swatchbook"></i>
                                        </span>
                                        <span class="sidebar-normal"> Color</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?= ($sidebar_active['menu'] == 'setting') ? 'active' : '' ?>">
                        <a data-toggle="collapse" href="#setting">
                            <i class="fa fa-cogs"></i>
                            <p>
                                Setting <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?= ($sidebar_active['menu'] == 'setting') ? 'show' : '' ?>" id="setting">
                            <ul class="nav">
                                <li class="<?= ($sidebar_active['child'] == 'manajemen_user') ? 'active' : '' ?>">
                                    <a href="<?= base_url('/administrator/manajemen_user'); ?>">
                                        <span class="sidebar-mini-icon">
                                            <i class="fa fa-users-cog"></i>
                                        </span>
                                        <span class="sidebar-normal"> Manajemen User </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-icon btn-round">
                                <i class="fa fa-chevron-right text-center visible-on-sidebar-mini"></i>
                                <i class="fa fa-chevron-left text-center visible-on-sidebar-regular"></i>
                            </button>
                        </div>
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand ml-3" href="javascript:;">SIPECO</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="<?= base_url(); ?>">
                                    <i class="fa fa-chalkboard"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Landing</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <!-- Render Content -->
                <?= $this->renderSection('content'); ?>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Layhome
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-user">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?= base_url('administrator/manajemen_user' . '_save'); ?>" method="post" enctype="multipart/form-data" id="form-data-user" onsubmit="return false">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
                    </div>
                    <div class="modal-body" id="modal-content-user">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('/public/assets_admin') ?>/js/paper-dashboard.min1036.js?v=2.1.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('/public/assets_admin') ?>/demo/demo.js"></script>
    <!-- Sharrre libray -->
    <script src="<?= base_url('/public/assets_admin') ?>/demo/jquery.sharrre.js"></script>
    <?= $this->renderSection('custom_js'); ?>
    <script>
        function dt_user_form(t) {
            var id = t.getAttribute('target-id');
            $.LoadingOverlay('show');
            $.post('<?php echo base_url('administrator/manajemen_user' . '_form') ?>', {
                'id': id
            }, function(result, textStatus, xhr) {
                $.LoadingOverlay('hide');
                $('#modal-content-user').html(result);
                $('#modal-user').modal('show');
            });
        }
        $('#form-data-user').submit(
            function() {
                $.LoadingOverlay('show');
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
                        $.LoadingOverlay('hide');
                        if (result.status > 0) {
                            $('#modal-user').modal('hide');
                            Swal.fire({
                                type: 'success', //'warning', 'error', 'info', 'question',
                                title: 'Success',
                                text: result.msg,
                                confirmButtonColor: '#ef8157'
                            });
                            table.ajax.reload();
                        } else {
                            Swal.fire({
                                type: 'error', //'warning', 'error', 'info', 'question',
                                title: 'Error',
                                text: result.msg,
                                confirmButtonColor: '#ef8157'
                            });
                        }
                    }
                });
            }
        );
    </script>

</body>

</html>