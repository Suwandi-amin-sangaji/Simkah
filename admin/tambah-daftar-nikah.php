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
                        <li class="breadcrumb-item active">Input & Data Pendaftar</li>
                        <li class="breadcrumb-item active">Tambah Daftar Nikah</li>
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
                                <h3>Tambah Daftar Nikah</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i
                                        class="fa fa-plus"></i> Tambah Data</button>
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1">No</th>
                                            <th width="120">No Pendaftarn</th>
                                            <th>Tggl Pendaftaran</th>
                                            <th>Nama Suami</th>
                                            <th>Nama Istri</th>
                                            <th>Tggl Akad</th>
                                            <th width="120">Aksi</th>
                                        </tr>
                                    </thead>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Daftar Nikah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">

                <!-- Suami -->
                <div class="modal-body px-5" style="margin-bottom: -20px;">
                    <h5>Calon Suami</h5><br>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Warganegara</label>
                        <div class="col-sm-9">
                            <select name="warga_negara_sm" class="form-control  input-lg validate-select required-entry"
                                id="warga_negara_sm">
                                <option value="0" style="display: none;">Pilih Warganegara</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nik Calon Suami</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="nik_suami" name="nik_suami" type="text"
                                placeholder="Nik Calon Suami">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nama Calon Suami</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Nama Calon Suami"
                                name="nama_suami" id="nama_suami">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Tempat Lahir"
                                id="tempat_lahir_sm" name="tempat_lahir_sm">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg umur" type="date" name="tggl_lahir_sm"
                                id="tggl_lahir_sm"><br>
                        </div>
                        <label for="" class="col-sm-3 col-form-label">Umur</label>
                        <div class="col-sm-9">
                            <input type="text" id="umur_suami" class="text-primary form-control input-lg result"
                                placeholder="Umur" name="umur_suami" id="umur_suami">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" required autocomplete="off"
                                placeholder="Alamat" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control  input-lg validate-select required-entry" defaultvalue=""
                                name="status_suami" id="status_suami">
                                <option value="" style="display: none;">Pilih Status</option>
                                <option value="Beristri">Beristri</option>
                                <option value="Jejaka">Jejaka</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="agama_suami" type="text" placeholder="Agama"
                                value="Islam" readonly="" name="agama_suami">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Pekerjaan"
                                id="pekerjaan_suami" name="pekerjaan_suami">
                        </div>
                    </div>
                    <div>
                        <td colspan="3">
                            <div style="margin-bottom: 8px;">
                                <img src="img/avatar.png" style="border: dashed 2px; width: 300px;" class="thumn-sm">
                            </div>
                            <input type="file" name="pas_foto_sm" style="display: none;" id="pas_foto_sm">
                            <label class="btn btn-primary" for="pas_foto_sm"><i class="fa fa-upload"></i> Upload
                                Foto</label>
                            <p><i>* Silahkan Upload Pas Foto Ukuran 2x3 Dengan Latar Belakang Warna Biru</i></p>
                        </td>
                    </div>
                </div>

                <!-- Istri -->
                <div class="modal-body px-5" style="margin-bottom: -20px;">
                    <h5>Calon Istri</h5><br>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Warganegara</label>
                        <div class="col-sm-9">
                            <select name="warga_negara_sm" class="form-control  input-lg validate-select required-entry"
                                id="warga_negara_sm">
                                <option value="0" style="display: none;">Pilih Warganegara</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nik Calon Istri</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="nik_istri" name="nik_istri" type="text"
                                placeholder="Nik Calon Istri">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nama Calon Istri</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Nama Calon Istri"
                                name="nama_istri" id="nama_istri">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Tempat Lahir"
                                id="tempat_lahir_sm" name="tempat_lahir_sm">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg umur" type="date" name="tggl_lahir_sm"
                                id="tggl_lahir_sm"><br>
                        </div>
                        <label for="" class="col-sm-3 col-form-label">Umur</label>
                        <div class="col-sm-9">
                            <input type="text" id="umur_istri" class="text-primary form-control input-lg result"
                                placeholder="Umur" name="umur_istri" id="umur_istri">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" required autocomplete="off"
                                placeholder="Alamat" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control  input-lg validate-select required-entry" defaultvalue=""
                                name="status_istri" id="status_istri">
                                <option value="" style="display: none;">Pilih Status</option>
                                <option value="Perawan">Perawan</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="agama_istri" type="text" placeholder="Agama"
                                value="Islam" readonly="" name="agama_istri">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Pekerjaan"
                                id="pekerjaan_istri" name="pekerjaan_istri">
                        </div>
                    </div>
                    <div>
                        <td colspan="3">
                            <div style="margin-bottom: 8px;">
                                <img src="img/avatar.png" style="border: dashed 2px; width: 300px;" class="thumn-sm">
                            </div>
                            <input type="file" name="pas_foto_sm" style="display: none;" id="pas_foto_sm">
                            <label class="btn btn-primary" for="pas_foto_sm"><i class="fa fa-upload"></i> Upload
                                Foto</label>
                            <p><i>* Silahkan Upload Pas Foto Ukuran 2x3 Dengan Latar Belakang Warna Biru</i></p>
                        </td>
                    </div>
                </div>

                <!-- wali -->
                <div class="modal-body px-5" style="margin-bottom: -20px;">
                    <h5>Wali</h5><br>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nik Wali</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="nik_wali" name="nik_wali" type="text"
                                placeholder="Nik Wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nomor Kartu Keluarga</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Nomor Kartu Keluarga"
                                name="no_kk" id="no_kk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nama Wali</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Nama Wali" name="nama_wali"
                                id="nama_wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Status Wali</label>
                        <div class="col-sm-9">
                            <select class="form-control  input-lg validate-select required-entry" defaultvalue=""
                                name="status_wali" id="status_wali">
                                <option value="" style="display: none;">Pilih Satatus</option>
                                <option value="Nasab">Nasab</option>
                                <option value="Hakim">Hakim</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" id="agama_wali" type="text" placeholder="Agama"
                                value="Islam" readonly="" name="agama_wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Hubungan Wali</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Hubungan Wali"
                                name="nama_wali" id="hubungan_wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Tempat Lahir"
                                id="tempat_lahir_sm" name="tempat_lahir_sm">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg umur" type="date" name="tggl_lahir_sm"
                                id="tggl_lahir_sm"><br>
                        </div>
                        <label for="" class="col-sm-3 col-form-label">Umur</label>
                        <div class="col-sm-9">
                            <input type="text" id="umur_wali" class="text-primary form-control input-lg result"
                                placeholder="Umur" name="umur_wali" id="umur_wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" required autocomplete="off"
                                placeholder="Alamat" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control  input-lg validate-select required-entry" defaultvalue=""
                                name="status_wali" id="status_wali">
                                <option value="" style="display: none;">Pilih Status</option>
                                <option value="Jejaka">Perawan</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nomor Telepone</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="number" placeholder="Nomor Telepon"
                                id="no_telepon" name="no_telepon">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Pekerjaan" id="pekerjaan_wali"
                                name="pekerjaan_wali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Bin</label>
                        <div class="col-sm-9">
                            <input class="form-control input-lg" type="text" placeholder="Bin" name="bin" id="bin">
                        </div>
                    </div>
                    <div>
                        <td colspan="3">
                            <div style="margin-bottom: 8px;">
                                <img src="img/avatar.png" style="border: dashed 2px; width: 300px;" class="thumn-sm">
                            </div>
                            <input type="file" name="pas_foto_sm" style="display: none;" id="pas_foto_sm">
                            <label class="btn btn-primary" for="pas_foto_sm"><i class="fa fa-upload"></i> Upload
                                Foto</label>
                            <p><i>* Silahkan Upload Pas Foto Ukuran 2x3 Dengan Latar Belakang Warna Biru</i></p>
                        </td>
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
<div class="modal-dialog modal-lg">

</div>

<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('#tambah-data-nikah').addClass('active');
    $('#input-data-pendaftar').addClass('active');
    $('#input-data-pendaftar').parent('.nav-item').addClass('menu-open');
});
</script>