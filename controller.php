<?php
require('config.php');
header('Content-type: application/json');

if (isset($_POST['submit_daftar'])) {
    // Data Login
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$user = mysqli_query($conn, "INSERT INTO tb_user VALUES(NULL, '$nama', '$email', '$password')");
	$user_id = mysqli_insert_id($conn);

    // Data Pendaftar
	$no_pendaftarn = nomor_pendaftarn();
	$desa_id = $_POST['desa_id'];
	$tempat_nikah = $_POST['tempat_nikah'];
	$tggl_akad = $_POST['tggl_akad'];
	$waktu_akad = $_POST['waktu_akad'];
	$lokasi_nikah = $_POST['lokasi_nikah'];
	$tanggal_daftar = date('Y-m-d');
	mysqli_query($conn, "INSERT INTO tb_pendaftar VALUES(NULL, '$no_pendaftarn', '$desa_id', '$user_id', '$tempat_nikah', '$tggl_akad', '$waktu_akad', '$lokasi_nikah', NULL, NULL, 'new', '$tanggal_daftar')");
	$pendaftar_id = mysqli_insert_id($conn);

	// data suami
	$warga_negara_sm = $_POST['warga_negara_sm'];
	$nik_suami = $_POST['nik_suami'];
	$nama_suami = $_POST['nama_suami'];
	$tempat_lahir_sm = $_POST['tempat_lahir_sm'];
	$tggl_lahir_sm = $_POST['tggl_lahir_sm'];
	$umur_suami = $_POST['umur_suami'];
	$alamat_suami = $_POST['alamat_suami'];
	$status_suami = $_POST['status_suami'];
	$agama_suami = $_POST['agama_suami'];
	$pekerjaan_suami = $_POST['pekerjaan_suami'];
	$pas_foto_sm = set_foto($_FILES['pas_foto_sm'], 'suami');
	mysqli_query($conn, "INSERT INTO tb_data_suami VALUES(NULL, '$pendaftar_id', '$warga_negara_sm', '$nik_suami', '$nama_suami', '$tempat_lahir_sm', '$tggl_lahir_sm', '$umur_suami', '$alamat_suami', '$status_suami', '$agama_suami', '$pekerjaan_suami', '$pas_foto_sm')");

	// data istri
	$warga_negara_is = $_POST['warga_negara_is'];
	$nik_istri = $_POST['nik_istri'];
	$nama_istri = $_POST['nama_istri'];
	$tempat_lahir_is = $_POST['tempat_lahir_is'];
	$tggl_lahir_is = $_POST['tggl_lahir_is'];
	$umur_istri = $_POST['umur_istri'];
	$alamat_istri = $_POST['alamat_istri'];
	$status_istri = $_POST['status_istri'];
	$agama_istri = $_POST['agama_istri'];
	$pekerjaan_istri = $_POST['pekerjaan_istri'];
	$pas_foto_is = set_foto($_FILES['pas_foto_is'], 'istri');
	mysqli_query($conn, "INSERT INTO tb_data_istri VALUES(NULL, '$pendaftar_id', '$warga_negara_is', '$nik_istri', '$nama_istri', '$tempat_lahir_is', '$tggl_lahir_is', '$umur_istri', '$alamat_istri', '$status_istri', '$agama_istri', '$pekerjaan_istri', '$pas_foto_is')");

	// data wali
	$nik_wali = $_POST['nik_wali'];
	$no_kk = $_POST['no_kk'];
	$nama_wali = $_POST['nama_wali'];
	$status_wali = $_POST['status_wali'];
	$agama_wali = $_POST['agama_wali'];
	$hubungan_wali = $_POST['hubungan_wali'];
	$tempat_lahir_wl = $_POST['tempat_lahir_wl'];
	$tggl_lahir_wl = $_POST['tggl_lahir_wl'];
	$umur_wali = $_POST['umur_wali'];
	$alamat_wali = $_POST['alamat_wali'];
	$no_telepon = $_POST['no_telepon'];
	$pekerjaan_wali = $_POST['pekerjaan_wali'];
	$bin = $_POST['bin'];
	mysqli_query($conn, "INSERT INTO tb_data_wali VALUES(NULL, '$pendaftar_id', '$nik_wali', '$no_kk', '$nama_wali', '$status_wali', '$agama_wali', '$hubungan_wali', '$tempat_lahir_wl', '$tggl_lahir_wl', '$umur_wali', '$alamat_wali', '$no_telepon', '$pekerjaan_wali', '$bin')");

	if (isset($_POST['front_input'])) {
		$data_cookie = ['tanggal_daftar' => $tanggal_daftar, 'no_pendaftarn' => $no_pendaftarn, 'nama_suami' => $nama_suami, 'nik_suami' => $nik_suami, 'nama_istri' => $nama_istri, 'nik_istri' => $nik_istri, 'tempat_nikah' => $tempat_nikah, 'tggl_akad' => $tggl_akad, 'waktu_akad' => $waktu_akad, 'lokasi_nikah' => $lokasi_nikah];
		setcookie('data_pendaftar', serialize($data_cookie), time() + (86400 * 30));
	}
	echo json_encode(true);
}

// SET FOTO 
function set_foto($data, $target)
{
	$ext = pathinfo($data['name'], PATHINFO_EXTENSION);
	$file_name = "pas-foto-" . $target . "-" . time() . "." . $ext;
	move_uploaded_file($data['tmp_name'], 'img/pasfoto/' . $target . '/' . $file_name);
	return $file_name;
}

// Nomor Pendaftarn
function nomor_pendaftarn()
{
	global $conn;
	$get_data = mysqli_query($conn, "SELECT * FROM tb_pendaftar");
	$count = mysqli_num_rows($get_data);
	return sprintf("%04d", $count) . '-' . rand(0, 9) . date('dm-Y');
}