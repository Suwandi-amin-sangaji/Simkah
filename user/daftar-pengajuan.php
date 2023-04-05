<?php
require('template/header.php');
require('../config.php');
$user_id = $_SESSION['login_user_get_id'];
$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$user_id'");
$usr = mysqli_fetch_assoc($user);

// $user_id = $usr['id'];
// $cek_data = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE user_id='$user_id' AND status='ditolak' OR status='ditinjau'");
// $cek = mysqli_fetch_assoc($cek_data);
// if (!$cek) {
//     echo "<script>
//         alert('Anda sebelumnya telah melakukan pengajuan. Silahkan periksa status pengajuan Anda!');
//         location.href='data-pengajuan.php';
//         </script>";
//     exit();
// }


if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE nik='$nik'");
    $dsm = mysqli_fetch_assoc($data_sm);
    $data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE nik='$nik'");
    $dis = mysqli_fetch_assoc($data_is);

    if ($dsm) {
        $pendaftar_id = $dsm['pendaftar_id'];
    } else if ($dis) {
        $pendaftar_id = $dis['pendaftar_id'];
    } else {
        echo "<script>
        alert('NIK tidak sesuai!');
        location.href='daftar-pengajuan';
        </script>";
        exit();
    }
    
    $user_id = $usr['id'];
    $tggl_pengajuan = date('Y-m-d');
    $ket_hilang = set_foto($_FILES['ket_hilang'], 'ket_hilang-' . $pendaftar_id);
    $scan_kk = set_foto($_FILES['scan_kk'], 'scan_kk-' . $pendaftar_id);
    $scan_ktp = set_foto($_FILES['scan_ktp'], 'scan_ktp-' . $pendaftar_id);
    $swafoto_suami = set_foto($_FILES['swafoto_suami'], 'swafoto_suami-' . $pendaftar_id);
    $swafoto_istri = NULL;

    mysqli_query($conn, "INSERT INTO tb_pengajuan (`id`, `pendaftar_id`, `user_id`, `tggl_pengajuan`, `ket_hilang`, `scan_kk`, `scan_ktp`, `swafoto_suami`, `swafoto_istri`, `status`, `keterangan`) VALUES(NULL, '$pendaftar_id', '$user_id', '$tggl_pengajuan', '$ket_hilang', '$scan_kk', '$scan_ktp', '$swafoto_suami', '$swafoto_istri', 'ditinjau', NULL)");

    echo "<script>
        alert('Pengajuan selesai, Silahkan Menunggu Konfirmasi Admin!');
        location.href='data-pengajuan.php';
        </script>";
}

// Upload Foto
function set_foto($data, $file)
{
    $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
    $file_name = $file . "." . $ext;
    move_uploaded_file($data['tmp_name'], '../img/dokumen/' . $file_name);
    return $file_name;
}
?>


<body>
    <div class="container">
        <div class="main-body">
            <div class="page-wrapper pt-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="min-height: 600px;">
                            <div class="card-header">
                                <h2 class="text-center">Form Pengajuan Permintaan Duplikat Buku
                                    Nikah</h2>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="floating-label"><b>Periksa NIK anda (NIK
                                                        Suami/Istri)</b></label>
                                                <input type="number" name="nik" id="nik" class="form-control"
                                                    placeholder="Masukkan NIK anda" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label class="floating-label"></label>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary" id="cek-nik">Cek
                                                        NIK</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3" id="not-found" style="margin-top: -10px;" hidden="">
                                            <span class="text-danger"><i>NIK tidak ditemukan, periksa kembali NIK
                                                    anda</i></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td width="100"><b>Kelurahan/Desa</b></td>
                                                    <td width="10">:</td>
                                                    <td id="desa" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nikah di</b></td>
                                                    <td>:</td>
                                                    <td id="tempat_nikah" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tanggal Akad</b></td>
                                                    <td>:</td>
                                                    <td id="tggl_akad" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>NIK Suami</b></td>
                                                    <td>:</td>
                                                    <td id="nik_sm" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Suami</b></td>
                                                    <td>:</td>
                                                    <td id="nama_sm" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Suami</b></td>
                                                    <td>:</td>
                                                    <td id="pekerjaan_sm" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>NIK Istri</b></td>
                                                    <td>:</td>
                                                    <td id="nik_is" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Istri</b></td>
                                                    <td>:</td>
                                                    <td id="nama_is" class="dtl">-</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Istri</b></td>
                                                    <td>:</td>
                                                    <td id="pekerjaan_is" class="dtl">-</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-7 px-3">
                                            <h5 class="text-center mb-3"><b><u>Berkas Pengajuan</u></b></h5>
                                            <div class="form-group row">
                                                <label class="col-3"><b class="text-danger">*</b> Surat Keterangan
                                                    Hilang</label>
                                                <div class="col-9">
                                                    <input type="file" class="form-control" required=""
                                                        name="ket_hilang">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3"><b class="text-danger">*</b> Scan Kartu
                                                    Keluarga</label>
                                                <div class="col-9">
                                                    <input type="file" class="form-control" required="" name="scan_kk">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3"><b class="text-danger">*</b> Scan KTP</label>
                                                <div class="col-9">
                                                    <input type="file" class="form-control" required="" name="scan_ktp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3"><b class="text-danger">*</b> Swafoto</label>
                                                <div class="col-9">
                                                    <input type="file" class="form-control" required=""
                                                        name="swafoto_suami">
                                                    <span class="text-danger">* Dokumen persyaratan wajib
                                                        dilampirkan</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-9">
                                                    <button type="submit" name="kirim" class="btn  btn-primary">Kirim
                                                        Pengajuan</button>
                                                    <a href="../" class="btn btn-danger"><i
                                                            class="fa fa-arrow-circle-left"></i> Kembali</a>
                                                    <button type="reset" class="btn btn-warning"><i
                                                            class="fa fa-arrow-circle"></i> Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Required Js -->
<script src="assets/js/plugins/jquery.min.js"></script>
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>

<script>
$(document).ready(function() {
    $('#cek-nik').click(function(e) {
        e.preventDefault();

        $('.dtl').text('-')
        var nik = $('#nik').val();
        $.ajax({
            type: "POST",
            url: "controller.php",
            dataType: 'json',
            data: {
                req: 'cek_nik',
                nik: nik,
            },
            success: function(data) {
                if (!data.desa) {
                    $('#not-found').removeAttr('hidden');
                    $('#nik').val('');
                } else $('#not-found').attr('hidden', '');
                $.each(data, function(key, val) {
                    $('#' + key).text(val);
                });
            }
        });
    });
});
</script>
<?php include "template/footer.php";?>