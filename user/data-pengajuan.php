<?php
require('template/header.php');
$user_id = $usr['id'];
$get_data = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE user_id='$user_id'");
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
                                            <h5 class="m-b-10">Data Pengajuan</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="feather icon-align-justify"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Panel</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Data Pengajuan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Pengajuan</h5>
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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tggl Pengajuan</th>
                                                        <th>Nama Suami</th>
                                                        <th>Nama Istri</th>
                                                        <th width="100">Status</th>
                                                        <th width="150">Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($get_data as $dta) {
                                                        $pendaftar_id = $dta['pendaftar_id'];

                                                        $pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
                                                        $dft = mysqli_fetch_assoc($pendaftar);
                                                        $desa_id = $dft['desa_id'];

                                                        $data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
                                                        $data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
                                                        $data_wl = mysqli_query($conn, "SELECT * FROM tb_data_wali WHERE pendaftar_id='$pendaftar_id'");
                                                        $periksa = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE pendaftar_id='$pendaftar_id'");

                                                        $data_desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
                                                        $dsm = mysqli_fetch_assoc($data_sm);
                                                        $dis = mysqli_fetch_assoc($data_is);
                                                        $dwl = mysqli_fetch_assoc($data_wl);
                                                        $pmr = mysqli_fetch_assoc($periksa);
                                                        $des = mysqli_fetch_assoc($data_desa);

                                                        if ($dta['status'] == 'ditinjau') {
                                                            $warna = 'info';
                                                            $disabled = true;
                                                        } else if ($dta['status'] == 'disetujui') {
                                                            $warna = 'success';
                                                        } else if ($dta['status'] == 'ditolak') {
                                                            $warna = 'danger';
                                                            $tolak = true;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><?= date('d/m/Y', strtotime($dta['tggl_pengajuan'])) ?></td>
                                                        <td><?= $dsm['nama'] ?></td>
                                                        <td><?= $dis['nama'] ?></td>
                                                        <td>
                                                            <span
                                                                class="badge badge-<?= $warna ?>"><?= strtoupper($dta['status']) ?></span>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if (isset($tolak)) { ?>
                                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                                data-target="#modalKeterangan"><i
                                                                    class="fa fa-info-circle"></i> Keterangan</button>
                                                            <?php } else {
                                                                    if (isset($disabled)) { ?>
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                title="Pengajuan Anda masih ditinjau" disabled><i
                                                                    class="fa fa-download"></i> Download</button>
                                                            <?php } else { ?>
                                                            <button class="btn btn-sm btn-success print"><i
                                                                    class="fa fa-download"></i> Download</button>
                                                            <?php }
                                                                } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
</div>

<div id="modalKeterangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalKeteranganTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKeteranganTitle">Keterangan (Alasan Penolakan Pengajuan)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <b>Keterangan:</b><br>
                <p class="mb-0"><?= $dta['keterangan'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div id="print-surat" class="p-5" style="font-size: 14px; border: 1px solid;" hidden="">
    <div class="">
        <h3 class="text-center"><b><u>DUPLIKAT KUTIPAN AKTA NIKAH</u><br>NOMOR :
                B-57/Kua.<?= date('d.m.Y') ?>/DN/XI/<?= date('Y') ?></b></h3><br>
    </div>
    <div class="row">
        <div style="width: 55%;">
            <div class=""><b>I. Akta nikah nomor</b></div>
            <div class="">Pada hari, tanggal, bulan, tahun</div>
        </div>
        <div style="width: 45%;">
            <div class="">: <?= $dft['no_pendaftarn'] ?></div>
            <div class="">: <?= date('d m Y', strtotime($dft['tggl_akad'])) ?></div>
            <br>
        </div>
    </div>
    <dl>
        <dt>
            <h4><b>SUAMI</b></h4>
        </dt>
        <div class="row">
            <ol style="width: 50%;">
                <li>Nama lengkap dan alias</li>
                <li>Tempat dan tanggal lahir</li>
                <li>Warga Negara</li>
                <li>Agama</li>
                <li>Pekerjaan</li>
                <li>Tempat tinggal</li>
                <li>Status sebelum Menikah</li>
                <div class="row">
                    <li class="col-sm-5 ml-2 p-0" style="width: 45%;">Orang tua kandung</li>
                    <span class="col-sm-5 text-right" style="width: 45%;">Ayah</span>
                    <span class="text-right" style="width: 90%;">Ibu</span>
                </div>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: <?= $dsm['nama'] ?></li>
                <li>: <?= $dsm['tempat_lahir'] . ', ' . date('d F Y', strtotime($dis['tggl_lahir'])) ?></li>
                <li>: <?= $dsm['warga_negara'] ?></li>
                <li>: <?= $dsm['agama'] ?></li>
                <li>: <?= $dsm['pekerjaan'] ?></li>
                <li>: <?= $dsm['alamat'] ?></li>
                <li>: <?= $dsm['status'] ?></li>
                <li>: <?= $pmr['nama_as'] ?></li>
                <li>: <?= $pmr['nama_is'] ?></li>
            </ul>
        </div>
    </dl>
    <dl>
        <dt>
            <h4><b>ISTRI</b></h4>
        </dt>
        <div class="row">
            <ol style="width: 50%;">
                <li>Nama lengkap dan alias</li>
                <li>Tempat dan tanggal lahir</li>
                <li>Warga Negara</li>
                <li>Agama</li>
                <li>Pekerjaan</li>
                <li>Tempat tinggal</li>
                <li>Status sebelum Menikah</li>
                <div class="row">
                    <li class="col-sm-5 ml-2 p-0" style="width: 45%;">Orang tua kandung</li>
                    <span class="col-sm-5 text-right" style="width: 45%;">Ayah</span>
                    <span class="text-right" style="width: 90%;">Ibu</span>
                </div>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: <?= $dis['nama'] ?></li>
                <li>: <?= $dis['tempat_lahir'] . ', ' . date('d F Y', strtotime($dis['tggl_lahir'])) ?></li>
                <li>: <?= $dis['warga_negara'] ?></li>
                <li>: <?= $dis['agama'] ?></li>
                <li>: <?= $dis['pekerjaan'] ?></li>
                <li>: <?= $dis['alamat'] ?></li>
                <li>: <?= $dis['status'] ?></li>
                <li>: <?= $pmr['nama_ai'] ?></li>
                <li>: <?= $pmr['nama_ii'] ?></li>
            </ul>
        </div>
    </dl>
    <dl>
        <dt>
            <h4><b>WALI NIKAH</b></h4>
        </dt>
        <div class="row">
            <ol style="width: 50%;">
                <li>Status wali (nasab/hakim)</li>
                <li>Hubungan wali/sebab</li>
                <li>Nama lengkap dan alias</li>
                <li>Bin</li>
                <li>Tempat dan tanggal lahir</li>
                <li>Agama</li>
                <li>Pekerjaan</li>
                <li>Alamat tempat tinggal</li>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: <?= $dwl['status'] ?></li>
                <li>: <?= $dwl['hubungan'] ?></li>
                <li>: <?= $dwl['nama'] ?></li>
                <li>: <?= $dwl['bin'] ?></li>
                <li>: <?= $dwl['tempat_lahir'] . ', ' . date('d F Y', strtotime($dwl['tggl_lahir'])) ?></li>
                <li>: <?= $dwl['agama'] ?></li>
                <li>: <?= $dwl['pekerjaan'] ?></li>
                <li>: <?= $dwl['alamat'] ?></li>
            </ul>
        </div>
    </dl>
    <dl>
        <dt>
            <h4><b>MAS KAWIN</b></h4>
        </dt>
        <div class="row">
            <ol style="width: 50%;">
                <li>Berupa apa dan berapa</li>
                <li>Pembayaran (Tunai/Hutang)</li>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: <?= $pmr['jenis_mk'] ?></li>
                <!-- <li>: <?= $pmr['jenis_mk'] . ' (' . $pmr['jumlah_mk'] . ')' ?></li> -->
                <li>: <?= $pmr['pembayaran_mk'] ?></li>
            </ul>
        </div>
    </dl>
    <dl>
        <dt><b>II. Perjanjian Perkawinan</b></dt>
        <div class="row">
            <ol style="width: 50%;" type="none">
                <li>Jika ada perjanjian sebutkan</li>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: -</li>
            </ul>
        </div>
    </dl>
    <dl>
        <dt><b>III. Jika perjanjian nikah berdasarkan putusan pengadilan, sebutkan</b></dt>
        <div class="row">
            <ol style="width: 50%;">
                <li>Pengadilan yang memutuskan</li>
                <li>Nomor dan tanggal putusan</li>
            </ol>
            <ul style="width: 50%;" type="none">
                <li>: -</li>
                <li>: -</li>
            </ul>
        </div>
    </dl>

    <div class="text-center" style="width: 50%; text-align: left; float: right;">Sorong, <?= date('d M Y') ?></div>
    <br>
    <div class="text-center" style="width: 50%; text-align: left; float: right;">Sebagai Duplikat sesuai dengan akta
        nikahnya</div><br>
    <div class="text-center" style="width: 50%; text-align: left; float: right;">Pegawai Pencatatan Nikah Kepulauan
        Sorong</div><br><br><br><br><br>
    <div class="text-center" style="width: 50%; text-align: left; float: right;">Nama KETUA</div>

</div>

<!-- [ Main Content ] end -->
<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('.print').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#print-surat').printArea();
    });
});
</script>