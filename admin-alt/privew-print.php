<?php 
require('../config.php');

if (!isset($_SESSION['login_admin'])) {
	header("location: login.php");
}

if (!isset($_GET['pendaftar_id'])) {
	header("location: akta-nikah.php");
}

$pendaftar_id=$_GET['pendaftar_id'];

$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
$periksa = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE pendaftar_id='$pendaftar_id'");
$dta=mysqli_fetch_assoc($pendaftar);
$dsm = mysqli_fetch_assoc($data_sm);
$dis = mysqli_fetch_assoc($data_is);
$pmr = mysqli_fetch_assoc($periksa);

switch(date('D', strtotime($dta['tggl_akad']))){
	case 'Sun': $hari = "Minggu"; break;
	case 'Mon': $hari = "Senin"; break;
	case 'Tue': $hari = "Selasa"; break;
	case 'Wed':	$hari = "Rabu"; break;
	case 'Thu':	$hari = "Kamis"; break;
	case 'Fri':	$hari = "Jumat"; break;
	case 'Sat':	$hari = "Sabtu"; break;
	default: $hari = "Tidak di ketahui"; break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/logo.png" type="image/png">
	<title>Admin SIMKAH SUL-SEL</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
<body class="">


	<!-- Main content -->
	<section class="content">
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div id="" class="p-1" style="font-size: 12px;">
					<div class="row m-auto ">
						<div class="col-md-1">
						</div>
						<div class="p-3 col-md-5" style="height: 500px auto; border-radius: 20px; border: 5px solid; margin-right: 20px;">
							<div class="row">
								<div class="rounded mx-auto d-block">
									<img src="img/ri.png" alt="" height="70">
								</div>
							</div>
							<div class="">
								<h6 class="text-center">REPUBLIK INDONESIA<br><br>KUTIPAN AKTA NIKAH<br><i>EXCERPT OF MARRIGAGE CERTIFICATE</i></h6>
								<div class="text-center">KANTOR URUSAN AGAMA / OFFICE OF RELIGIOUS AFFAIRS</div><br>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Kecamatan / <i>District</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Kecamatan Tallo</b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Perwakilan RI / <i>Indonesian embassy</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Kabupaten / <i>Kota</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Kota Makassar</b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Regency / <i>Municipalty</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Propinsi / <i>Province</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Sulawesi Selatan</b></div>
								</div>
							</div><br><br>
							<div class="row">
								<div class="rounded mx-auto d-block" style="margin-bottom: 5px;">
									<img src="../img/pasfoto/suami/<?= $dsm['pas_foto'] ?>" style="min-height: 3cm; max-height: 3cm; min-width: 2.5cm; max-width: 2.5cm; border: dashed 2px; width: 90px; margin-right: 40px;" class="thumn-sm">
									<img src="../img/pasfoto/istri/<?= $dis['pas_foto'] ?>" style="min-height: 3cm; max-height: 3cm; min-width: 2.5cm; max-width: 2.5cm; border: dashed 2px; width: 90px;" class="thumn-sm">
								</div>
							</div>
						</div>
						<div class="p-3 col-md-5" style="height: 500px auto; border-radius: 20px; border: 5px solid;">
							<div class="">
								<h6 class="text-center">KUTIPAN AKTA NIKAH<br><i>EXCERPT OF MARRIGAGE CERTIFICATE</i></h6>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Nomor / <i>Number</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= str_replace('-', '/', $dta['no_pendaftarn']) ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Pada hari / <i>Day</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $hari ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Tanggal, bulan, tahun /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= date('d/m/Y', strtotime($dta['tggl_akad'])) ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Date, Month, Year</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Bertepatan / <i>Or</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dta['lokasi_nikah'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Pukul / <i>At</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dta['waktu_akad'] ?></b></div>
								</div>
							</div><br>
							<div class="text-center">
								<b>Telah dilangsungkan akad nikah seorang laki-laki :<br><i>There has been authenticated a convenant of mariage of a man :</i></b>
							</div><br>

							<div class="row">
								<div style="width: 40%;">
									<div class="">1. Nama / <i>Full name</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['nama'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">2. Bin / <i>Son of</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $pmr['nama_as'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">3. Tempat & tanggal lahir /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['tempat_lahir'].', '.date('d F Y', strtotime($dis['tggl_lahir'])) ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Place and date of birth</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">4. Warganegara / <i>Nationality</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['warga_negara'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">5. Agama / <i>Religion</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['agama'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">6. Status sebelumnya /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['status'] ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Marital stasus prior marriage</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">7. Alamat / <i>Address</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['alamat'] ?></b></div>
								</div>
							</div><div class="row">
								<div style="width: 40%;">
									<div class="">8. Pekerjaan / <i>Ocoupation</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dsm['pekerjaan'] ?></b></div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<hr>
					<br>
					<div class="row m-auto ">
						<div class="col-md-1">
						</div>
						<div class="p-3 col-md-5" style="height: 500px auto; border-radius: 20px; border: 5px solid; margin-right: 20px;">
							<div class="row">
								<div class="rounded mx-auto d-block">
									<img src="img/ri.png" alt="" height="70">
								</div>
							</div>
							<div class="">
								<h6 class="text-center">REPUBLIK INDONESIA<br><br>KUTIPAN AKTA NIKAH<br><i>EXCERPT OF MARRIGAGE CERTIFICATE</i></h6>
								<div class="text-center">KANTOR URUSAN AGAMA / OFFICE OF RELIGIOUS AFFAIRS</div><br>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Kecamatan / <i>District</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Kecamatan Tallo</b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Perwakilan RI / <i>Indonesian embassy</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Kabupaten / <i>Kota</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Kota Makassar</b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Regency / <i>Municipalty</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Propinsi / <i>Province</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b>Sulawesi Selatan</b></div>
								</div>
							</div><br><br>
							<div class="row">
								<div class="rounded mx-auto d-block" style="margin-bottom: 5px;">
									<img src="../img/pasfoto/suami/<?= $dsm['pas_foto'] ?>" style="min-height: 3cm; max-height: 3cm; min-width: 2.5cm; max-width: 2.5cm; border: dashed 2px; width: 90px; margin-right: 40px;" class="thumn-sm">
									<img src="../img/pasfoto/istri/<?= $dis['pas_foto'] ?>" style="min-height: 3cm; max-height: 3cm; min-width: 2.5cm; max-width: 2.5cm; border: dashed 2px; width: 90px;" class="thumn-sm">
								</div>
							</div>
						</div>
						<div class="p-3 col-md-5" style="height: 500px auto; border-radius: 20px; border: 5px solid;">
							<div class="">
								<h6 class="text-center">KUTIPAN AKTA NIKAH<br><i>EXCERPT OF MARRIGAGE CERTIFICATE</i></h6>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Nomor / <i>Number</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= str_replace('-', '/', $dta['no_pendaftarn']) ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Pada hari / <i>Day</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $hari ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Tanggal, bulan, tahun /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= date('d/m/Y', strtotime($dta['tggl_akad'])) ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Date, Month, Year</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Bertepatan / <i>Or</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dta['lokasi_nikah'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">Pukul / <i>At</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dta['waktu_akad'] ?></b></div>
								</div>
							</div><br>
							<div class="text-center">
								<b>Telah dilangsungkan akad nikah seorang perempuan :<br><i>There has been authenticated a convenant of mariage of a woman :</i></b>
							</div><br>

							<div class="row">
								<div style="width: 40%;">
									<div class="">1. Nama / <i>Full name</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['nama'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">2. Bin / <i>Son of</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $pmr['nama_ai'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">3. Tempat & tanggal lahir /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['tempat_lahir'].', '.date('d F Y', strtotime($dis['tggl_lahir'])) ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Place and date of birth</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">4. Warganegara / <i>Nationality</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['warga_negara'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">5. Agama / <i>Religion</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['agama'] ?></b></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">6. Status sebelumnya /</div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['status'] ?></b></div>
								</div>
								<div style="width: 40%; margin-top: -5px;">
									<div class=""><i>Marital stasus prior marriage</i></div>
								</div>
							</div>
							<div class="row">
								<div style="width: 40%;">
									<div class="">7. Alamat / <i>Address</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['alamat'] ?></b></div>
								</div>
							</div><div class="row">
								<div style="width: 40%;">
									<div class="">8. Pekerjaan / <i>Ocoupation</i></div>
								</div>
								<div class="row" style="width: 60%;">
									: <div style="font-size: 13px; border-bottom: 1px dotted #000; width: 95%; margin-left: 5px;"><b><?= $dis['pekerjaan'] ?></b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

	<script type="">
		$(document).ready(function() {
			window.print();
			window.onafterprint = function() {
				window.close();
			}
		});
	</script>