<?php
require('../config.php');
// //menghitung jumlah pesan dari tabel pesan
// $query = mysqli_query($conn, "Select Count(idpesan) as jumlah From tb_pesan");

// //menampilkan data
// $hasil = mysqli_fetch_array($query);

// //membuat data json
// echo json_encode(array('jumlah' => $hasil['jumlah']));

$sql = "UPDATE notifications SET status='1'";
$res = mysqli_query($conn, $sql);
if ($res) {
    echo "Success";
} else {
    echo "Failed";
}