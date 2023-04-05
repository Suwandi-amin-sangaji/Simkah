<?php
require('config.php');
if (isset($_GET['clear_session']) && isset($_COOKIE['data_pendaftar'])) {
    setcookie('data_pendaftar', null, -1);
    header('location: index');
}
?>
<!DOCTYPE html>
<html lang="en">

<head?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo2.png">
    <title>SIMKAH</title>
    <base target="_self">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    </head>
    <div style="padding-top: 70px">
        <div class="container panel" id="myWizard">
            <div class="row" style="padding-top: 15px">
                <!-- <div class="pull-left">
                    <img src="img/logo.png" alt="" height="100">
                </div>
                <div class="pull-left" style="padding-top: 25px">
                    <h4>DIREKTORAT JENDERAL BIMBINGAN MASYARAKAT ISLAM</h4>
                    <h5>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h5>
                </div> -->
                <div class="pull-right">
                    <img src="img/logo.png" alt="" height="100">
                </div>
                <div class="pull-right" style="padding-top: 30px">
                    <h4>DIREKTORAT JENDERAL BIMBINGAN MASYARAKAT ISLAM<br>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h4>
                </div>
            </div>
            <hr>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 35%;">
                    Step 1 of 3
                </div>
            </div>
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav nav-pills nav-wizard">
                        <li class="active">
                            <a class="tab-head-this hidden-xs tab-click" style="cursor: not-allowed;" href="#" data-toggle="tab" data-step="1" disabled>1. Pilih Kelurahan/Desa dan Jadwal Akad</a>
                            <a class="tab-head-this visible-xs" href="#step1" data-toggle="tab" data-step="1">1.</a>
                            <div class="nav-arrow"></div>
                        </li>
                        <li class="">
                            <div class="nav-wedge"></div>
                            <a class="tab-head-this hidden-xs tab-click" style="cursor: not-allowed;" href="#" data-toggle="tab" data-step="2">2. Isi Form Pendaftaran</a>
                            <a class="tab-head-this visible-xs" href="#step2" data-toggle="tab" data-step="2">2.</a>
                            <div class="nav-arrow"></div>
                        </li>
                        <li class="">
                            <div class="nav-wedge"></div>
                            <a class="tab-head-this hidden-xs tab-click" style="cursor: not-allowed;" href="#" data-toggle="tab" data-step="3">3. Bukti Pendaftaran</a>
                            <a class="tab-head-this visible-xs" href="#step3" data-toggle="tab" data-step="3">3.</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form id="formDaftar">
                <div class="tab-content">
                    <!-- step 1 -->
                    <div class="tab-pane fade in active" id="step1">
                        <h3>1. Pilih KUA tempat dimana akan dilaksanakannya Akad Nikah :</h3><br>
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Kelurahan/Desa</label>
                                        <select class="form-control  input-lg validate-select required-entry" id="desa_id" name="desa_id">
                                            <option value="">--Pilih Desa/Kelurahan--</option>
                                            <?php
                                            $desa = mysqli_query($conn, "SELECT * FROM tb_desa");
                                            foreach ($desa as $dsa) { ?>
                                                <option value="<?= $dsa['id'] ?>"><?= $dsa['nama_desa'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nikah di</label>
                                        <select class="form-control  input-lg validate-select required-entry" id="tempat_nikah" name="tempat_nikah">
                                            <option value="KUA">KUA</option>
                                            <option value="LUAR KUA">LUAR KUA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Akad Nikah</label>
                                        <input class="form-control input-lg" type="date" id="tggl_akad" name="tggl_akad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Waktu Akad Nikah</label>
                                        <input class="form-control input-lg" type="time" id="waktu_akad" name="waktu_akad">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-13">
                                    <div class="form-group">
                                        <label>Alamat Lokasi Akad Nikah</label>
                                        <textarea class="form-control" rows="3" placeholder="Alamat Lokasi Akad Nikah" name="lokasi_nikah" id="lokasi_nikah"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                            <div class="col-xs-12 col-md-13">
                                <div class="form-group">
                                    <label>Email Pendaftaran</label>
                                    <input class="form-control input-lg" type="email" placeholder="Email Pendaftaran" id="email_pendaftar" name="email_pendaftar">
                                </div>
                            </div>
                        </div> -->

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block next" type="submit">Selanjutnya&nbsp;<i class="fa fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end step 1 -->

                    <!-- step 2 -->
                    <div class="tab-pane fade" id="step2">
                        <h3>2. Isi Form Pendaftaran</h3><br>
                        <div class="well">
                            <div>
                                <div class="show-on-scroll">
                                    <h4>Isi Data</h4>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#suami" aria-controls="suami" role="tab" data-toggle="tab">Calon Suami</a></li>
                                        <li role="presentation"><a href="#istri" aria-controls="istri" role="tab" data-toggle="tab">Calon Istri</a></li>
                                        <li role="presentation"><a href="#wali" aria-controls="wali" role="tab" data-toggle="tab">Wali Nikah</a></li>
                                        <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
                                        <li role="presentation"><a href="#dokument" aria-controls="dokument" role="tab" data-toggle="tab">Checklist Dokument</a></li>
                                    </ul>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content"><br>
                                    <!-- data suami -->
                                    <div role="tabpanel" class="tab-pane active" id="suami">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Warganegara</label>
                                                    <select name="warga_negara_sm" class="form-control  input-lg validate-select required-entry" id="warga_negara_sm">
                                                        <option value="0" style="display: none;">Pilih Warganegara
                                                        </option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                            <div class="form-group">
                                                <label>Nik Calon Suami</label>
                                                <input class="form-control input-lg" id="nik_suami" name="nik_suami" type="text" placeholder="Nik Calon Suami">
                                                <script>
                                                    const input = document.getElementById("nik_suami");
                                                    input.addEventListener("input", function(event) {
                                                        const value = event.target.value;
                                                        event.target.value = value.replace(/[^0-9]/g, '').substring(0, 16);
                                                    });
                                                </script>
                                            </div>
                                        </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nama Calon Suami</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Nama Calon Suami" name="nama_suami" id="nama_suami">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Tempat Lahir" id="tempat_lahir_sm" name="tempat_lahir_sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13 find-umur">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input class="form-control input-lg umur" type="date" name="tggl_lahir_sm" id="tggl_lahir_sm">
                                                </div>
                                                <div class="form-group">
                                                    <label>Umur</label>
                                                    <input type="number" id="umur_suami" class="text-primary form-control input-lg result" placeholder="Umur" name="umur_suami" id="umur_suami">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat_suami" id="alamat_suami"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control  input-lg validate-select required-entry" defaultvalue="" name="status_suami" id="status_suami">
                                                        <option value="" style="display: none;">Pilih Status</option>
                                                        <option value="Jejaka">Jejaka</option>
                                                        <option value="Beristri">Beristri</option>
                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control input-lg" id="agama_suami" type="text" placeholder="Agama" value="Islam" readonly="" name="agama_suami">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Pekerjaan" id="pekerjaan_suami" name="pekerjaan_suami">
                                                </div>
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
                                                <h6><i>* Silahkan Upload Pas Foto Ukuran 2x3 Dengan Latar Belakang Warna
                                                        Biru</i></h6>
                                            </td>
                                        </div>
                                    </div>

                                    <!-- data istri -->
                                    <div role="tabpanel" class="tab-pane" id="istri">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Warganegara</label>
                                                    <select name="warga_negara_is" class="form-control  input-lg validate-select required-entry" id="warga_negara_is">
                                                        <option value="0" style="display: none;">Pilih Warganegara
                                                        </option>
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nik Calon Istri</label>
                                                    <input class="form-control input-lg" type="number" placeholder="Nik Calon Istri" name="nik_istri" id="nik_istri">
                                                    <script>
                                                    const nik_istri = document.getElementById("nik_istri");
                                                    nik_istri.addEventListener("input", function(event) {
                                                        const value = event.target.value;
                                                        event.target.value = value.replace(/[^0-9]/g, '').substring(0, 16);
                                                    });
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nama Calon Istri</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Nama Calon Istri" name="nama_istri" id="nama_istri">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Tempat Lahir" name="tempat_lahir_is" id="tempat_lahir_is">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13 find-umur">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input class="form-control input-lg umur" type="date" name="tggl_lahir_is" id="tggl_lahir_is">
                                                    <!-- <button class="btn btn-primary" onclick="getAge();">Hitung</button> -->
                                                    <!-- <h4>Umur: <span id="result" class="text-primary form-control input-lg"></span></h4> -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Umur</label>
                                                    <input type="text" class="text-primary form-control input-lg result" placeholder="Umur" name="umur_istri" id="umur_istri">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat_istri" id="alamat_istri"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control  input-lg validate-select required-entry" defaultvalue="" name="status_istri" id="status_istri">
                                                        <option value="" style="display: none;">Pilih Status</option>
                                                        <option value="Perawan">Perawan</option>
                                                        <option value="Cerai Mati">Cerai Mati</option>
                                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control input-lg" id="agama_istri" type="text" placeholder="Agama" value="Islam" readonly="" name="agama_istri">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Pekerjaan" id="pekerjaan_istri" name="pekerjaan_istri">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <td colspan="3">
                                                <div style="margin-bottom: 8px;">
                                                    <img src="img/avatar.png" style="border: dashed 2px; width: 300px;" class="thumn-is">
                                                </div>
                                                <input type="file" name="pas_foto_is" style="display: none;" id="pas_foto_is">
                                                <label class="btn btn-primary" for="pas_foto_is"><i class="fa fa-upload"></i> Upload
                                                    Foto</label>
                                                <h6><i>* Silahkan Upload Pas Foto Ukuran 2x3 Dengan Latar Belakang Warna
                                                        Biru</i></h6>
                                            </td>
                                        </div>
                                    </div>

                                    <!-- data wali -->
                                    <div role="tabpanel" class="tab-pane" id="wali">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nik Wali</label>
                                                    <input class="form-control input-lg" type="number" placeholder="Nik Wali" name="nik_wali" id="nik_wali">
                                                    <script>
                                                    const nik_wali = document.getElementById("nik_wali");
                                                    nik_wali.addEventListener("input", function(event) {
                                                        const value = event.target.value;
                                                        event.target.value = value.replace(/[^0-9]/g, '').substring(0, 16);
                                                    });
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nomor Kartu Keluarga</label>
                                                    <input class="form-control input-lg" type="number" placeholder="Nomor Kartu Keluarga" name="no_kk" id="no_kk">
                                                    <script>
                                                    const no_kk = document.getElementById("no_kk");
                                                    no_kk.addEventListener("input", function(event) {
                                                        const value = event.target.value;
                                                        event.target.value = value.replace(/[^0-9]/g, '').substring(0, 16);
                                                    });
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nama Wali</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Nama Wali" name="nama_wali" id="nama_wali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Status Wali</label>
                                                    <select name="status_wali" class="form-control  input-lg validate-select required-entry" id="status_wali">
                                                        <option value="" style="display: none;">Pilih Satatus</option>
                                                        <option value="Nasab">Wali Nasab</option>
                                                        <option value="Hakim">Wali Hakim</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <input class="form-control input-lg" id="agama_wali" type="text" placeholder="Agama" name="agama_wali" readonly="" value="Islam">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Hubungan Wali</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Hubungan Wali" name="hubungan_wali" id="hubungan_wali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Tempat Lahir" id="tempat_lahir_wl" name="tempat_lahir_wl">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13 find-umur">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input class="form-control input-lg umur" type="date" name="tggl_lahir_wl" id="tggl_lahir_wl">
                                                    <!-- <button class="btn btn-primary" onclick="getAge();">Hitung</button> -->
                                                    <!-- <h4>Umur: <span id="result" class="text-primary form-control input-lg"></span></h4> -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Umur</label>
                                                    <input type="text" id="umur_wali" class="text-primary form-control input-lg result" name="umur_wali" placeholder="Umur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat_wali" id="alamat_wali"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <input class="form-control input-lg" type="number" placeholder="Nomor Telepon" id="no_telepon" name="no_telepon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" id="pekerjaan_wali" class="form-control input-lg" name="pekerjaan_wali" placeholder="Pekerjaan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label>Bin</label>
                                                    <input class="form-control input-lg" type="text" placeholder="Bin" name="bin" id="bin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- data Register -->
                                    <div role="tabpanel" class="tab-pane" id="register">
                                        <div class="row">
                                            <div class="form-group first">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="form-group first">
                                                <label for="username">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="form-group last mb-4">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" required>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- checklist Dokument -->
                                    <div role="tabpanel" class="tab-pane" id="dokument">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-13">
                                                <div class="form-group">
                                                    <label for=""><strong>Dokumen Yang Harus Dibawa</strong></label>
                                                    <br><br>
                                                    <!-- dokumen suami -->
                                                    <div class="row col-xs-11 col-md-12" style="margin-bottom: 15px;">
                                                        <div class="col-md-6">
                                                            <b><u>Persyaratan Dokumen Suami</u></b>
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Orang Tua (Jika calon pengantin umumnya
                                                                dibawah 21
                                                                tahun)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Dispensasi Pengadilan Agama Bagi Catin Berusia
                                                                dibawah
                                                                19 tahun</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Akta Cerai (Jika calon pengantin sudah cerai)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Komandan (Jika calon pengantin TNI atau POLRI)
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Akta Kematian (Jika calon pengantin duda/janda
                                                                ditinggal mati)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Kedutaan Bagi WNA</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div><br>
                                                    <!-- dokumen istri -->
                                                    <div class="row col-xs-11 col-md-12" style="margin-bottom: 12px; margin-top: 15px;">
                                                        <div class="col-md-6">
                                                            <b><u>Persyaratan Dokumen Istri</u></b>
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Orang Tua (Jika calon pengantin umumnya
                                                                dibawah 21
                                                                tahun)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Dispensasi Pengadilan Agama Bagi Catin Berusia
                                                                dibawah
                                                                19 tahun</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Akta Cerai (Jika calon pengantin sudah cerai)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Komandan (Jika calon pengantin TNI atau POLRI)
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Akta Kematian (Jika calon pengantin duda/janda
                                                                ditinggal mati)</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="col-md-6">
                                                            <p>Surat Izin Kedutaan Bagi WNA</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" disabled checked name="" class="pull-right" value="ya" onclick="">
                                                        </div>
                                                    </div><br>
                                                    <div class="row col-xs-11 col-md-12">
                                                        <div class="checkbox col-md-12" disabled checked>
                                                            <label>
                                                                <b><input type="checkbox" id="cek-dokumen"> Apakah anda
                                                                    yakin data yang diisikan Benar dan Valid ?</b>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="btn-group btn-group-justified" role="group" aria-label="">
                                    <div class="btn-group btn-group-lg" role="group" aria-label="">
                                        <button class="btn btn-default back" type="button"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</span></button>
                                    </div>
                                    <div class="btn-group btn-group-lg" role="group" aria-label="">
                                        <input type="hidden" name="submit_daftar" value="true">
                                        <input type="hidden" name="front_input" value="true">
                                        <button class="btn btn-success btn-lg btn-block next" type="submit">Mendaftar&nbsp;<i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end step 2 -->

                    <!-- step 3 -->
                    <div class="tab-pane fade" id="step3">
                        <h3>3. Bukti Pendaftaran:</h3><br>
                        <div class="well">
                            <div class="text-center">
                                <div class="panel">
                                    <div class="panel-body text-center">
                                        <?php if (isset($_COOKIE['data_pendaftar'])) {
                                            $data = unserialize($_COOKIE['data_pendaftar']); ?>
                                            <p>
                                                Selamat Pendaftaran Nikah anda telah berhasil. <br>
                                                Silahkan mencetak bukti Pendaftaran Nikah Anda di bawah.
                                            </p>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4 bg-success" style="padding: 20px; background-color: #5cb85c; border: 2px solid #333333; border-radius: 15px;">
                                                    <h4>Nomor Pendaftaran Anda</h4>
                                                    <h2><?= $data['no_pendaftarn'] ?></h2>
                                                </div>
                                            </div>
                                            <br>
                                            <p>
                                                Bukti Pendaftaran ini harus di bawah dan di tunjukkan ke <br>
                                                petugas KUA untuk melanjutkan pendaftaran di kantor KUA. <br>
                                                Tetima Kasih
                                            </p>
                                        <?php } else { ?>
                                            <h4><i>Tidak Ada Data Pendaftaran</i></h4>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="">
                                        <div class="btn-group btn-group-lg" role="group" aria-label="">
                                            <a href="#" id="goto-home" class="btn btn-default" role="button"><i class="fa fa-home"></i>&nbsp; Beranda</a>
                                        </div>
                                        <div class="btn-group btn-group-lg" role="group" aria-label="">
                                            <button class="btn btn-primary btn-lg btn-success print" type="button">Cetak
                                                Bukti Pendaftaran &nbsp;<i class="fa fa-print"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="step3">
                    <div class="row">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-body">
                                <h3>1. Pilih KUA tempat dimana akan dilaksanakannya Akad Nikah :</h3><br>
                                <div class="well">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified" role="group" aria-label="">
                                    <div class="btn-group btn-group-lg" role="group" aria-label="">
                                        <a href="#" id="goto-home" class="btn btn-default" role="button"><i class="fa fa-home"></i>&nbsp; Beranda</a>
                                    </div>
                                    <div class="btn-group btn-group-lg" role="group" aria-label="">
                                        <button class="btn btn-primary btn-lg btn-success next" type="button">Cetak Bukti Pendaftaran &nbsp;<i class="fa fa-print"></i></button>
                                    </div>
                                </div>
                                <div class="row" style="display:none;">
                                    <div class="col-xs-12">
                                        <p class="payment-errors"></p>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                    </div>
                </div> -->
                    <!-- end step 3 -->
                </div>
            </form>
        </div>
    </div>

    <div id="push"></div>

    <div id="loading" hidden="">
        <span class="loader" hidden=""></span>
        <div class="textLoader">
            <center>
                <b>Sedang Diprose... </b>
            </center>
        </div>
    </div>

    <div class="cetak-pendaftaran" hidden="">
        <?php if (isset($_COOKIE['data_pendaftar'])) {
            $data = unserialize($_COOKIE['data_pendaftar']) ?>
            <div style="background-color: #fff; padding: 30px;">
                <h2 style="margin-bottom: 20px;">Bukti Pendaftaran Nikah</h2>
                <p>Tanggal Pendaftaran: <?= date('d F Y', strtotime($data['tanggal_daftar'])) ?></p>
                <p>Nomor Pendaftaran: <?= $data['no_pendaftarn'] ?></p>

                <p><b>Detail Calon Pengantin</b></p>
                <p>Nama Calon Pengantin Pria: <?= $data['nama_suami'] ?></p>
                <p>NIK Calon Pengantin Pria: <?= $data['nik_suami'] ?></p>
                <p>Nama Calon Pengantin Wanita: <?= $data['nama_istri'] ?></p>
                <p>NIK Calon Pengantin Wanita: <?= $data['nik_istri'] ?></p>

                <p><b>Rencana Pelaksanaan Akad Nikah</b></p>
                <p>Diluar Atau Di KUA: <?= $data['tempat_nikah'] ?></p>
                <p>Tanggal Akad :</p>
                <div style="padding-left: 50px;">
                    <p>Tanggal: <?= date('d F Y', strtotime($data['tggl_akad'])) ?></p>
                    <p>Jam: <?= $data['waktu_akad'] ?></p>
                </div>
                <p>Alamat Lokasi Akad Nikah: <?= $data['lokasi_nikah'] ?></p>

                <p><b>Dokumen Yang Perlu Dipersiapkan:</b></p>
                <p>1. Surat pengantar nikah dari lurah</p>
                <p>2. Persetujuan calon mempelai</p>
                <p>3. Fotokopi akte kelahiran</p>
                <p>4. Fotokopi KTP</p>
                <p>5. Fotokopi kartu keluarga</p>
                <p>6. Paspoto 2x3 4 lembar</p>
                <p>7. Paspoto 4x6 2 lembar</p>
                <p>8. Akta cerai/surat keterangan kematian jika duda/janda</p>
                <p>9. Surat izin komandan jika TNI/POLRI</p>
                <p>10. Surat izin kedutaan jika WNA</p>
                <p>11. Fotokopi paspor jika WNA</p>
            </div>
        <?php } ?>
    </div>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-2">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="mb-0">&copy; This template is made with&nbsp;
                            <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#458FF6" viewBox="0 0 16 16">
                                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                </path>
                            </svg>&nbsp;by&nbsp;<a class="text-black" href="https://sorongdev.com" target="_blank">Sorong
                                Developer </a>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->

    </section>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.PrintArea.js"></script>
    <script src="admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#info_daftar').children('a').attr('href', 'index.php#info_pendaftaran');
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

            $(window).scroll(function(e) {
                var winscroll = $(this).scrollTop();
                if (winscroll >= 420) $('.show-on-scroll').addClass('well style-on-scroll');
                else $('.show-on-scroll').removeClass('well style-on-scroll');
            });

            $('.show-on-scroll').find('li').click(function(event) {
                var winscroll = $(window).scrollTop();
                if (winscroll >= 420) $(window).scrollTop(364);
            });

            $('#goto-home').click(function(event) {
                Swal.fire({
                    icon: 'info',
                    title: 'Kembali Ke Beranda?',
                    text: 'Pastikan anda telah mencedak atau mendownload bukti pendaftaran sebelum kembali ke beranda!',
                    showCancelButton: true,
                    confirmButtonText: 'Ke Beranda',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        location.href = 'daftar.php?clear_session=true';
                    }
                })
            });

            $('.print').click(function(e) {
                e.preventDefault();
                $('.cetak-pendaftaran').printArea();
            });
        })
    </script>




    <script>
        $('.next').click(function() {
            var nextId = $(this).parents('.tab-pane').next().attr("id");
            if (nextId == 'step2') {
                if (validasi1()) $('[href="#' + nextId + '"]').tab('show');
                else warning_validasi();
            } else if (nextId == 'step3') {
                if (validasi2()) {
                    // process input to database
                    var data = new FormData($('#formDaftar')[0]);
                    $.ajax({
                        url: 'controller.php',
                        method: "POST",
                        data: data,
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener('progress', function(evt) {
                                if (evt.lengthComputable) {
                                    $("#loading, .loader").removeAttr('hidden');
                                }
                            }, false);
                            return xhr;
                        },
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#loading, .loader").attr('hidden', '');
                            Swal.fire({
                                icon: 'success',
                                title: 'Pendaftaran Berhasil',
                                text: 'Selamat Pendaftaran Nikah anda telah berhasil. Selanjutnya silahkan cetak bukti pendaftaran untuk di tunjukkan di kantor KUA Sorong Utara',
                                preConfirm: () => {
                                    location.href = 'daftar.php';
                                }
                            })
                            console.log(data);
                            // $('[href="#'+nextId+'"]').tab('show');
                        }
                    });
                } else warning_validasi();
            }
            return false;
        })

        function validasi1() {
            var desa_id = $('#desa_id').val();
            var tggl_akad = $('#tggl_akad').val();
            var waktu_akad = $('#waktu_akad').val();
            var lokasi_nikah = $('#lokasi_nikah').val();
            // var email_pendaftar = $('#email_pendaftar').val();

            if (desa_id == '' || tggl_akad == '' || waktu_akad == '' || lokasi_nikah == '') return false;
            else return true;
        }

        function validasi2() {
            // data suami
            var warga_negara_sm = $('#warga_negara_sm').val();
            var nik_suami = $('#nik_suami').val();
            var nama_suami = $('#nama_suami').val();
            var tempat_lahir_sm = $('#tempat_lahir_sm').val();
            var tggl_lahir_sm = $('#tggl_lahir_sm').val();
            var umur_suami = $('#umur_suami').val();
            var alamat_suami = $('#alamat_suami').val();
            var status_suami = $('#status_suami').val();
            var agama_suami = $('#agama_suami').val();
            var pekerjaan_suami = $('#pekerjaan_suami').val();
            var pas_foto_sm = $('#pas_foto_sm').prop('files')[0];

            // data istri
            var warga_negara_is = $('#warga_negara_is').val();
            var nik_istri = $('#nik_istri').val();
            var nama_istri = $('#nama_istri').val();
            var tempat_lahir_is = $('#tempat_lahir_is').val();
            var tggl_lahir_is = $('#tggl_lahir_is').val();
            var umur_istri = $('#umur_istri').val();
            var alamat_istri = $('#alamat_istri').val();
            var status_istri = $('#status_istri').val();
            var agama_istri = $('#agama_istri').val();
            var pekerjaan_istri = $('#pekerjaan_istri').val();
            var pas_foto_is = $('#pas_foto_is').prop('files')[0];

            // data wali
            var nik_wali = $('#nik_wali').val();
            var no_kk = $('#no_kk').val();
            var nama_wali = $('#nama_wali').val();
            var status_wali = $('#status_wali').val();
            var agama_wali = $('#agama_wali').val();
            var hubungan_wali = $('#hubungan_wali').val();
            var tempat_lahir_wl = $('#tempat_lahir_wl').val();
            var tggl_lahir_wl = $('#tggl_lahir_wl').val();
            var umur_wali = $('#umur_wali').val();
            var alamat_wali = $('#alamat_wali').val();
            var no_telepon = $('#no_telepon').val();
            var pekerjaan_wali = $('#pekerjaan_wali').val();
            var bin = $('#bin').val();

            if (warga_negara_sm == '' || nik_suami == '' || nama_suami == '' || tempat_lahir_sm == '' || umur_suami == '' ||
                alamat_suami == '' || tggl_lahir_sm == '' || status_suami == '' || agama_suami == '' || pekerjaan_suami ==
                '' ||
                pas_foto_sm == undefined) return false;
            else if (warga_negara_is == '' || nik_istri == '' || nama_istri == '' || tempat_lahir_is == '' ||
                tggl_lahir_is ==
                '' || umur_istri == '' || alamat_istri == '' || status_istri == '' || agama_istri == '' ||
                pekerjaan_istri ==
                '' || pas_foto_is == undefined) return false;
            else if (nik_wali == '' || no_kk == '' || nama_wali == '' || status_wali == '' || agama_wali == '' ||
                hubungan_wali == '' || tempat_lahir_wl == '' || tggl_lahir_wl == '' || umur_wali == '' || alamat_wali ==
                '' ||
                no_telepon == '' || pekerjaan_wali == '' || bin == '') return false;
            else if ($('#cek-dokumen').is(':checked') == false) return false;
            else return true;
        }


        function validasi3() {
            var nama = $('#nama').val();
            var email = $('#email').val();
            var password = $('#password').val();
            // var email_pendaftar = $('#email_pendaftar').val();

            if (nama == '' || email == '' || password == '') return false;
            else return true;
        }

        function warning_validasi() {
            Swal.fire({
                icon: 'warning',
                title: 'Lengkapi Data',
                text: 'Pastikan anda telah melengkapi semua data inputan dan menyetujui persyaratan dokumen',
            })
        }

        $('.back').click(function() {
            var prevId = $(this).parents('.tab-pane').prev().attr("id");
            $('[href="#' + prevId + '"]').tab('show');
            return false;
        })

        $('.tab-head-this').on('shown.bs.tab', function(e) {
            //update progress
            var step = $(e.target).data('step');
            var percent = (parseInt(step) / 3) * 100;

            $('.progress-bar').css({
                width: percent + '%'
            });
            $('.progress-bar').text("Step " + step + " of 3");
            //e.relatedTarget // previous tab
        })

        $('.first').click(function() {
            $('#myWizard a:first').tab('show')
        })

        $('#myTabs a').click(function(e) {
            e.preventDefault()
            $(this).tab('show')
        });

        window.onload = function() {
            $('.umur').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                // $('.result').val(age);
                $(this).parents('.find-umur').find('.result').val(age);
            });
        }

        $(window).scroll(function() {
            handleTopNavAnimation();
        });

        function handleTopNavAnimation() {
            var top = $(window).scrollTop();
            if (top > 10) {
                $('#site-nav').addClass('navbar-solid');
            } else {
                $('#site-nav').removeClass('navbar-solid');
            }
        }

        <?php if (isset($_COOKIE['data_pendaftar'])) { ?>
            $('[href="#step3"]').tab('show');
        <?php } ?>
    </script>