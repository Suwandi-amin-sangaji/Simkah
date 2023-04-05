<?php
require('../config.php');

if (!isset($_SESSION['login_admin'])) {
    header("location: login");
}

$admin = mysqli_query($conn, "SELECT * FROM tb_admin");
$adm = mysqli_fetch_assoc($admin);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo2.png">
    <link rel="manifest" href="template/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../img/logo2.png">
    <title>Admin Simkah</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/printjs/print.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge count" id="notif"></span>
                    </a>
                    <?php
                    require('../config.php');
                    //menghitung jumlah pesan dari tabel pesan
                    $query = mysqli_query($conn, "Select Count(idpesan) as jumlah From tb_pesan");

                    //menampilkan data
                    $hasil = mysqli_fetch_array($query); ?>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?= $hasil['jumlah']; ?> Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="pesan" class="dropdown-item" id="pesan">

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> -->

                <li class="nav-item dropdown">
                    <?php $sql = "SELECT * FROM notifications WHERE status='0' ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql); ?>
                    <a class="nav-link" data-toggle="dropdown" href="#" id="notifications">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge count"><?php echo mysqli_num_rows($res); ?></span>
                    </a>
                    <input type="checkbox" class="dropdown-check" id="check" />
                    <ul class="dropdown">
                        <?php
                        if (mysqli_num_rows($res) > 0) {
                            foreach ($res as $item) {
                        ?>
                        <li><?php echo $item["text"]; ?></li>
                        <?php }
                        } ?>
                    </ul>


                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../admin/" class="nav-link" id="dashboard">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="input-data-pendaftar">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Input & Data Pendaftar
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-3">
                                    <a href="data-pendaftar" class="nav-link" id="data-pendaftar">
                                        <p>Data Pendaftar</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-3">
                                    <a href="pendaftar-disetujui" class="nav-link" id="data-disetujui">
                                        <p>Pendaftar Disetujui</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-3">
                                    <a href="tambah-daftar-nikah" class="nav-link" id="tambah-data-nikah">
                                        <p>Tambah Daftar Nikah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="akta-nikah" class="nav-link" id="akta-nikah">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Data Akta Nikah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="permintaan-duplikat">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Permintaan Duplikat
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-3">
                                    <a href="permintaan-baru" class="nav-link" id="permintaan-baru">
                                        <p>Permintaan Baru</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-3">
                                    <a href="riwayat-permintaan" class="nav-link" id="riwayat-permintaan">
                                        <p>Riwayat Permintaan</p>
                                    </a>
                                </li>

                                <li class="nav-item pl-3">
                                    <a href="duplikat-buku-nikah" class="nav-link" id="duplikat-buku-nikah">
                                        <p>Data duplikat buku Nikah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="master-data">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item pl-3">
                                    <a href="data-penghulu" class="nav-link" id="data-penghulu">
                                        <p>Data Penghulu</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-3">
                                    <a href="data-desa" class="nav-link" id="data-desa">
                                        <p>Data Kelurahan/Desa</p>
                                    </a>
                                </li>
                                <li class="nav-item pl-3">
                                    <a href="arsip-pendaftaran" class="nav-link" id="arsip-pendaftaran">
                                        <p>Arsip Data Pendaftar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="laporan" class="nav-link" id="laporan">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <li class="nav-header">MANAGE ACCOUNT</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-edt-akun">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Account
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pesan" class="nav-link" id="pesan">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>Pesan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout" class="nav-link">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>