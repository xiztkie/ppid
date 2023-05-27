<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Portal PPID Kabupaten Puncak Jaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="<?= base_url() ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark" data-layout="horizontal">
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <i class="ri-loader-line spin-icon"></i>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url() ?>assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url() ?>assets/images/logo-light.png" alt="logo-light" height="20">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                </div>
            </div>
        </header>
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#'); ?>">
                                    <i class="fas fa-home me-2"></i> Beranda
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" id="topnav" role="button">
                                    <i class="fas fa-user me-2"></i> Profile
                                </a>
                                <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-sm" aria-labelledby="topnav">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div>
                                                <a class="dropdown-item" href="<?= base_url('tentang'); ?>">Tentang PPID</a>
                                                <a class="dropdown-item" href="<?= base_url('tugas'); ?>">Tugas Pokok dan Fungsi</a>
                                                <a class="dropdown-item" href="<?= base_url('struktur'); ?>">Struktur Organisasi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('kontak'); ?>">
                                    <i class="fas fa-phone-alt me-2"></i> Kontak Kami
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('regulasi'); ?>">
                                    <i class="fas fa-book me-2"></i> Regulasi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('laporan'); ?>">
                                    <i class="fas fa-file-alt me-2"></i> Laporan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <div class="d-inline-block">
                            <button type="button" class="btn header-item waves-effect">  
                                <?php 
                                $username = session()->get('username');
                                if ($username=='') { ?>
                                    <a class="d-none d-xl-inline-block ms-1" href="<?= base_url('login'); ?>">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                        Login
                                    </a>
                                <?php } else { ?>
                                    <a class="d-none d-xl-inline-block ms-1" href="<?= base_url('dashboard'); ?>">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                        Dashboard
                                    </a>
                                <?php } ?>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <?= $this->renderSection('content') ?>


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Upcube.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="<?= base_url() ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <!-- Required datatable js -->
    <script src="<?= base_url() ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

    <!-- Gmaps file -->
    <script src="<?= base_url() ?>assets/libs/gmaps/gmaps.min.js"></script>

    <!-- demo codes -->
    <script src="<?= base_url() ?>assets/js/pages/gmaps.init.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?= site_url('permohonan/generatetiket') ?>",
                type: "GET",
                success: function(hasil) {
                    var obj = $.parseJSON(hasil);
                    $('#nomortiket').val(obj);
                }
            })
        });
    </script>
</body>

</html>