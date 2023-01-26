<?php
$menus = generate_menu(session('userID'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">My PoS</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= ucwords(cek_profile(session('userID'))->nama); ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php foreach ($menus as $menu) : ?>
                            <li class="nav-header"><?= $menu->menu; ?></li>
                            <?php $submenus = generate_submenu($menu->id, session('userID')); ?>
                            <?php foreach ($submenus as $submenu) : ?>
                                <li class="nav-item">
                                    <a href="<?= $submenu->link; ?>" class="nav-link <?= ($active->submenu == $submenu->submenu) ? 'active' : ''; ?>">
                                        <i class="nav-icon <?= $submenu->icon; ?>"></i>
                                        <p>
                                            <?= $submenu->submenu; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>

                </div>
            </section>

        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/chart.js/Chart.min.js"></script>

    <script src="assets/plugins/sparklines/sparkline.js"></script>

    <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="assets/dist/js/adminlte.js?v=3.2.0"></script>

    <script src="assets/dist/js/pages/dashboard.js"></script>
</body>

</html>