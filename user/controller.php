<?php
require('../config.php');

header('Content-type: application/json');
if (isset($_POST['req'])) {
    if ($_POST['req'] == 'cek_nik') {
        $nik = $_POST['nik'];
        $data_sm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE nik='$nik'");
        $dsm = mysqli_fetch_assoc($data_sm);
        $data_is = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE nik='$nik'");
        $dis = mysqli_fetch_assoc($data_is);

        $data = [];
        if ($dsm) {
            $pendaftar_id = $dsm['pendaftar_id'];
            $dta_nikah = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
            $dta = mysqli_fetch_assoc($dta_nikah);

            $desa_id = $dta['desa_id'];
            $desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
            $des = mysqli_fetch_assoc($desa);

            $get_dis = mysqli_query($conn, "SELECT * FROM tb_data_istri WHERE pendaftar_id='$pendaftar_id'");
            $dis_ = mysqli_fetch_assoc($get_dis);

            $data = [
                'desa' => $des['nama_desa'],
                'tempat_nikah' => $dta['tempat_nikah'],
                'tggl_akad' => $dta['tggl_akad'],
                'nik_sm' => $dsm['nik'],
                'nama_sm' => $dsm['nama'],
                'pekerjaan_sm' => $dsm['pekerjaan'],
                'nik_is' => $dis_['nik'],
                'nama_is' => $dis_['nama'],
                'pekerjaan_is' => $dis_['pekerjaan'],
            ];
        } else if ($dis) {
            $pendaftar_id = $dis['pendaftar_id'];
            $dta_nikah = mysqli_query($conn, "SELECT * FROM tb_pendaftar WHERE id='$pendaftar_id'");
            $dta = mysqli_fetch_assoc($dta_nikah);

            $desa_id = $dta['desa_id'];
            $desa = mysqli_query($conn, "SELECT * FROM tb_desa WHERE id='$desa_id'");
            $des = mysqli_fetch_assoc($desa);

            $get_dsm = mysqli_query($conn, "SELECT * FROM tb_data_suami WHERE pendaftar_id='$pendaftar_id'");
            $dsm_ = mysqli_fetch_assoc($get_dsm);
            $data = [
                'desa' => $des['nama_desa'],
                'tempat_nikah' => $dta['tempat_nikah'],
                'tggl_akad' => $dta['tggl_akad'],
                'nik_sm' => $dsm_['nik'],
                'nama_sm' => $dsm_['nama'],
                'pekerjaan_sm' => $dsm_['pekerjaan'],
                'nik_is' => $dis['nik'],
                'nama_is' => $dis['nama'],
                'pekerjaan_is' => $dis['pekerjaan'],
            ];
        }

        echo json_encode($data);
    }
}