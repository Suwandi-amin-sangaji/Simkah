<?php
require('template/header.php');

if (!isset($_GET['data_id'])) {
	header('Location: data-nikah.php');
	exit();
}

$pendaftar_id = $_GET['data_id'];
$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
$dta = mysqli_fetch_assoc($pendaftar);

$desa_id = $dta['desa_id'];
$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
$data_wl = mysqli_query($conn, "SELECT * FROM tb_data_wali WHERE pendaftar_id='$pendaftar_id'");
$pmriksn = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE pendaftar_id='$pendaftar_id'");
$dsm = mysqli_fetch_assoc($data_sm);
$dis = mysqli_fetch_assoc($data_is);
$dwl = mysqli_fetch_assoc($data_wl);
$pmr = mysqli_fetch_assoc($pmriksn);

$response = null;
if (isset($_POST['edit_data'])) {
	// data pendaftaran
	$no_pendaftarn = $_POST['no_pendaftarn'];
	$desa_id = $_POST['desa_id'];
	$penghulu_id = $_POST['penghulu_id'];
	$tempat_nikah = $_POST['tempat_nikah'];
	$tggl_akad = $_POST['tggl_akad'];
	$lokasi_nikah = $_POST['lokasi_nikah'];
	$tanggal_daftar = date('Y-m-d');
	mysqli_query($conn, "UPDATE tb_pendaftar SET no_pendaftarn='$no_pendaftarn', desa_id='$desa_id', penghulu_id='$penghulu_id', tempat_nikah='$tempat_nikah', tggl_akad='$tggl_akad', lokasi_nikah='$lokasi_nikah' WHERE id='$pendaftar_id'");

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
	mysqli_query($conn, "UPDATE tb_data_suami SET warga_negara='$warga_negara_sm', nik='$nik_suami', nama='$nama_suami', tempat_lahir='$tempat_lahir_sm', tggl_lahir='$tggl_lahir_sm', umur='$umur_suami', alamat='$alamat_suami', status='$status_suami', pekerjaan='$pekerjaan_suami' WHERE pendaftar_id='$pendaftar_id'");

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
	mysqli_query($conn, "UPDATE tb_data_istri SET warga_negara='$warga_negara_is', nik='$nik_istri', nama='$nama_istri', tempat_lahir='$tempat_lahir_is', tggl_lahir='$tggl_lahir_is', umur='$umur_istri', alamat='$alamat_istri', status='$status_istri', pekerjaan='$pekerjaan_istri' WHERE pendaftar_id='$pendaftar_id'");

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
	mysqli_query($conn, "UPDATE tb_data_wali SET nik='$nik_wali', no_kk='$no_kk', nama='$nama_wali', status='$status_wali', hubungan='$hubungan_wali', tempat_lahir='$tempat_lahir_wl', tggl_lahir='$tggl_lahir_wl', umur='$umur_wali', alamat='$alamat_wali', no_telepon='$no_telepon', pekerjaan='$pekerjaan_wali', bin='$bin' WHERE pendaftar_id='$pendaftar_id'");

	// data pemeriksaan
	$nama_as = $_POST['nama_as'];
	$nama_is = $_POST['nama_is'];
	$nama_ai = $_POST['nama_ai'];
	$nama_ii = $_POST['nama_ii'];
	$jenis_mk = $_POST['jenis_mk'];
	$jumlah_mk = $_POST['jumlah_mk'];
	$pembayaran_mk = $_POST['pembayaran_mk'];

	mysqli_query($conn, "UPDATE tb_pemeriksaan SET nama_as='$nama_as', nama_is='$nama_is', nama_ai='$nama_ai', nama_ii='$nama_ii', jenis_mk='$jenis_mk', jumlah_mk='$jumlah_mk', pembayaran_mk='$pembayaran_mk' WHERE pendaftar_id='$pendaftar_id'");

	$response = 'success_edit';
}
?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Admin SIMKAH Tallo</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
						<li class="breadcrumb-item active">Input & Data Nikah</li>
						<li class="breadcrumb-item active">Data Nikah</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row m-b-30">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3>Edit Data Nikah</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body row justify-content-center">
								<div class="col-sm-10">
									<form method="POST">
										<!-- Data Nikah -->
										<div class="modal-body px-5" style="margin-bottom: -20px;">
											<h4>Data Nikah</h4>
											<div class="mb-3 row">
												<label class="col-sm-3 col-form-label">Nomor Akta Nikah</label>
												<div class="col-sm-9">
													<input class="form-control" id="no_pendaftarn" name="no_pendaftarn" type="text" placeholder="Nomor Akta Nikah" value="<?= $dta['no_pendaftarn'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Kelurahan/Desa</label>
												<div class="col-sm-9">
													<select class="form-control" id="desa_id" name="desa_id">
														<option value="">--Pilih Desa/Kelurahan--</option>
														<?php
														$desa = mysqli_query($conn, "SELECT * FROM tb_desa");
														foreach ($desa as $dsa) { ?>
															<option value="<?= $dsa['id'] ?>"><?= $dsa['nama_desa'] ?></option>
														<?php } ?>
													</select>
												</div>
												<script>
													document.getElementById('desa_id').value = "<?= $dta['desa_id'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nikah di</label>
												<div class="col-sm-9">
													<select class="form-control" id="tempat_nikah" name="tempat_nikah">
														<option value="Di KUA">Di KUA</option>
														<option value="Di Luar KUA">Di Luar KUA</option>
													</select>
												</div>
												<script>
													document.getElementById('tempat_nikah').value = "<?= $dta['tempat_nikah'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Tanggal Akad Nikah</label>
												<div class="col-sm-9">
													<input class="form-control" type="date" id="tggl_akad" name="tggl_akad" value="<?= $dta['tggl_akad'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Alamat Lokasi Akad Nikah</label>
												<div class="col-sm-9">
													<textarea class="form-control" rows="3" placeholder="Alamat Lokasi Akad Nikah" name="lokasi_nikah"><?= $dta['lokasi_nikah'] ?></textarea>
												</div>
											</div>
										</div>
										<hr>

										<!-- Suami -->
										<div class="modal-body px-5" style="margin-bottom: -20px;">
											<h4>Data Calon Suami</h4>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Warganegara</label>
												<div class="col-sm-9">
													<select name="warga_negara_sm" class="form-control validate-select required-entry" id="warga_negara_sm">
														<option value="0" style="display: none;">Pilih Warganegara</option>
														<option value="WNI">WNI</option>
														<option value="WNA">WNA</option>
													</select>
												</div>
												<script>
													document.getElementById('warga_negara_sm').value = "<?= $dsm['warga_negara'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nik Calon Suami</label>
												<div class="col-sm-9">
													<input class="form-control" id="nik_suami" name="nik_suami" type="text" placeholder="Nik Calon Suami" value="<?= $dsm['nik'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Calon Suami</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Calon Suami" name="nama_suami" id="nama_suami" value="<?= $dsm['nama'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat_lahir_sm" name="tempat_lahir_sm" value="<?= $dsm['tempat_lahir'] ?>">
												</div>
											</div>
											<div class="find-umur">
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
													<div class="col-sm-9">
														<input class="form-control umur" type="date" name="tggl_lahir_sm" id="tggl_lahir_sm" value="<?= date('Y-m-d', strtotime($dsm['tggl_lahir'])) ?>">
													</div>
												</div>
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Umur</label>
													<div class="col-sm-9">
														<input type="text" id="umur_suami" class="text-primary form-control result" placeholder="Umur" name="umur_suami" id="umur_suami" value="<?= $dsm['umur'] ?>">
													</div>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9">
													<textarea class="form-control" name="alamat_suami" required autocomplete="off" placeholder="Alamat" rows="2"><?= $dsm['alamat'] ?></textarea>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Status</label>
												<div class="col-sm-9">
													<select class="form-control validate-select required-entry" defaultvalue="" name="status_suami" id="status_suami">
														<option value="" style="display: none;">Pilih Status</option>
														<option value="Beristri">Beristri</option>
														<option value="Jejaka">Jejaka</option>
														<option value="Cerai Mati">Cerai Mati</option>
														<option value="Cerai Hidup">Cerai Hidup</option>
													</select>
												</div>
												<script>
													document.getElementById('status_suami').value = "<?= $dsm['status'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Agama</label>
												<div class="col-sm-9">
													<input class="form-control" id="agama_suami" type="text" placeholder="Agama" value="Islam" readonly="" name="agama_suami">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Pekerjaan" id="pekerjaan_suami" name="pekerjaan_suami" value="<?= $dsm['pekerjaan'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Ayah Suami</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Ayah Suami" id="nama_as" name="nama_as" value="<?= $pmr['nama_as'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Ibu Suami</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Ibu Suami" id="nama_is" name="nama_is" value="<?= $pmr['nama_is'] ?>">
												</div>
											</div>
										</div>
										<hr>
										<!-- Istri -->
										<div class="modal-body px-5" style="margin-bottom: -20px;">
											<h4>Calon Istri</h4>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Warganegara</label>
												<div class="col-sm-9">
													<select name="warga_negara_is" class="form-control validate-select required-entry" id="warga_negara_is">
														<option value="0" style="display: none;">Pilih Warganegara</option>
														<option value="WNI">WNI</option>
														<option value="WNA">WNA</option>
													</select>
												</div>
												<script>
													document.getElementById('warga_negara_is').value = "<?= $dis['warga_negara'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nik Calon Istri</label>
												<div class="col-sm-9">
													<input class="form-control" id="nik_istri" name="nik_istri" type="text" placeholder="Nik Calon Istri" value="<?= $dis['nik'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Calon Istri</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Calon Istri" name="nama_istri" id="nama_istri" value="<?= $dis['nama'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat_lahir_is" name="tempat_lahir_is" value="<?= $dis['tempat_lahir'] ?>">
												</div>
											</div>
											<div class="find-umur">
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
													<div class="col-sm-9">
														<input class="form-control umur" type="date" name="tggl_lahir_is" id="tggl_lahir_is" value="<?= date('Y-m-d', strtotime($dis['tggl_lahir'])) ?>">
													</div>
												</div>
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Umur</label>
													<div class="col-sm-9">
														<input type="text" id="umur_istri" class="text-primary form-control result" placeholder="Umur" name="umur_istri" id="umur_istri" value="<?= $dis['umur'] ?>">
													</div>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9">
													<textarea class="form-control" name="alamat_istri" required autocomplete="off" placeholder="Alamat" rows="2"><?= $dis['alamat'] ?></textarea>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Status</label>
												<div class="col-sm-9">
													<select class="form-control validate-select required-entry" defaultvalue="" name="status_istri" id="status_istri">
														<option value="" style="display: none;">Pilih Status</option>
														<option value="Perawan">Perawan</option>
														<option value="Cerai Mati">Cerai Mati</option>
														<option value="Cerai Hidup">Cerai Hidup</option>
													</select>
												</div>
												<script>
													document.getElementById('status_istri').value = "<?= $dis['status'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Agama</label>
												<div class="col-sm-9">
													<input class="form-control" id="agama_istri" type="text" placeholder="Agama" value="Islam" readonly="" name="agama_istri">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Pekerjaan" id="pekerjaan_istri" name="pekerjaan_istri" value="<?= $dis['pekerjaan'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Ayah Istri</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Ayah Istri" id="nama_ai" name="nama_ai" value="<?= $pmr['nama_ai'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Ibu Istri</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Ibu Istri" id="nama_ii" name="nama_ii" value="<?= $pmr['nama_ii'] ?>">
												</div>
											</div>
										</div>
										<hr>
										<!-- wali -->
										<div class="modal-body px-5" style="margin-bottom: -20px;">
											<h4>Data Wali</h4>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nik Wali</label>
												<div class="col-sm-9">
													<input class="form-control" id="nik_wali" name="nik_wali" type="text" placeholder="Nik Wali" value="<?= $dwl['nik'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nomor Kartu Keluarga</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nomor Kartu Keluarga" name="no_kk" id="no_kk" value="<?= $dwl['no_kk'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nama Wali</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Nama Wali" name="nama_wali" id="nama_wali" value="<?= $dwl['nama'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Status Wali</label>
												<div class="col-sm-9">
													<select class="form-control validate-select required-entry" defaultvalue="" name="status_wali" id="status_wali">
														<option value="" style="display: none;">Pilih Satatus</option>
														<option value="Nasabah">Nasabah</option>
														<option value="Hakim">Hakim</option>
													</select>
												</div>
												<script>
													document.getElementById('status_wali').value = "<?= $dwl['status'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Agama</label>
												<div class="col-sm-9">
													<input class="form-control" id="agama_wali" type="text" placeholder="Agama" value="Islam" readonly="" name="agama_wali">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Hubungan Wali</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Hubungan Wali" name="hubungan_wali" id="hubungan_wali" value="<?= $dwl['hubungan'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat_lahir_wl" name="tempat_lahir_wl" value="<?= $dwl['tempat_lahir'] ?>">
												</div>
											</div>
											<div class="find-umur">
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
													<div class="col-sm-9">
														<input class="form-control umur" type="date" name="tggl_lahir_wl" id="tggl_lahir_wl" value="<?= date('Y-m-d', strtotime($dwl['tggl_lahir'])) ?>">
													</div>
												</div>
												<div class="mb-3 row">
													<label for="" class="col-sm-3 col-form-label">Umur</label>
													<div class="col-sm-9">
														<input type="text" id="umur_wali" class="text-primary form-control result" placeholder="Umur" name="umur_wali" id="umur_wali" value="<?= $dwl['umur'] ?>">
													</div>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9">
													<textarea class="form-control" name="alamat_wali" required autocomplete="off" placeholder="Alamat" rows="2"><?= $dwl['alamat'] ?></textarea>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Nomor Telepone</label>
												<div class="col-sm-9">
													<input class="form-control" type="number" placeholder="Nomor Telepon" id="no_telepon" name="no_telepon" value="<?= $dwl['no_telepon'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Pekerjaan" id="pekerjaan_wali" name="pekerjaan_wali" value="<?= $dwl['pekerjaan'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Bin</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Bin" name="bin" id="bin" value="<?= $dwl['bin'] ?>">
												</div>
											</div>
										</div>
										<hr>
										<!-- Mas Kawin -->
										<div class="modal-body px-5" style="margin-bottom: -20px;">
											<h4>Penghulu & Mas Kawin</h4>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Penghulu</label>
												<div class="col-sm-9">
													<select class="form-control" name="penghulu_id" id="penghuluId" required>
														<option value="">--Penghulu--</option>
														<?php
														$penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu");
														foreach ($penghulu as $pngh) { ?>
															<option value="<?= $pngh['id'] ?>"><?= $pngh['nama'] ?></option>
														<?php } ?>
													</select>
												</div>
												<script>
													document.getElementById('penghuluId').value = "<?= $dta['penghulu_id'] ?>";
												</script>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Jenis Mas Kawin</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Jenis Mas Kawin" name="jenis_mk" id="jenis_mk" value="<?= $pmr['jenis_mk'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Jumlah Mas Kawin</label>
												<div class="col-sm-9">
													<input class="form-control" type="text" placeholder="Jumlah Mas Kawin" name="jumlah_mk" id="jumlah_mk" value="<?= $pmr['jumlah_mk'] ?>">
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label">Pembayaran</label>
												<div class="col-sm-9">
													<select class="form-control" name="pembayaran_mk" id="pembayaran_mk" required>
														<option value="Tunai">Tunai</option>
														<option value="Cicil">Cicil</option>
													</select>
												</div>
												<script>
													document.getElementById('pembayaran_mk').value = "<?= $pmr['pembayaran_mk'] ?>";
												</script>
											</div>
										</div>

										<div class="modal-footer bg-whitesmoke px-5">
											<button type="submit" class="btn btn-primary" name="edit_data">Simpan Perubahan</button>
											<a href="data-nikah.php" class="btn btn-secondary" data-dismiss="modal">Batal</a>
										</div>
									</form>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php
require('template/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#data-pendaftar').addClass('active');
		$('#input-data-pendaftar').addClass('active');
		$('#input-data-pendaftar').parent('.nav-item').addClass('menu-open');

		window.onload = function() {
			$('.umur').on('change', function() {
				var dob = new Date(this.value);
				var today = new Date();
				var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
				// $('.result').val(age);
				$(this).parents('.find-umur').find('.result').val(age);
			});
		}

		<?php if ($response == 'success_edit') { ?>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Edit Data',
				text: 'Data Nikah berhasil diedit',
				preConfirm: () => {
					window.location.href = 'data-nikah.php';
				}
			});
		<?php } ?>
	});
</script>