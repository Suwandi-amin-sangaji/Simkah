<?php  
require('template/header.php');
$response = null;
// Tambah Data
if (isset($_POST['tambah_data'])) {
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$alamat = $_POST['alamat'];
	$jabatan = $_POST['jabatan'];
	$no_telepon = $_POST['no_telepon'];
	$status = $_POST['status'];
	$res = mysqli_query($conn, "INSERT INTO tb_penghulu VALUES(NULL, '$nama', '$nip', '$alamat', '$jabatan', '$no_telepon', '$status')");
	if ($res) $response = 'success_add';
	else $response = 'error';
}

// Update Data
if (isset($_POST['edit_data'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$alamat = $_POST['alamat'];
	$jabatan = $_POST['jabatan'];
	$no_telepon = $_POST['no_telepon'];
	$status = $_POST['status'];
	$res = mysqli_query($conn, "UPDATE tb_penghulu SET nama='$nama', nip='$nip', alamat='$alamat', jabatan='$jabatan', no_telepon='$no_telepon', status='$status' WHERE id='$id'");
	if ($res) $response = 'success_edit';
	else $response = 'error';
}

// Hapus Data
if (isset($_GET['hapus_data'])) {
	$id = $_GET['id'];
	$res = mysqli_query($conn, "DELETE FROM tb_penghulu WHERE id='$id'");
	if ($res) $response = 'success_delete';
	else $response = 'error';
}

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
						<li class="breadcrumb-item active">Master Data</li>
						<li class="breadcrumb-item active">Data Penghulu</li>
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
								<h3>Data Penghulu</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>
								<table id="dataTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="1">No</th>
											<th>Nama Penghulu</th>
											<th>NIP</th>
											<th>Alamat</th>
											<th>Jabatan</th>
											<th>No Telepon</th>
											<th>Status</th>
											<th width="150">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($penghulu as $dta) { ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $dta['nama'] ?></td>
												<td><?= $dta['nip'] ?></td>
												<td><?= $dta['alamat'] ?></td>
												<td><?= $dta['jabatan'] ?></td>
												<td><?= $dta['no_telepon'] ?></td>
												<td><?= $dta['status'] ?></td>
												<td class="text-center">
													<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit<?= $dta['id'] ?>"><i class="fa fa-edit"></i> Edit</a>
													<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $dta['id'] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
				<h5 class="modal-title">Tambah Data Penghulu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST">
				<div class="modal-body px-5" style="margin-bottom: -20px;">
					<div class="form-group">
						<label>Nama Penghulu</label>
						<input type="text" class="form-control" name="nama" required autocomplete="off" placeholder="Nama Penghulu">
					</div>
					<div class="form-group">
						<label>NIP</label>
						<input type="number" class="form-control" name="nip" required autocomplete="off" placeholder="NIP">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" required autocomplete="off" placeholder="Alamat" rows="2"></textarea>
					</div>
					<div class="form-group">
						<label>Jabatan</label>
						<select class="form-control" name="jabatan" required >
							<option value="">--Pilih Jabatan--</option>
							<option value="Penghulu Muda">Penghulu Muda</option>
							<option value="Penghulu Madya">Penghulu Madya</option>
							<option value="Penghulu Utama">Penghulu Utama</option>
							<option value="Penghulu Pertama">Penghulu Pertama</option>
						</select>
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" class="form-control" name="no_telepon" required autocomplete="off" placeholder="No Telepon">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" required >
							<option value="">--Pilih Status--</option>
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
						</select>
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

<?php foreach ($penghulu as $dta) { ?>
	<!-- MODAL EDIT -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit<?= $dta['id'] ?>">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data Penghulu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST">
					<div class="modal-body px-5" style="margin-bottom: -20px;">
						<div class="form-group">
							<label>Nama Penghulu</label>
							<input type="text" class="form-control" name="nama" required autocomplete="off" placeholder="Nama Penghulu" value="<?= $dta['nama'] ?>">
						</div>
						<div class="form-group">
							<label>NIP</label>
							<input type="number" class="form-control" name="nip" required autocomplete="off" placeholder="NIP" value="<?= $dta['nip'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" required autocomplete="off" placeholder="Alamat" rows="2"><?= $dta['alamat'] ?></textarea>
						</div>
						<div class="form-group">
							<label>Jabatan</label>
							<select class="form-control" name="jabatan" required >
								<option value="">--Pilih Jabatan--</option>
								<?php  $jabatan = ['Penghulu Muda', 'Penghulu Madya', 'Penghulu Utama', 'Penghulu Pertama'];
								foreach ($jabatan as $jbt) { ?>
									<option value="<?= $jbt ?>" <?php if ($jbt == $dta['jabatan']) echo "selected"?>><?= $jbt ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="number" class="form-control" name="no_telepon" required autocomplete="off" placeholder="No Telepon" value="<?= $dta['no_telepon'] ?>">
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status" required >
								<option value="">--Pilih Status--</option>
								<?php  $status = ['Aktif', 'Tidak Aktif'];
								foreach ($status as $sts) { ?>
									<option value="<?= $sts ?>" <?php if ($sts == $dta['status']) echo "selected"?>><?= $sts ?></option>
								<?php } ?>
							</select>
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
		$('#data-penghulu').addClass('active');
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