<?php
require('layout/header.php');
?>

<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="banner_content">
                <p class="upper_text">SELAMAT DATANG</p>
                <h2 style="margin-bottom: -10px;">DI SIMKAH</h2>
                <!-- <h3>Sistem Informasi Manajemen Nikah</h3> -->
                <h3 class="mt-0" style="text-shadow: 2px 2px grey;">
                    SISTEM INFORMASI MANAJEMEN NIKAH <br>
                </h3>
                <h3 class="mt-0 mb-5" style="text-shadow: 2px 2px grey; margin-bottom: 80px;">
                    Sorong Papua Barat
                </h3>
                <hr>
                <div class="alert alert-info" role="alert">

                    Sistem ini dapat digunakan oleh masyarakat yang kehilangan atau kerusakan buku nikah untuk
                    mengajukan permintaan duplikat buku nikah. Silahkan <b>Klik tombol</b> dibawah ini untuk melanjutkan
                    pengajuan permintaan duplikat buku nikah

                </div>
                <!-- <a class="primary_btn mr-20" href="#">Survei</a> -->
                <a href="user/daftar.php" class="primary_btn">Pengajuan Permintaan Duplikat Buku
                    Nikah</a>
            </div>
        </div>
    </div>
</section>
<section class="info_pendaftaran" id="info_pendaftaran">
    <div class="container">
        <h1 class="text-center" style="color: #fff; padding-top: 35px;">Info Pendaftaran Nikah</h1>
        <div class="panel panel-default" style="margin-top: 20px;">
            <div class="panel-heading">
                <h4>Alur Pendaftaran</h4>
            </div>
            <div class="panel-body text-center">
                <img src="img/alur.png" style="height: 1000px;">
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Dokumen Persyaratan Pendaftaran Nikah</h4>
            </div>
            <div class="panel-body" style="padding-left: 40px;">
                <p><b>Dasar : PMA Nomor 20 Tahun 2019</b></p>
                <p><b>Siapkan : </b></p>
                <ul>
                    <li>NIK Calon Suami</li>
                    <li>NIK Calon Istri</li>
                    <li>NIK Orang Tua/Wali</li>
                </ul>
                <br>
                <p><b>Berikut dokumen-dokumen yang dibutuhkan untuk daftar nikah : </b></p>
                <p>N1 - Surat Pengantar Nikah (Didapat dari Kelurahan/Desa)</p>
                <p>N3 - Surat Persetujuan Mempelai</p>
                <p>N5 - Surat Izin Orang Tua (Jika calon pengantin umurnya dibawah 21 tahun)</p>
                <p>Surat Akta Cerai (Jika calon pengantin sudah cerai)</p>
                <p>Surat Izin Komandan (Jika calon pengantin TNI atau POLRI)</p>
                <p>Surat Akta Kematian (Jika calon pengantin duda/janda ditinggal mati)</p>
                <p>Izin/Dispensasi dari Pengadilan Agama Apabila : </p>
                <ul>
                    <li>Calon Suami Kurang dari 19 Tahun</li>
                    <li>Calon Istri Kurang dari 19 Tahun</li>
                    <li>Izin Poligami</li>
                </ul>
                <p>Izin dari Kedutaan Besar untuk WNA</p>
                <p>Fotocopy Identitas Diri (KTP)</p>
                <p>Fotocopy Kartu Keluarga</p>
                <p>Fotocopy Akta Lahir</p>
                <p>Surat Rekomendasi Nikah dari KUA Kecamatan (Jika nikah dilangsungkan di luar wilayah tempat tinggal
                    catin)</p>
                <p>Pasphoto ukuran 2 x 3 sebanyak 5 lembar</p>
                <p>Pasphoto ukuran 4 x 6 sebanyak 2 lembar</p>
            </div>
        </div>
    </div>
</section>

<?php
require('layout/footer.php');
?>