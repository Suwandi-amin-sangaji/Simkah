<?php
require('../config.php');

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$user_id = $_SESSION['login_user_get_id'];
$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$user_id'");
$usr = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel User - Simkah Sorong</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo2.png">
    <meta name="msapplication-TileImage" content="../img/logo2.png">

    <!-- prism css -->
    <link rel="stylesheet" href="assets/css/plugins/prism-coy.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">



</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar theme-horizontal menu-light">
        <div class="navbar-wrapper container">
            <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>MAIN MENU</label>
                    </li>
                    <li class="nav-item">
                        <a href="../user" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="data-nikah" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Data
                                Nikah</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="daftar-pengajuan" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Daftar
                                Pengajuan</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="data-pengajuan" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Data
                                Pengajuan</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="pengajuan-baru" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Pengajuan
                                Baru</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <div class="container">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="../img/logo2.png" height="50" alt="" class="logo">
                    <b class="ml-2" style="font-size: 18px;"> Simkah Sorong</b>
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?= $usr['nama'] ?> <i class="feather icon-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="../img/avatar.png" class="img-radius" alt="User-Profile-Image">
                                    <span><?= $usr['nama'] ?></span>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="logout.php" class="dropdown-item"><i class="feather icon-log-out"></i>
                                            Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->