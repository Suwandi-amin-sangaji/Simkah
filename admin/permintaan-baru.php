<?php
require('template/header.php');
$response = null;
// Terima Permintaan
if (isset($_GET['accept'])) {
    $id = $_GET['id'];
    $accept = mysqli_query($conn, "UPDATE tb_pengajuan SET status='disetujui' WHERE id='$id'");

    if ($accept) $response = 'success_accept';
    else $response = 'error';
}

if (isset($_POST['refuse'])) {
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $accept = mysqli_query($conn, "UPDATE tb_pengajuan SET keterangan='$keterangan', status='ditolak' WHERE id='$id'");

    if ($accept) $response = 'success_refuse';
    else $response = 'error';
}

$pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE status='ditinjau'");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permintaan Duplikat Buku Nikah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                        <li class="breadcrumb-item active">Permintaan Duplikat</li>
                        <li class="breadcrumb-item active">Permintaan Baru</li>
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
                                <h3>Permintaan Baru</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="1">No</th>
                                            <th>Tggl Pengajuan</th>
                                            <th>Email</th>
                                            <th>NIK Suami</th>
                                            <th>Nama Suami</th>
                                            <th>NIK Istri</th>
                                            <th>Nama Istri</th>
                                            <th>Berkas Pengajuan</th>
                                            <th width="70">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pengajuan as $dta) {
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
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-link" data-toggle="modal"
                                                    data-target="#modal-berkas<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Lihat Berkas Persyaratan"><i
                                                        class="fa fa-file-alt"></i> Lihat Berkas</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#modal-detail<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Detail Data Nikah"><i
                                                        class="fa fa-list"></i></a>
                                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#modal-proses<?= $dta['id'] ?>" data-toggle1="tooltip"
                                                    data-original-title="Proses Permintaan"><i
                                                        class="fa fa-user-clock"></i></a>
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


<?php foreach ($pengajuan as $dta) {
    $pendaftar_id = $dta['pendaftar_id'];

    $pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
    $dft = mysqli_fetch_assoc($pendaftar);
    if (isset($dft['id'])) {
        $desa_id = $dft['desa_id'];

        $data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
        $data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
        $data_wl = mysqli_query($conn, "SELECT * FROM tb_data_wali WHERE pendaftar_id='$pendaftar_id'");
        $pmriksn = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE pendaftar_id='$pendaftar_id'");
        $data_desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
        $dsm = mysqli_fetch_assoc($data_sm);
        $dis = mysqli_fetch_assoc($data_is);
        $dwl = mysqli_fetch_assoc($data_wl);
        $pmr = mysqli_fetch_assoc($pmriksn);
        $des = mysqli_fetch_assoc($data_desa);
?>
<!-- MODAL DETAIL -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-detail<?= $dta['id'] ?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Nikah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <!-- Data Pendaftar -->
                <h6><b><u>Data Nikah</u></b></h6>
                <!-- <div class="row">
						<b class="col-sm-4">Nomor Pendaftaran</b>
						<span class="col-sm-8">: <?= $dft['no_pendaftarn'] ?></span>
					</div>
					<div class="row">
						<b class="col-sm-4">Tanggal Pendaftaran</b>
						<span class="col-sm-8">: <?= date('d/m/Y', strtotime($dft['tanggal_daftar'])) ?></span>
					</div> -->
                <div class="row">
                    <b class="col-sm-4">Kelurahan/Desa</b>
                    <span class="col-sm-8">: <?= $des['nama_desa'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Tempat Nikah</b>
                    <span class="col-sm-8">: <?= $dft['tempat_nikah'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Tanggal Akad</b>
                    <span class="col-sm-8">:
                        <?= date('d/m/Y', strtotime($dft['tggl_akad'])) . ' ' . $dft['waktu_akad'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Lokasi Nikah</b>
                    <span class="col-sm-8">: <?= $dft['lokasi_nikah'] ?></span>
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
                    <b class="col-sm-4">Nama Ayah</b>
                    <span class="col-sm-8">: <?= $pmr['nama_as'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Nama Ibu</b>
                    <span class="col-sm-8">: <?= $pmr['nama_is'] ?></span>
                </div>
                <!-- <div class="row">
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/suami/<?= $dsm['pas_foto'] ?>" height="100">
						</div>
					</div> -->
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
                    <b class="col-sm-4">Nama Ayah</b>
                    <span class="col-sm-8">: <?= $pmr['nama_ai'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Nama Ibu</b>
                    <span class="col-sm-8">: <?= $pmr['nama_ii'] ?></span>
                </div>
                <!-- <div class="row">
						<b class="col-sm-12">Foto</b>
						<div class="col-sm-12">
							<img src="../img/pasfoto/istri/<?= $dis['pas_foto'] ?>" height="100">
						</div>
					</div> -->
                <hr>
                <!-- Data Wali -->
                <h6 class="mt-4"><b><u>Data Wali:</u></b></h6>
                <!-- <div class="row">
                        <b class="col-sm-4">NIK</b>
                        <span class="col-sm-8">: <?= $dwl['nik'] ?></span>
                    </div>
                    <div class="row">
                        <b class="col-sm-4">No KK</b>
                        <span class="col-sm-8">: <?= $dwl['no_kk'] ?></span>
                    </div> -->
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
                <hr>
                <!-- Penghulu & Data Mas Kawim Penghulu -->
                <h6 class="mt-4"><b><u>Penghulu & Data Mas Kawim:</u></b></h6>
                <div class="row">
                    <b class="col-sm-4">Nama Penghulu</b>
                    <?php
                            $penghulu_id = $dft['penghulu_id'];
                            $penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu WHERE id='$penghulu_id'");
                            $phl = mysqli_fetch_assoc($penghulu);
                            ?>
                    <span class="col-sm-8">: <?= $phl['nama'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Jenis Mas Kawin</b>
                    <span class="col-sm-8">: <?= $pmr['jenis_mk'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Jumlah Mas Kawin</b>
                    <span class="col-sm-8">: <?= $pmr['jumlah_mk'] ?></span>
                </div>
                <div class="row">
                    <b class="col-sm-4">Pembayaran</b>
                    <span class="col-sm-8">: <?= $pmr['pembayaran_mk'] ?></span>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL BERKAS -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-berkas<?= $dta['id'] ?>">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Berkas Syarat Pengajuan Duplikat Buku Nikah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-7">
                            <b>Surat Keterangan Hilang</b>
                            <img src="../img/dokumen/<?= $dta['ket_hilang'] ?>" style="width: 100%;">
                            <hr>
                            <b>Scen Kartu Keluarga</b>
                            <img src="../img/dokumen/<?= $dta['scan_kk'] ?>" style="width: 100%;">
                            <hr>
                            <b>Scen Kartu KTP</b>
                            <img src="../img/dokumen/<?= $dta['scan_ktp'] ?>" style="width: 100%;">
                        </div>
                        <div class="col-5">
                            <b>Swafoto</b>
                            <img src="../img/dokumen/<?= $dta['swafoto_suami'] ?>" style="width: 100%;">
                            <hr>
                            <!-- <b>Swafoto Istri</b>
                                    <img src="../img/dokumen/<?= $dta['swafoto_istri'] ?>" style="width: 100%;">
                                    <hr> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PROSES -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-proses<?= $dta['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Permintaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div id="proccess-content" class="text-center">
                        <div class="mb-2 text-justify">
                            Silahkan klik "Terima Permintaan" untuk menyetujui permintaan pengajuan duplikat buku nikah
                            atau klik "Tolak Permintaan" Untuk menolak permintaan ini!
                        </div>
                        <hr>
                        <a href="?accept=true&id=<?= $dta['id'] ?>" role="button" class="btn btn-success"><i
                                class="fas fa-check-circle"></i> Terima Permintaan</a>
                        <a href="#" role="button" class="btn btn-danger" id="act-refuse"><i
                                class="fas fa-times-circle"></i> Tolak Permintaan</a>
                    </div>
                    <div id="refuse-content" hidden>
                        <div class="text-center">
                            <b>Tolak Permintaan Duplikat Buku Nikah</b>
                        </div>
                        <hr>
                        <form method="post">
                            <label>Keteranagn:</label>
                            <textarea name="keterangan" class="form-control" rows="4"
                                placeholder="Input keterangan / alasan penolakan.." required=""></textarea>
                            <div class="text-right mt-2">
                                <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                <a href="#" role="button" class="btn btn-secondary" id="act-cancel"> Batalkan</a>
                                <button type="submit" class="btn btn-primary" name="refuse"> Lanjutkan
                                    Penolakan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    }
} ?>

<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('#permintaan-baru').addClass('active');
    $('#permintaan-duplikat').addClass('active');
    $('#permintaan-duplikat').parent('.nav-item').addClass('menu-open');

    $('#act-refuse').click(function(e) {
        e.preventDefault();

        $('#proccess-content').attr('hidden', '');
        $('#refuse-content').removeAttr('hidden');
    });

    $('#act-cancel').click(function(e) {
        e.preventDefault();

        $('#refuse-content').attr('hidden', '');
        $('#proccess-content').removeAttr('hidden');
    });

    <?php if ($response == 'success_accept') { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Diproses',
        text: 'Data permintaan berhasil disetujui',
        preConfirm: () => {
            window.location.href = window.location.href.split('?')[0];
        }
    });
    <?php } else if ($response == 'success_refuse') { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Diproses',
        text: 'Data permintaan berhasil ditolak',
        preConfirm: () => {
            window.location.href = window.location.href;
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
});
</script>