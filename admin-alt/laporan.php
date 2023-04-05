<?php
require('template/header.php');

function get_data($bulan)
{
	global $conn;
	$pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE status!='ditinjau'");
	$result = [];
	foreach ($pengajuan as $res) {
		$get_bulan = date('Y-m', strtotime($res['tggl_pengajuan']));
		if ($get_bulan == $bulan) {
			$result[] = $res;
		}
	}

	return $result;
}

$get_data = get_data(date('Y-m'));

if (isset($_GET['bulan'])) {
	$bln = $_GET['bulan'];
	$get_data = get_data($bln);
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
						<li class="breadcrumb-item active">Laporan</li>
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
								<h3>Arsip Data Lapoaran Pengajuan</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="row mb-2">
									<div class="col-3">
										<label for="">Pilih Priode Laporan:</label>
										<input type="month" id="priode" class="form-control" value="<?= date('Y-m') ?>">
									</div>
								</div>
								<table id="dataTablelaporan" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="1">No</th>
											<th>Tggl Pengajuan</th>
											<th>Email</th>
											<th>NIK Suami</th>
											<th>Nama Suami</th>
											<th>NIK Istri</th>
											<th>Nama Istri</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($get_data as $dta) {
											$pendaftar_id = $dta['pendaftar_id'];
											$user_id = $dta['user_id'];
											$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
											$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
											$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$user_id'");
											$dsm = mysqli_fetch_assoc($data_sm);
											$dis = mysqli_fetch_assoc($data_is);
											$usr = mysqli_fetch_assoc($user);
											if (isset($dsm['id']) && isset($dis['id'])) {
										?>
												<tr>
													<td><?= $no ?></td>
													<td><?= date('d/m/Y', strtotime($dta['tggl_pengajuan'])) ?></td>
													<td><?= $usr['email'] ?></td>
													<td><?= $dsm['nik'] ?></td>
													<td><?= $dsm['nama'] ?></td>
													<td><?= $dis['nik'] ?></td>
													<td><?= $dis['nama'] ?></td>
													<td>
														<span class="badge badge-<?= $dta['status'] == 'disetujui' ? 'success' : 'danger' ?>"><?= strtoupper($dta['status']) ?></span>
													</td>
												</tr>
										<?php $no = $no + 1;
											}
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


<?php
require('template/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#laporan').addClass('active');

		$('#priode').change(function(e) {
			e.preventDefault();

			var bulan = $(this).val();
			window.location.href = "laporan.php?bulan=" + bulan;
		});

		<?php if (isset($_GET['bulan'])) {
			$bln = $_GET['bulan']; ?>
			$('#priode').val("<?= $bln ?>");
		<?php } ?>
	});
</script>