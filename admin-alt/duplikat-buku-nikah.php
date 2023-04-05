<?php
require('template/header.php');

$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar");
$penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu");
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
						<li class="breadcrumb-item active">Duplikat Buku Nikah</li>
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
								<h3>Duplikat Buku Nikah</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="dataTable" class="table table-bordered table-striped" style="font-size: 13px;">
									<thead>
										<tr>
											<th width="1">No</th>
											<th>NIK Suami</th>
											<th>Nama Suami</th>
											<th>NIK Istri</th>
											<th>Nama Istri</th>
											<th>Tggl Nikah</th>
											<th>Tempat Nikah</th>
											<th>Lokasi Nikah</th>
											<th width="60">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($pendaftar as $dta) {
											$pendaftar_id = $dta['id'];
											$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
											$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
											$dsm = mysqli_fetch_assoc($data_sm);
											$dis = mysqli_fetch_assoc($data_is);
										?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $dsm['nik'] ?></td>
												<td><?= $dsm['nama'] ?></td>
												<td><?= $dis['nik'] ?></td>
												<td><?= $dis['nama'] ?></td>
												<td><?= date('d/m/Y', strtotime($dta['tggl_akad'])) . ' ' . $dta['waktu_akad'] ?></td>
												<td><?= $dta['tempat_nikah'] ?></td>
												<td><?= $dta['lokasi_nikah'] ?></td>
												<td class="text-center">
													<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-detail<?= $dta['id'] ?>" data-toggle1="tooltip" data-original-title="Detail Pendaftar"><i class="fa fa-list"></i></a>
													<a href="#" class="btn btn-sm btn-secondary print-surat" data-id="<?= $dta['id'] ?>" data-toggle1="tooltip" data-original-title="Cetak Duplikat Buku Nikah"><i class="fa fa-print"></i></a>
												</td>
											</tr>
										<?php $no = $no + 1;
										} ?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php foreach ($pendaftar as $dta) {
	$pendaftar_id = $dta['id'];
	$desa_id = $dta['desa_id'];

	$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
	$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
	$data_wl = mysqli_query($conn, "SELECT * FROM tb_data_wali WHERE pendaftar_id='$pendaftar_id'");
	$periksa = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE pendaftar_id='$pendaftar_id'");
	$data_desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
	$dsm = mysqli_fetch_assoc($data_sm);
	$dis = mysqli_fetch_assoc($data_is);
	$dwl = mysqli_fetch_assoc($data_wl);
	$pmr = mysqli_fetch_assoc($periksa);
	$des = mysqli_fetch_assoc($data_desa);
?>
	<!-- MODAL DETAIL -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-detail<?= $dta['id'] ?>">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Data Pendaftar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-5">
					<!-- Data Pendaftar -->
					<h6><b><u>Data Pendaftaran</u></b></h6>
					<!-- <div class="row">
						<b class="col-sm-4">Nomor Pendaftaran</b>
						<span class="col-sm-8">: <?= $dta['no_pendaftarn'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Pendaftaran</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dta['tanggal_daftar'])) ?></span>
					</div> -->
					<div class="row">
						<b class="col-sm-4">Kelurahan/Desa</b>
						<span class="col-sm-8">: <?= $des['nama_desa'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tempat Nikah</b>
						<span class="col-sm-8">: <?= $dta['tempat_nikah'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Nikah</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dta['tggl_akad'])) . ' ' . $dta['waktu_akad'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Lokasi Nikah</b>
						<span class="col-sm-8">: <?= $dta['lokasi_nikah'] ?></span>
					</div>
					<hr>
					<!-- Data Calon Suami -->
					<h6 class="mt-4"><b><u>Data Calon Suami:</u></b></h6>
					<div class="row">
						<b class="col-sm-4">Warga Negara</b>
						<span class="col-sm-8">: <?= $dsm['warga_negara'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">NIK</b>
						<span class="col-sm-8">: <?= $dsm['nik'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama</b>
						<span class="col-sm-8">: <?= $dsm['nama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tempat Lahir</b>
						<span class="col-sm-8">: <?= $dsm['tempat_lahir'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Lahir</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dsm['tggl_lahir'])) ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Umur</b>
						<span class="col-sm-8">: <?= $dsm['umur'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Alamat</b>
						<span class="col-sm-8">: <?= $dsm['alamat'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Status</b>
						<span class="col-sm-8">: <?= $dsm['status'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Agama</b>
						<span class="col-sm-8">: <?= $dsm['agama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Pekerjaan</b>
						<span class="col-sm-8">: <?= $dsm['pekerjaan'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama Ayah</b>
						<span class="col-sm-8">: <?= $pmr['nama_as'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama Ibu</b>
						<span class="col-sm-8">: <?= $pmr['nama_is'] ?></span>
					</div>
					<!-- <div class="row">
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/suami/<?= $dsm['pas_foto'] ?>" height="100">
						</div>
					</div> -->
					<hr>
					<!-- Data Calon Istri -->
					<h6 class="mt-4"><b><u>Data Calon Istri:</u></b></h6>
					<div class="row">
						<b class="col-sm-4">Warga Negara</b>
						<span class="col-sm-8">: <?= $dis['warga_negara'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">NIK</b>
						<span class="col-sm-8">: <?= $dis['nik'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama</b>
						<span class="col-sm-8">: <?= $dis['nama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tempat Lahir</b>
						<span class="col-sm-8">: <?= $dis['tempat_lahir'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Lahir</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dis['tggl_lahir'])) ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Umur</b>
						<span class="col-sm-8">: <?= $dis['umur'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Alamat</b>
						<span class="col-sm-8">: <?= $dis['alamat'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Status</b>
						<span class="col-sm-8">: <?= $dis['status'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Agama</b>
						<span class="col-sm-8">: <?= $dis['agama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Pekerjaan</b>
						<span class="col-sm-8">: <?= $dis['pekerjaan'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama Ayah</b>
						<span class="col-sm-8">: <?= $pmr['nama_ai'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Nama Ibu</b>
						<span class="col-sm-8">: <?= $pmr['nama_ii'] ?></span>
					</div>
					<!-- <div class="row">
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/istri/<?= $dis['pas_foto'] ?>" height="100">
						</div>
					</div> -->
					<hr>
					<!-- Data Wali -->
					<h6 class="mt-4"><b><u>Data Wali:</u></b></h6>
					<!-- <div class="row">
						<b class="col-sm-4">NIK</b>
						<span class="col-sm-8">: <?= $dwl['nik'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">No KK</b>
						<span class="col-sm-8">: <?= $dwl['no_kk'] ?></span>
					</div> -->
					<div class="row">
						<b class="col-sm-4">Nama</b>
						<span class="col-sm-8">: <?= $dwl['nama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Status</b>
						<span class="col-sm-8">: <?= $dwl['status'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Agama</b>
						<span class="col-sm-8">: <?= $dwl['agama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Hubungan</b>
						<span class="col-sm-8">: <?= $dwl['hubungan'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tempat Lahir</b>
						<span class="col-sm-8">: <?= $dwl['tempat_lahir'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Lahir</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dwl['tggl_lahir'])) ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Umur</b>
						<span class="col-sm-8">: <?= $dwl['umur'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Alamat</b>
						<span class="col-sm-8">: <?= $dwl['alamat'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">No Telepon</b>
						<span class="col-sm-8">: <?= $dwl['no_telepon'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Pekerjaan</b>
						<span class="col-sm-8">: <?= $dwl['pekerjaan'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">BIN</b>
						<span class="col-sm-8">: <?= $dwl['bin'] ?></span>
					</div>
					<hr>
					<!-- Penghulu & Data Mas Kawim Penghulu -->
					<h6 class="mt-4"><b><u>Penghulu & Data Mas Kawim:</u></b></h6>
					<div class="row">
						<b class="col-sm-4">Nama Penghulu</b>
						<?php
						$penghulu_id = $dta['penghulu_id'];
						$penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu WHERE id='$penghulu_id'");
						$phl = mysqli_fetch_assoc($penghulu);
						?>
						<span class="col-sm-8">: <?= $phl['nama'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Jenis Mas Kawin</b>
						<span class="col-sm-8">: <?= $pmr['jenis_mk'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Jumlah Mas Kawin</b>
						<span class="col-sm-8">: <?= $pmr['jumlah_mk'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Pembayaran</b>
						<span class="col-sm-8">: <?= $pmr['pembayaran_mk'] ?></span>
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	<!-- PRINT SURAT -->
	<div id="print-surat<?= $dta['id'] ?>" class="p-5" style="font-size: 14px; border: 1px solid;" hidden="">
		<div class="">
			<h3 class="text-center"><b><u>DUPLIKAT KUTIPAN AKTA NIKAH</u><br>NOMOR : B-57/Kua.<?= date('d.m.Y') ?>/DN/XI/<?= date('Y') ?></b></h3><br>
		</div>
		<div class="row">
			<div style="width: 55%;">
				<div class=""><b>I. Akta nikah nomor</b></div>
				<div class="">Pada hari, tanggal, bulan, tahun</div>
			</div>
			<div style="width: 45%;">
				<div class="">: <?= $dta['no_pendaftarn'] ?></div>
				<div class="">: <?= date('d m Y', strtotime($dta['tggl_akad'])) ?></div>
				<br>
			</div>
		</div>
		<dl>
			<dt>
				<h4><b>SUAMI</b></h4>
			</dt>
			<div class="row">
				<ol style="width: 50%;">
					<li>Nama lengkap dan alias</li>
					<li>Tempat dan tanggal lahir</li>
					<li>Warga Negara</li>
					<li>Agama</li>
					<li>Pekerjaan</li>
					<li>Tempat tinggal</li>
					<li>Status sebelum Menikah</li>
					<div class="row">
						<li class="col-sm-5 ml-2 p-0" style="width: 45%;">Orang tua kandung</li>
						<span class="col-sm-5 text-right" style="width: 45%;">Ayah</span>
						<span class="text-right" style="width: 90%;">Ibu</span>
					</div>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: <?= $dsm['nama'] ?></li>
					<li>: <?= $dsm['tempat_lahir'] . ', ' . date('d F Y', strtotime($dis['tggl_lahir'])) ?></li>
					<li>: <?= $dsm['warga_negara'] ?></li>
					<li>: <?= $dsm['agama'] ?></li>
					<li>: <?= $dsm['pekerjaan'] ?></li>
					<li>: <?= $dsm['alamat'] ?></li>
					<li>: <?= $dsm['status'] ?></li>
					<li>: <?= $pmr['nama_as'] ?></li>
					<li>: <?= $pmr['nama_is'] ?></li>
				</ul>
			</div>
		</dl>
		<dl>
			<dt>
				<h4><b>ISTRI</b></h4>
			</dt>
			<div class="row">
				<ol style="width: 50%;">
					<li>Nama lengkap dan alias</li>
					<li>Tempat dan tanggal lahir</li>
					<li>Warga Negara</li>
					<li>Agama</li>
					<li>Pekerjaan</li>
					<li>Tempat tinggal</li>
					<li>Status sebelum Menikah</li>
					<div class="row">
						<li class="col-sm-5 ml-2 p-0" style="width: 45%;">Orang tua kandung</li>
						<span class="col-sm-5 text-right" style="width: 45%;">Ayah</span>
						<span class="text-right" style="width: 90%;">Ibu</span>
					</div>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: <?= $dis['nama'] ?></li>
					<li>: <?= $dis['tempat_lahir'] . ', ' . date('d F Y', strtotime($dis['tggl_lahir'])) ?></li>
					<li>: <?= $dis['warga_negara'] ?></li>
					<li>: <?= $dis['agama'] ?></li>
					<li>: <?= $dis['pekerjaan'] ?></li>
					<li>: <?= $dis['alamat'] ?></li>
					<li>: <?= $dis['status'] ?></li>
					<li>: <?= $pmr['nama_ai'] ?></li>
					<li>: <?= $pmr['nama_ii'] ?></li>
				</ul>
			</div>
		</dl>
		<dl>
			<dt>
				<h4><b>WALI NIKAH</b></h4>
			</dt>
			<div class="row">
				<ol style="width: 50%;">
					<li>Status wali (nasab/hakim)</li>
					<li>Hubungan wali/sebab</li>
					<li>Nama lengkap dan alias</li>
					<li>Bin</li>
					<li>Tempat dan tanggal lahir</li>
					<li>Agama</li>
					<li>Pekerjaan</li>
					<li>Alamat tempat tinggal</li>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: <?= $dwl['status'] ?></li>
					<li>: <?= $dwl['hubungan'] ?></li>
					<li>: <?= $dwl['nama'] ?></li>
					<li>: <?= $dwl['bin'] ?></li>
					<li>: <?= $dwl['tempat_lahir'] . ', ' . date('d F Y', strtotime($dwl['tggl_lahir'])) ?></li>
					<li>: <?= $dwl['agama'] ?></li>
					<li>: <?= $dwl['pekerjaan'] ?></li>
					<li>: <?= $dwl['alamat'] ?></li>
				</ul>
			</div>
		</dl>
		<dl>
			<dt>
				<h4><b>MAS KAWIN</b></h4>
			</dt>
			<div class="row">
				<ol style="width: 50%;">
					<li>Berupa apa dan berapa</li>
					<li>Pembayaran (Tunai/Hutang)</li>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: <?= $pmr['jenis_mk'] ?></li>
					<!-- <li>: <?= $pmr['jenis_mk'] . ' (' . $pmr['jumlah_mk'] . ')' ?></li> -->
					<li>: <?= $pmr['pembayaran_mk'] ?></li>
				</ul>
			</div>
		</dl>
		<dl>
			<dt><b>II. Perjanjian Perkawinan</b></dt>
			<div class="row">
				<ol style="width: 50%;" type="none">
					<li>Jika ada perjanjian sebutkan/li>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: -</li>
				</ul>
			</div>
		</dl>
		<dl>
			<dt><b>III. Jika perjanjian nikah berdasarkan putusan pengadilan, sebutkan</b></dt>
			<div class="row">
				<ol style="width: 50%;">
					<li>Pengadilan yang memutuskan</li>
					<li>Nomor dan tanggal putusan</li>
				</ol>
				<ul style="width: 50%;" type="none">
					<li>: -</li>
					<li>: -</li>
				</ul>
			</div>
		</dl>

		<div class="text-center" style="width: 50%; text-align: left; float: right;">Makassar, <?= date('d M Y') ?></div><br>
		<div class="text-center" style="width: 50%; text-align: left; float: right;">Sebagai Duplikat sesuai dengan akta nikahnya</div><br>
		<div class="text-center" style="width: 50%; text-align: left; float: right;">Pegawai Pencatatan Nikah Kecamatan Tallo</div><br><br><br><br><br>
		<div class="text-center" style="width: 50%; text-align: left; float: right;"><u>SIRAJUDDIN, S.Ag., MA</u><br>NIP.19720421 200501 1 003</div>

	</div>
<?php }
require('template/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#duplikat-buku-nikah').addClass('active');

		$(document).on('click', '.print-surat', function(e) {
			e.preventDefault();
			var id = $(this).attr('data-id');
			$('#print-surat' + id).printArea();
		});
	});
</script>