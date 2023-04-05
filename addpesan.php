<?php
include "config.php";

// Tambah Data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $res = mysqli_query($conn, "INSERT INTO tb_pesan ( nama, email, pesan) VALUES ('$nama', '$email', '$pesan')");
    if ($res) $response = 'success_add';
    else $response = 'error';
}