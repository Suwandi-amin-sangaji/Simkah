<?php
// melakukan koneksi
require('../config.php');

//mengambil data 5 pesan terbaru
$sql = mysqli_query($conn, "SELECT * FROM tb_pesan ORDER BY idpesan DESC limit 5");
$result = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

echo json_encode(array("result" => $data));