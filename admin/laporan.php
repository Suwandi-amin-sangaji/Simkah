<?php
require('template/header.php');

$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar ORDER BY id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

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
                                <h3>Arsip Data Lapoaran Pendaftar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTablelaporan" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1">No</th>
                                            <th width="120">No Pendaftarn</th>
                                            <th>Tggl Pendaftaran</th>
                                            <th>Nama Suami</th>
                                            <th>Nama Istri</th>
                                            <th>Nama Wali</th>
                                            <th>Tggl Akad</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
										foreach ($pendaftar as $dta) {
											$pendaftar_id = $dta['id'];
											$data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
											$data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
											$data_wl = mysqli_query($conn, "SELECT * FROM tb_data_wali WHERE pendaftar_id='$pendaftar_id'");
											$dsm = mysqli_fetch_assoc($data_sm);
											$dis = mysqli_fetch_assoc($data_is);
											$dwl = mysqli_fetch_assoc($data_wl);

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
                                            <td><?= $dwl['nama'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($dta['tggl_akad'])) . ' ' . $dta['waktu_akad'] ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-<?= $warna ?>"><?= $status ?></span>
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


<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('#laporan').addClass('active');
});
</script>