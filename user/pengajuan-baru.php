<?php
require('template/header.php');
$user_id = $usr['id'];
$cek_data = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE user_id='$user_id' AND status='ditolak'");
$cek = mysqli_fetch_assoc($cek_data);
if (!$cek) {
    echo "<script>
        alert('Anda sebelumnya telah melakukan pengajuan. Silahkan periksa status pengajuan Anda!');
        location.href='data-pengajuan.php';
        </script>";
    exit();
}

$pendaftar_id = $cek['pendaftar_id'];
$get_data = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
$dta = mysqli_fetch_assoc($get_data);

if (isset($_POST['kirim'])) {
    $pengajuan_id = $cek['id'];
    $tggl_pengajuan = date('Y-m-d');
    $ket_hilang = set_foto($_FILES['ket_hilang'], 'ket_hilang-' . $pendaftar_id);
    $scan_kk = set_foto($_FILES['scan_kk'], 'scan_kk-' . $pendaftar_id);
    $scan_ktp = set_foto($_FILES['scan_ktp'], 'scan_ktp-' . $pendaftar_id);
    $swafoto_suami = set_foto($_FILES['swafoto_suami'], 'swafoto_suami-' . $pendaftar_id);
    $swafoto_istri = NULL;

    mysqli_query($conn, "UPDATE tb_pengajuan SET tggl_pengajuan='$tggl_pengajuan', status='ditinjau', keterangan=NULL WHERE id='$pengajuan_id'");

    echo "<script>
        alert('Pengajuan baru selesai dibuat, Silahkan lihat status pengajuan Anda!');
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
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper container">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Pengajuan Baru</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="feather icon-file-text"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Panel</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Pengajuan Baru</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Pengajuan Baru</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle btn-icon"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i
                                                                    class="feather icon-maximize"></i>
                                                                maximize</span><span style="display:none"><i
                                                                    class="feather icon-minimize"></i>
                                                                Restore</span></a>
                                                    </li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                                    class="feather icon-minus"></i> collapse</span><span
                                                                style="display:none"><i class="feather icon-plus"></i>
                                                                expand</span></a></li>
                                                    <!-- <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info mb-3" role="alert">
                                            <p class="mb-0">Note: Silahkan lakukan pengajuan baru apabila pengajuan
                                                sebelumnya di tolak.</p>
                                        </div>
                                        <form method="post" enctype="multipart/form-data">
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
                                                    <b>Lengkapi data</b><br>
                                                    <span>Silahkan lengkapi form berikut dan mengupload dokumen yang
                                                        diminta
                                                        untuk melanjutkan pengajuan permintaan
                                                        duplikat buku nikah!</span>
                                                    <hr>
                                                    <h5 class="text-center mb-3"><b><u>Berkas Pengajuan</u></b></h5>
                                                    <div class="form-group row">
                                                        <label class="col-3">Surat Keterangan Hilang</label>
                                                        <div class="col-9">
                                                            <input type="file" class="form-control" required=""
                                                                name="ket_hilang">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Scan Kartu Keluarga</label>
                                                        <div class="col-9">
                                                            <input type="file" class="form-control" required=""
                                                                name="scan_kk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Scan KTP</label>
                                                        <div class="col-9">
                                                            <input type="file" class="form-control" required=""
                                                                name="scan_ktp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Swafoto</label>
                                                        <div class="col-9">
                                                            <input type="file" class="form-control" required=""
                                                                name="swafoto_suami">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-3">Swafoto Istri</label>
                                                        <div class="col-9">
                                                            <input type="file" class="form-control" required="" name="swafoto_istri">
                                                        </div>
                                                    </div> -->

                                                    <div class="row">
                                                        <div class="col-3"></div>
                                                        <div class="col-9">
                                                            <button type="submit" name="kirim"
                                                                class="btn  btn-primary">Kirim Pengajuan Baru</button>
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
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('.dtl').text('-')
    var nik = "<?= $dta['nik'] ?>";
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
</script>