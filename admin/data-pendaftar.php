<?php
require('template/header.php');
$response = null;
// Update Status
if (isset($_GET['proses'])) {
    $id = $_GET['id'];
    if ($_GET['proses'] == 'acc_pendaftar') $status = 'acc';
    else if ($_GET['proses'] == 'refuse_pendaftar') $status = 'refuse';

    $res = mysqli_query($conn, "UPDATE tb_pendaftar SET status='$status' WHERE id='$id'");
    if ($res) $response = 'success_accept';
    else $response = 'error';
}

$pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE status='new'");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pendaftar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                        <li class="breadcrumb-item active">Input & Data Pendaftar</li>
                        <li class="breadcrumb-item active">Data Pendaftar</li>
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
                                <h3>Data Pendaftar Baru</h3>
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
                                            <th width="120">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pendaftar as $dta) {
                                            $pendaftar_id = $dta['id'];
                                            $data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
                                            $data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
                                            $dsm = mysqli_fetch_assoc($data_sm);
                                            $dis = mysqli_fetch_assoc($data_is);
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dta['no_pendaftarn'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($dta['tanggal_daftar'])) ?></td>
                                            <td><?= $dsm['nama'] ?></td>
                                            <td><?= $dis['nama'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($dta['tggl_akad'])) . ' ' . $dta['waktu_akad'] ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#modal-detail<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Detail Pendaftar"><i
                                                        class="fa fa-list"></i></a>
                                                <a href="#" class="btn btn-sm btn-secondary print-surat"
                                                    data-id="<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Cetak Surat"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#modal-acc<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Proses Pendaftaran"><i
                                                        class="fa fa-check"></i></a>
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
                    <span class="col-sm-8">:
                        <?= date('d/m/Y', strtotime($dta['tggl_akad'])) . ' ' . $dta['waktu_akad'] ?></span>
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

<!-- MODAL ACCEPT -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-acc<?= $dta['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    Silahkan pilih proses berikut!
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a href="?proses=refuse_pendaftar&id=<?= $dta['id'] ?>" role="button" class="btn btn-danger">Tolak
                        Pendaftar</a>
                    <a href="?proses=acc_pendaftar&id=<?= $dta['id'] ?>" role="button" class="btn btn-success">Terima
                        &Lanjutkan</a>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- PRINT SURAT -->
<div id="print-surat<?= $dta['id'] ?>" class="p-5" style="font-size: 20px;" hidden="">
    <div class="row">
        <span class="col-sm-6" style="width: 70%">Prihal : Permohonan kehendak Nikah</span>
        <span class="col-sm-4" style="width: 30%; text-align: right;"><?= date('d F Y') ?></span>
    </div>
    Kepada yth,<br>
    Kepala KUA DOOM <br>
    di tempat <br><br><br>

    Assalamualaikum wr. wb. <br>
    &emsp;&emsp;&emsp; Dengan hormat, kami mengajukan permohonan kehendak nikah untuk
    Bersama ini kami sampaikan surat-surat yang diperlukan untuk atas nama kami calon suami : <u><?= $dsm['nama'] ?></u>
    dengan calon istri : <u><?= $dis['nama'] ?></u> pada hari <u>Rabu</u> tanggal
    <u><?= date('d F Y', strtotime($dta['tggl_akad'])) ?></u> jam <u><?= $dta['waktu_akad'] ?></u> bertempat di
    <u><?= $dta['lokasi_nikah'] ?></u><br><br>
    &emsp;&emsp;&emsp; Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut: <br>
    1. Surat pengantar nikah dari Lurah<br>
    2. Persetujuan calon mempelai<br>
    3. Fotokopi akte kelahiran<br>
    4. Fotokopi KTP<br>
    5. Fotokopi kartu keluarga<br>
    6. Paspoto 2x3 4 lembar<br>
    7. Paspoto 4x6 2 lembar<br>
    8. Akta cerai/surat keterangan kematian jika duda/janda<br>
    9. Surat izin komandan jika TNI/POLRI<br>
    10. Surat izin kedutaan jika WNA<br>
    11. Fotokopi paspor jika WNA<br><br>
    &emsp;&emsp;&emsp; Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa
    dihadiri dengan dicatat sesuai dengan ketentuan peraturan perundang-undangan. <br><br>

    <div class="row">
        <div class="col-sm-7" style="width: 70%;">
            Diterima tanggal ........................<br>
            Yang menerima,<br>
            Kepala KUA/Penghulu <br>
            <br>
            <br>
            <br>
            <br>
            .............................................
        </div>
        <div class="col-sm-5 text-center" style="width: 30%;">
            Wassalam,<br>
            Pemohon <br>
            <br>
            <br>
            <br>
            <br>
            <?= $dsm['nama'] ?>
        </div>
    </div>
</div>
<?php } ?>

<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('#data-pendaftar').addClass('active');
    $('#input-data-pendaftar').addClass('active');
    $('#input-data-pendaftar').parent('.nav-item').addClass('menu-open');
    <?php if ($response == 'success_accept') { ?>
    Swal.fire({
        icon: 'success',
        title: 'Proses Berhasil',
        text: 'Data pendaftar berhasil diproses',
        preConfirm: () => {
            window.location.href = window.location.href.split('?')[0];
        }
    });
    <?php } else if ($response == 'error') { ?>
    Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: 'Terjadi kesalahan. Gagal memproses data',
        preConfirm: () => {
            window.location.href = window.location.href;
        }
    });
    <?php } ?>

    $('.print-surat').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#print-surat' + id).printArea();
    });
});
</script>