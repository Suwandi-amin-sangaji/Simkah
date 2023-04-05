<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMKAH</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo2.png">
    <link rel="manifest" href="template/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="img/logo2.png">
    <meta name="theme-color" content="#ffffff">

    <link href="template/assets/css/theme.css" rel="stylesheet" />
        <style>
        .struktur img {
            width: 100%;
            margin-right: 2%;
        }

        @media screen and (min-width: 480px) {
            .struktur img {
                width: 100%;
            }
        }
    </style>

</head>

<body>
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container-fluid"><a class="navbar-brand d-flex align-items-center fw-bold fs-2"
                    href="#">SIMKAH</a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 ">
                        <li class="nav-item px-3"><a class="nav-link fw-bold active" aria-current="page"
                                href="#">Beranda</a>
                        </li>
                        <li class="nav-item px-3"><a class="nav-link" href="#pendaftaran_offline">Alur Pendaftaran
                                Offline</a>
                        </li>
                        <li class="nav-item px-3"><a class="nav-link" href="#pendaftaran_online">Alur Pendaftaran
                                Online</a>
                        </li>
                        <li class="nav-item px-3"><a class="nav-link" href="#faq">FAQ</a></li>
                        <li class="nav-item px-3"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item mt-1 px-3"><a href="user/login" type="button"
                                class="btn btn-primary btn-sm rounded-pill" style="padding:5px 30px 5px 30px;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>