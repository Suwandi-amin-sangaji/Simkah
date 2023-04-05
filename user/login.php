<?php
require('../config.php');

if (isset($_SESSION['login_user'])) header("location: index.php");

$email = null;
$err_email = false;
$err_pass = false;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $get = mysqli_fetch_assoc($result);

    if ($get) {
        $get_password = $get['password'];

        if ($password == $get_password) {
            $_SESSION['login_user'] = $get_password;
            $_SESSION['login_user_get_id'] = $get['id'];
            header("location: index.php");
            exit();
        } else $err_pass = true;
    } else $err_email = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo2.png">
    <meta name="msapplication-TileImage" content="../img/logo2.png">

    <link rel="stylesheet" href="asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="asset/css/style.css">

    <title>Login User</title>
</head>

<!-- [ auth-signin ] start -->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="asset/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In</h3>
                            <p class="mb-4">Masukkan Email Dan Password Anda</p>
                            <?php if ($err_email == true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Email!</strong> Tidak Ditemukan!!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <?php if ($err_pass == true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Password!</strong> Tidak Sesuai!!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                        </div>
                        <form method="post">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <input type="submit" value="Log In" name="login" class="btn btn-block btn-primary">

                            <span class="d-block text-left my-4 text-muted">
                                <p class="mb-0 text-muted">Belum
                                    punya akun? <a href="../daftar" class="f-w-400">Lakukan
                                        Pendaftaran nikah disini</a></p>
                            </span>
                            
                            <span class="d-block text-left my-4 text-muted">
                                <p class="mb-0 text-muted">Kembali Ke  <a href="../" class="f-w-400">HOME</a></p>
                            </span>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="asset/js/jquery-3.3.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>
</body>

</html>