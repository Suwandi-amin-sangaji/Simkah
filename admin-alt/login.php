<?php 
require('../config.php');

if (isset($_SESSION['login_admin'])) header("location: index.php");

$username = null;
$err_user = false;
$err_pass = false;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
    $get = mysqli_fetch_assoc($result);

    if ($get) {
        $get_password = $get['password'];

        if (password_verify($password, $get_password)) {
            $_SESSION['login_admin'] = $get_password;
            header("location: index.php");
            exit();
        } else $err_pass = true;
    } else $err_user = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Login Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image: url(dist/img/green.jpg);">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <span class="h1"><b>Admin</b>SIMKAH</span>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $username ? $username : '' ?>" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($err_user == true) { ?>
                        <div class="text-danger">
                            Username tidak ditemukan
                        </div>
                    <?php } ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($err_pass == true) { ?>
                        <div class="text-danger">
                            Password tidak sesuai
                        </div>
                    <?php } ?>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
