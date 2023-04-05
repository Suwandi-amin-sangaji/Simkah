<?php  
require('template/header.php');
$response = null;
// Update Status
if (isset($_GET['delete'])) {
	$id = $_GET['id'];

	$del1 = mysqli_query($conn, "DELETE FROM tb_pendaftar WHERE id='$id'");
	$del2 = mysqli_query($conn, "DELETE FROM tb_data_istri WHERE pendaftar_id='$id'");
	$del3 = mysqli_query($conn, "DELETE FROM tb_data_suami WHERE pendaftar_id='$id'");
	$del4 = mysqli_query($conn, "DELETE FROM tb_data_wali WHERE pendaftar_id='$id'");
	$del5 = mysqli_query($conn, "DELETE FROM tb_pemeriksaan WHERE pendaftar_id='$id'");
	if ($del1 && $del2 && $del3 && $del4 && $del5) $response = 'success_delete';
	else $response = 'error';
}

$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar ORDER BY id DESC");
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
						<li class="breadcrumb-item active">Master Data</li>
						<li class="breadcrumb-item active">Arsip Data Pendaftar</li>
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
								<h3>Arsip Data Pendaftar</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="dataTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="1">No</th>
											<th width="120">No Pendaftarn</th>
											<th>Tggl Pendaftaran</th>
											<th>Nama Suami</th>
											<th>Nama Istri</th>
											<th>Tggl Akad</th>
											<th>Status</th>
											<th width="120">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($pendaftar as $dta) { 
											$pendaftar_id = $dta['id'];
											$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
											$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
											$dsm = mysqli_fetch_assoc($data_sm);
											$dis = mysqli_fetch_assoc($data_is);

											if ($dta['status'] == 'new') {
												$status = 'Baru';
												$warna = 'info';
											} else if ($dta['status'] == 'acc') {
												$status = 'Proses';
												$warna = 'primary';
											} else if ($dta['status'] == 'finish') {
												$status = 'Selesai';
												$warna = 'success';
											} else if ($dta['status'] == 'refuse') {
												$status = 'Ditolak';
												$warna = 'danger';
											}
											?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $dta['no_pendaftarn'] ?></td>
												<td><?= date('d/m/Y', strtotime($dta['tanggal_daftar'])) ?></td>
												<td><?= $dsm['nama'] ?></td>
												<td><?= $dis['nama'] ?></td>
												<td><?= date('d/m/Y', strtotime($dta['tggl_akad'])).' '.$dta['waktu_akad'] ?></td>
												<td>
													<span class="badge badge-pill badge-<?= $warna ?>"><?= $status ?></span>
												</td>
												<td class="text-center">
													<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-detail<?= $dta['id'] ?>" data-toggle1="tooltip" data-original-title="Detail Pendaftar"><i class="fa fa-list"></i></a>
													<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $dta['id'] ?>" data-toggle1="tooltip" data-original-title="Hapus Data"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
											<?php $no=$no+1; 
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
	$data_desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
	$dsm = mysqli_fetch_assoc($data_sm);
	$dis = mysqli_fetch_assoc($data_is);
	$dwl = mysqli_fetch_assoc($data_wl);
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
					<div class="row">
						<b class="col-sm-4">Nomor Pendaftaran</b>
						<span class="col-sm-8">: <?= $dta['no_pendaftarn'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Pendaftaran</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dta['tanggal_daftar'])) ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Kelurahan/Desa</b>
						<span class="col-sm-8">: <?= $des['nama_desa'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tempat Nikah</b>
						<span class="col-sm-8">: <?= $dta['tempat_nikah'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Akad</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dta['tggl_akad'])).' '.$dta['waktu_akad'] ?></span>
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
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/suami/<?= $dsm['pas_foto'] ?>" height="100">
						</div>
					</div>
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
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/istri/<?= $dis['pas_foto'] ?>" height="100">
						</div>
					</div>
					<hr>
					<!-- Data Wali -->
					<h6 class="mt-4"><b><u>Data Wali:</u></b></h6>
					<div class="row">
						<b class="col-sm-4">NIK</b>
						<span class="col-sm-8">: <?= $dwl['nik'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">No KK</b>
						<span class="col-sm-8">: <?= $dwl['no_kk'] ?></span>
					</div>
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
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL HAPUS -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus<?= $dta['id'] ?>">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Data?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST">
					<div class="modal-body">
						Yakin ingin menghapus data ini?
					</div>
					<div class="modal-footer bg-whitesmoke br">
						<a href="?delete=true&id=<?= $dta['id'] ?>" role="button" class="btn btn-danger">Hapus</a>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>

<?php  
require('template/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#arsip-pendaftaran').addClass('active');
		$('#master-data').addClass('active');
		$('#master-data').parent('.nav-item').addClass('menu-open');
		<?php if ($response == 'success_delete') { ?>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Dihapus',
				text: 'Data telah berhasil dihapus',
				preConfirm: () => {
					window.location.href=window.location.href.split('?')[0];
				}
			});
		<?php } else if ($response == 'error') { ?>
			Swal.fire({
				icon: 'error',
				title: 'Terjadi Kesalahan',
				text: 'Terjadi kesalahan. Gagal memproses data',
				preConfirm: () => {
					window.location.href=window.location.href.split('?')[0];
				}
			});
		<?php } ?>
	});
</script>