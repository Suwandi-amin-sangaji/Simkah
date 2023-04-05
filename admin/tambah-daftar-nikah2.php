<?php
require('template/header.php');

$response = null;
if (isset($_POST['store_data'])) {
	// data pendaftaran
	$no_pendaftarn = $_POST['no_pendaftarn'];
	$desa_id = $_POST['desa_id'];
	$tempat_nikah = $_POST['tempat_nikah'];
	$tggl_akad = $_POST['tggl_akad'];
	$waktu_akad = '00:00';
	$lokasi_nikah = $_POST['lokasi_nikah'];
	$tanggal_daftar = date('Y-m-d');
	mysqli_query($conn, "INSERT INTO tb_pendaftar VALUES(NULL, '$no_pendaftarn', '$desa_id', '$tempat_nikah', '$tggl_akad', '$waktu_akad', '$lokasi_nikah', NULL, NULL, 'new', '$tanggal_daftar')");
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
	$pas_foto_sm = NULL;
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
	$pas_foto_is = NULL;
	mysqli_query($conn, "INSERT INTO tb_data_istri VALUES(NULL, '$pendaftar_id', '$warga_negara_is', '$nik_istri', '$nama_istri', '$tempat_lahir_is', '$tggl_lahir_is', '$umur_istri', '$alamat_istri', '$status_istri', '$agama_istri', '$pekerjaan_istri', '$pas_foto_is')");

	// data wali
	$nik_wali = NULL;
	$no_kk = NULL;
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

	// data pemeriksaan
	$nama_as = $_POST['nama_as'];
	$nama_is = $_POST['nama_is'];
	$nama_ai = $_POST['nama_ai'];
	$nama_ii = $_POST['nama_ii'];
	$jenis_mk = $_POST['jenis_mk'];
	$jumlah_mk = NULL;
	$pembayaran_mk = $_POST['pembayaran_mk'];
	$penghulu_id = $_POST['penghulu_id'];

	$add = mysqli_query($conn, "INSERT INTO tb_pemeriksaan VALUES (NULL, '$pendaftar_id', '', '$nama_as', '', '', '', '', '$nama_is', '', '', '', '', '$nama_ai', '', '', '', '', '$nama_ii', '', '', '','$jenis_mk', '$jumlah_mk', '$pembayaran_mk')");
	$updt = mysqli_query($conn, "UPDATE tb_pendaftar SET penghulu_id='$penghulu_id', status='finish' WHERE id='$pendaftar_id'");

	$response = 'success_store';
}
?>
<link rel="stylesheet" href="dist/css/wizard.css">

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
                        <li class="breadcrumb-item active">Tambah Data Nikah</li>
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
                            <div class="card-header row justify-content-center">
                                <h3 class="col-sm-10">Tambah Data Nikah</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <form action="" method="post" class="f1">
                                            <div class="f1-steps">
                                                <div class="f1-progress">
                                                    <div class="f1-progress-line" data-now-value="20"
                                                        data-number-of-steps="5" style="width: 20%;"></div>
                                                </div>
                                                <div class="f1-step active text-center">
                                                    <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                                    <p>Tempat Nikah</p>
                                                </div>
                                                <div class="f1-step text-center">
                                                    <div class="f1-step-icon"><i class="fa fa-male fa-lg"></i></div>
                                                    <p>Data Suami</p>
                                                </div>
                                                <div class="f1-step text-center">
                                                    <div class="f1-step-icon"><i class="fa fa-female fa-lg"></i></div>
                                                    <p>Data Istri</p>
                                                </div>
                                                <div class="f1-step text-center">
                                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                                    <p>Data Wali</p>
                                                </div>
                                                <div class="f1-step text-center">
                                                    <div class="f1-step-icon"><i class="fa fa-gift"></i></div>
                                                    <p>Mas Kawin</p>
                                                </div>
                                            </div>
                                            <!-- step 1 -->
                                            <fieldset>
                                                <h4>Tempat Nikah</h4>
                                                <div class="form-group">
                                                    <label>Nomor Akta Nikah</label>
                                                    <input class="form-control" id="no_pendaftarn" name="no_pendaftarn"
                                                        type="text" placeholder="Nomor Akta Nikah">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelurahan/Desa</label>
                                                    <select class="form-control" id="desa_id" name="desa_id">
                                                        <option value="">--Pilih Desa/Kelurahan--</option>
                                                        <?php
														$desa = mysqli_query($conn, "SELECT * FROM tb_desa");
														foreach ($desa as $dsa) { ?>
                                                        <option value="<?= $dsa['id'] ?>"><?= $dsa['nama_desa'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nikah di</label>
                                                    <select class="form-control" id="tempat_nikah" name="tempat_nikah">
                                                        <option value="Di KUA">Di KUA</option>
                                                        <option value="Di Luar KUA">Di Luar KUA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akad Nikah</label>
                                                    <input class="form-control" type="date" id="tggl_akad"
                                                        name="tggl_akad">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Lokasi Akad Nikah</label>
                                                    <textarea class="form-control" rows="3"
                                                        placeholder="Alamat Lokasi Akad Nikah"
                                                        name="lokasi_nikah"></textarea>
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-primary btn-next">Selanjutnya
                                                        <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </fieldset>
                                            <!-- step 2 -->
                                            <fieldset>
                                                <h4>Data Suami</h4>
                                                <div class="form-group">
                                                    <label>Warganegara</label>
                                                    <select name="warga_negara_sm"
                                                        class="form-control validate-select required-entry"
                                                        id="warga_negara_sm">
                                                        <option value="0" style="display: none;">Pilih Warganegara
                                                        </option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nik Calon Suami</label>
                                                    <input class="form-control" id="nik_suami" name="nik_suami"
                                                        type="text" placeholder="Nik Calon Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Calon Suami</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Nama Calon Suami" name="nama_suami"
                                                        id="nama_suami">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control" type="text" placeholder="Tempat Lahir"
                                                        id="tempat_lahir_sm" name="tempat_lahir_sm">
                                                </div>
                                                <div class="find-umur">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input class="form-control umur" type="date"
                                                            name="tggl_lahir_sm" id="tggl_lahir_sm">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Umur</label>
                                                        <input type="text" id="umur_suami"
                                                            class="text-primary form-control result" placeholder="Umur"
                                                            name="umur_suami" id="umur_suami">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat"
                                                        name="alamat_suami" id="alamat_suami"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control  validate-select required-entry"
                                                        defaultvalue="" name="status_suami" id="status_suami">
                                                        <option value="" style="display: none;">Pilih Status</option>
                                                        <option value="Beristri">Beristri</option>
                                                        <option value="Jejaka">Jejaka</option>
                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control" id="agama_suami" type="text"
                                                        placeholder="Agama" value="Islam" readonly=""
                                                        name="agama_suami">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input class="form-control" type="text" placeholder="Pekerjaan"
                                                        id="pekerjaan_suami" name="pekerjaan_suami">
                                                </div>

                                                <br>
                                                <h4 class="mt-2">Data Orang Tua Suami</h4>
                                                <div class="form-group">
                                                    <label>Nama Ayah Suami</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Nama Ayah Suami" id="nama_as" name="nama_as">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Ibu Suami</label>
                                                    <input class="form-control" type="text" placeholder="Nama Ibu Suami"
                                                        id="nama_is" name="nama_is">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-warning btn-previous"><i
                                                            class="fa fa-arrow-left"></i> Sebelumnya</button>
                                                    <button type="button" class="btn btn-primary btn-next">Selanjutnya
                                                        <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </fieldset>
                                            <!-- step 3 -->
                                            <fieldset>
                                                <h4>Data Istri</h4>
                                                <div class="form-group">
                                                    <label>Warganegara</label>
                                                    <select name="warga_negara_is"
                                                        class="form-control validate-select required-entry"
                                                        id="warga_negara_is">
                                                        <option value="0" style="display: none;">Pilih Warganegara
                                                        </option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nik Calon Istri</label>
                                                    <input class="form-control" id="nik_istri" name="nik_istri"
                                                        type="text" placeholder="Nik Calon Istri">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Calon Istri</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Nama Calon Istri" name="nama_istri"
                                                        id="nama_istri">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control" type="text" placeholder="Tempat Lahir"
                                                        id="tempat_lahir_is" name="tempat_lahir_is">
                                                </div>
                                                <div class="find-umur">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input class="form-control umur" type="date"
                                                            name="tggl_lahir_is" id="tggl_lahir_is">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Umur</label>
                                                        <input type="text" id="umur_istri"
                                                            class="text-primary form-control result" placeholder="Umur"
                                                            name="umur_istri" id="umur_istri">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat"
                                                        name="alamat_istri" id="alamat_istri"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control  validate-select required-entry"
                                                        defaultvalue="" name="status_istri" id="status_istri">
                                                        <option value="" style="display: none;">Pilih Status</option>
                                                        <option value="Perawan">Perawan</option>
                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control" id="agama_istri" type="text"
                                                        placeholder="Agama" value="Islam" readonly=""
                                                        name="agama_istri">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input class="form-control" type="text" placeholder="Pekerjaan"
                                                        id="pekerjaan_istri" name="pekerjaan_istri">
                                                </div>

                                                <br>
                                                <h4 class="mt-2">Data Orang Tua Istri</h4>
                                                <div class="form-group">
                                                    <label>Nama Ayah Istri</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Nama Ayah Istri" id="nama_ai" name="nama_ai">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Ibu Istri</label>
                                                    <input class="form-control" type="text" placeholder="Nama Ibu Istri"
                                                        id="nama_ii" name="nama_ii">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-warning btn-previous"><i
                                                            class="fa fa-arrow-left"></i> Sebelumnya</button>
                                                    <button type="button" class="btn btn-primary btn-next">Selanjutnya
                                                        <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </fieldset>
                                            <!-- step 4 -->
                                            <fieldset>
                                                <h4>Data Wali</h4>
                                                <!-- <div class="form-group">
													<label>Nik Wali</label>
													<input class="form-control" type="text" placeholder="Nik Wali" name="nik_wali" id="nik_wali">
												</div>

												<div class="form-group">
													<label>Nomor Kartu Keluarga</label>
													<input class="form-control" type="text" placeholder="Nomor Kartu Keluarga" name="no_kk" id="no_kk">
												</div> -->
                                                <div class="form-group">
                                                    <label>Nama Wali</label>
                                                    <input class="form-control" type="text" placeholder="Nama Wali"
                                                        name="nama_wali" id="nama_wali">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Wali</label>
                                                    <select name="status_wali"
                                                        class="form-control validate-select required-entry"
                                                        id="status_wali">
                                                        <option value="" style="display: none;">Pilih Satatus</option>
                                                        <option value="Nasab">Nasab</option>
                                                        <option value="Hakim">Hakim</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control" id="agama_wali" type="text"
                                                        placeholder="Agama" name="agama_wali" readonly="" value="Islam">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hubungan Wali</label>
                                                    <input class="form-control" type="text" placeholder="Hubungan Wali"
                                                        name="hubungan_wali" id="hubungan_wali">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control" type="text" placeholder="Tempat Lahir"
                                                        id="tempat_lahir_wl" name="tempat_lahir_wl">
                                                </div>
                                                <div class="find-umur">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input class="form-control umur" type="date"
                                                            name="tggl_lahir_wl" id="tggl_lahir_wl">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Umur</label>
                                                        <input type="text" id="umur_wali"
                                                            class="text-primary form-control result" name="umur_wali"
                                                            placeholder="Umur">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat"
                                                        name="alamat_wali" id="alamat_wali"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <input class="form-control" type="number"
                                                        placeholder="Nomor Telepon" id="no_telepon" name="no_telepon">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" id="pekerjaan_wali" class="form-control"
                                                        name="pekerjaan_wali" placeholder="Pekerjaan">
                                                </div>
                                                <div class="form-group">
                                                    <label>Bin</label>
                                                    <input class="form-control" type="text" placeholder="Bin" name="bin"
                                                        id="bin">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-warning btn-previous"><i
                                                            class="fa fa-arrow-left"></i> Sebelumnya</button>
                                                    <button type="button" class="btn btn-primary btn-next">Selanjutnya
                                                        <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </fieldset>
                                            <!-- step 5 -->
                                            <fieldset>
                                                <h4>Penghulu & Mas Kawin</h4>
                                                <div class="form-group">
                                                    <label>Penghulu</label>
                                                    <select class="form-control" name="penghulu_id" required>
                                                        <option value="">--Penghulu--</option>
                                                        <?php
														$penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu");
														foreach ($penghulu as $pngh) { ?>
                                                        <option value="<?= $pngh['id'] ?>"><?= $pngh['nama'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Mas Kawin</label>
                                                    <input type="text" class="form-control" name="jenis_mk" required
                                                        autocomplete="off" placeholder="Jenis Mas Kawin" value="">
                                                </div>
                                                <!-- <div class="form-group">
													<label>Jumlah Mas Kawin</label>
													<input type="text" class="form-control" name="jumlah_mk" required autocomplete="off" placeholder="Jumlah Mas Kawin" value="">
												</div> -->
                                                <div class="form-group">
                                                    <label>Pembayaran</label>
                                                    <select class="form-control" name="pembayaran_mk" required>
                                                        <option value="Tunai">Tunai</option>
                                                        <option value="Cicil">Cicil</option>
                                                    </select>
                                                </div>
                                                <div class="f1-buttons">
                                                    <button type="button" class="btn btn-warning btn-previous"><i
                                                            class="fa fa-arrow-left"></i> Sebelumnya</button>
                                                    <button type="submit" class="btn btn-primary btn-submit"
                                                        name="store_data"><i class="fa fa-save"></i> Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
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
<script src="dist/js/wizard.js"></script>
<script>
$(document).ready(function() {
    $('#tambah-data-nikah').addClass('active');
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

    $('#pas_foto_sm').change(function(e) {
        var pas_foto_sm = $(this).prop('files')[0];
        var check = 0;

        var ext = ['image/jpeg', 'image/png', 'image/bmp'];

        $.each(ext, function(key, val) {
            if (pas_foto_sm.type == val) check = check + 1;
        });

        if (check == 1) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.thumn-sm').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert('Format file tidak dibolehkan, pilih file lain');
            $(this).val('');
            return;
        }
    });

    $('#pas_foto_is').change(function(e) {
        var pas_foto_is = $(this).prop('files')[0];
        var check = 0;

        var ext = ['image/jpeg', 'image/png', 'image/bmp'];

        $.each(ext, function(key, val) {
            if (pas_foto_is.type == val) check = check + 1;
        });

        if (check == 1) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.thumn-is').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert('Format file tidak dibolehkan, pilih file lain');
            $(this).val('');
            return;
        }
    });

    <?php if ($response == 'success_store') { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Tambah Data',
        text: 'Data baru berhasil ditambahkan',
        preConfirm: () => {
            window.location.href = window.location.href;
        }
    });
    <?php } ?>
});
</script>