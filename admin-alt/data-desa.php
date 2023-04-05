<?php  
require('template/header.php');
$response = null;
// Tambah Data
if (isset($_POST['tambah_data'])) {
	$nama_desa = $_POST['nama_desa'];
	$res = mysqli_query($conn, "INSERT INTO tb_desa VALUES(NULL, '$nama_desa')");
	if ($res) $response = 'success_add';
	else $response = 'error';
}

// Update Data
if (isset($_POST['edit_data'])) {
	$id = $_POST['id'];
	$nama_desa = $_POST['nama_desa'];
	$res = mysqli_query($conn, "UPDATE tb_desa SET nama_desa='$nama_desa' WHERE id='$id'");
	if ($res) $response = 'success_edit';
	else $response = 'error';
}

// Hapus Data
if (isset($_GET['hapus_data'])) {
	$id = $_GET['id'];
	$res = mysqli_query($conn, "DELETE FROM tb_desa WHERE id='$id'");
	if ($res) $response = 'success_delete';
	else $response = 'error';
}

$desa = mysqli_query($conn, "SELECT * FROM tb_desa");
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
						<li class="breadcrumb-item active">Data Kelurahan/Desa</li>
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
								<h3>Data Kelurahan/Desa</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>
								<table id="dataTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="2">No</th>
											<th>Nama Desa</th>
											<th width="200">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($desa as $dta) { ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $dta['nama_desa'] ?></td>
												<td class="text-center">
													<a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?= $dta['id'] ?>"><i class="fa fa-edit"></i> Edit</a>
													<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $dta['id'] ?>"><i class="fa fa-trash"></i> Hapus</a>
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

<!-- MODAL TAMBAH -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data Kelurahan/Desa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST">
				<div class="modal-body px-5" style="margin-bottom: -20px;">
					<div class="form-group">
						<label>Nama Desa</label>
						<input type="text" class="form-control" name="nama_desa" required autocomplete="off" placeholder="Nama Desa">
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="submit" class="btn btn-primary" name="tambah_data">Tambah</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ($desa as $dta) { ?>
	<!-- MODAL EDIT -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit<?= $dta['id'] ?>">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data Kelurahan/Desa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST">
					<div class="modal-body px-5" style="margin-bottom: -20px;">
						<div class="form-group">
							<label>Nama Desa</label>
							<input type="text" class="form-control" name="nama_desa" required autocomplete="off" placeholder="Nama Desa" value="<?= $dta['nama_desa'] ?>">
						</div>
					</div>
					<div class="modal-footer bg-whitesmoke br">
						<input type="hidden" name="id" value="<?= $dta['id'] ?>">
						<button type="submit" class="btn btn-primary" name="edit_data">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL HAPUS -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus<?= $dta['id'] ?>">
		<div class="modal-dialog modal-sm" role="document">
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
						<a href="?hapus_data=true&id=<?= $dta['id'] ?>" role="button" class="btn btn-danger" name="edit_data">Hapus</a>
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
		$('#data-desa').addClass('active');
		$('#master-data').addClass('active');
		$('#master-data').parent('.nav-item').addClass('menu-open');
		<?php if ($response == 'success_add') { ?>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Tambah Data',
				text: 'Data baru berhasil ditambahkan',
				preConfirm: () => {
					window.location.href=window.location.href;
				}
			});
		<?php } else if ($response == 'success_edit') { ?>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Mengupdate Data',
				text: 'Data telah berhasil di update',
				preConfirm: () => {
					window.location.href=window.location.href;
				}
			});
		<?php } else if ($response == 'success_delete') { ?>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil Menghapus Data',
				text: 'Data telah berhasil di hapus',
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
					window.location.href=window.location.href;
				}
			});
		<?php } ?>
	});
</script>