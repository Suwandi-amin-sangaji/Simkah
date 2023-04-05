<?php
require('layout/header.php');
if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);
    $res = mysqli_query($conn, "INSERT INTO tb_pesan ( nama, email, pesan) VALUES ('$nama', '$email', '$pesan')");
    if ($res) $response = 'success_add';
    else $response = 'error';
}


// $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
// for ($bulan = 1; $bulan < 13; $bulan++) {
//     $query = mysqli_query($conn, "select sum(no_pendaftarn) as no_pendaftarn from tb_pendaftar where MONTH(tanggal_daftar)='$bulan'");
//     $row = $query->fetch_array();
//     $jumlah_daftar[] = $row['no_pendaftarn'];
// }
?>

<section class="py-0">
    <div class="bg-holder" style="background-image:url(template/assets/img/illustrations/dot.png);background-position:left;background-size:auto;margin-top:-105px;">
    </div>

    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-md-1 pt-8"><img class="img-fluid" src="template/assets/img/illustrations/love.png" alt="" /></div>
            <div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
                <h1 class="mb-4 display-5 fw-bold">Sekarang Ngurus Nikah<br class="d-block d-lg-none d-xl-block" />Bisa
                    Online Loh.</h1>
                <p class="mt-3 mb-4 fs-1">Ngurus Nikah Sendiri<br class="d-none d-lg-block" />Menjadi Mudah Dan
                    Menyenangkan</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="daftar" role="button">Daftar Nikah</a>
            </div>
        </div>
    </div>
</section>

<section class="info_pendaftaran py-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <h4 class="fw-bold">Visi & Misi</h4>
                <hr class="w-25 mx-auto text-dark" style="height:2px;" />

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-2">
                Mewujudkan layanan keagamaan yang prima,kredibel dan moderat
            </div>
        </div>

    </div>
</section>



<section class="py-5" id="pendaftaran_offline">
    <div class="bg-holder" style="background-image:url(template/assets/img/illustrations/services-bg.png);background-position:center left;background-size:auto;">
    </div>
    <div class="bg-holder" style="background-image:url(template/assets/img/illustrations/dot-2.png);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
    </div>
    <!--/.bg-holder-->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <h4 class="fw-bold">Alur Pendaftaran Offline</h4>
                <hr class="w-25 mx-auto text-dark" style="height:2px;" />
            </div>
        </div>
        <div class="row justify-content-center h-80 pt-7 g-4">
            <div class="col-sm-4 col-md-4">
                <div class="card h-80 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step_1_offline.svg" height="70" alt="" />
                        </div>
                        <div class="py-6">
                            <h4 class="fw-bold card-title">Langkah Pertama</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li>Mendatangi RT/RW untuk mengurus surat pengantar nikah yang akan dibawa
                                    oleh
                                    calon pengantin ke kelurahan.</li>
                                <li> Mendatangi kantor kelurahan untuk mengurus surat pengantar nikah (N1-N4)
                                    yang
                                    akan dibawa oleh calon pengantin ke KUA Kecamatan.</li>
                                <li>Apabila pernikahan diadakan diluar kecamatan setempat, maka perlu mengurus
                                    surat
                                    rekomendasi nikah untuk dibawa ke KUA kecamatan tempat calon pengantin
                                    melaksanakan akad nikah.</li>
                                <li>Apabila pernikahan kurang dari 10 hari kerja, Maka mendatangi kantor
                                    kecamatan
                                    tempat akad nikah untuk memohon dispensasi nikah jika kurang dari 10 hari
                                    kerja.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step_2_offline.svg" height="90" alt="" />
                        </div>
                        <div class="py-3">
                            <h4 class="fw-bold card-title">Langkah Kedua</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li>Melakukan pendaftaran nikah di KUA tempat dilaksanakan akad nikah.</li>
                                <li>Apabila pernikahan dilakukan di kantor KUA, maka biaya pernikahan GRATIS.
                                </li>
                                <li>Apabila pernikahan di luar kantor KUA, maka membayar biaya sebesar
                                    Rp.600.000 di BANK persepsi yang ada di wilayah KUA tempat menikah, dan
                                    menyerahkan slip setoran bea nikah ke KUA tempat akad nikah.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-4">
                <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step_3_offline.svg" height="90" alt="" />
                        </div>
                        <div class="py-4">
                            <h4 class="fw-bold card-title">Langkah Ketiga</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li> Pemeriksaan data nikah calon pengantin dan wali nikah di KUA tempat akad
                                    nikah
                                    oleh petugas KUA.</li>
                                <li>Pelaksanaan akad nikah dan penyerahan buku nikah di lokasi nikah apabila
                                    pernikahan dilaksanakan diluar kantor KUA.</li>
                                <li>Pelaksanaan akad nikah dan penyerahan buku nikah di kantor KUA apabila
                                    pernikahan dilaksanakan di kantor KUA.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pendaftaran Online -->

<section class="py-8" id="pendaftaran_online">
    <div class="bg-holder" style="background-image:url(template/assets/img/illustrations/services-bg.png);background-position:center left;background-size:auto;">
    </div>
    <div class="bg-holder" style="background-image:url(template/assets/img/illustrations/dot-2.png);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
    </div>
    <!--/.bg-holder-->

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <h4 class="fw-bold">Alur Pendaftaran Online</h4>
                <hr class="w-25 mx-auto text-dark" style="height:2px;" />
            </div>
        </div>
        <div class="row justify-content-center h-100 pt-7 g-4">
            <div class="col-sm-4 col-md-4">
                <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step1_online.svg" height=" 90" alt="" />
                        </div>
                        <div class="py-7">
                            <h4 class="fw-bold card-title">Langkah Pertama</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li>Kunjungi Website SIMKAH <a href="#">https://simkahdom.com</a>
                                </li>
                                <li> Silahkan Klik Menu Daftar Nikah</li>
                                <li>Kamu akan di arahkan ke menu dashboard area, silahkan lengkapi data diri
                                    kamu.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step_2_offline.svg" height="90" alt="" />
                        </div>
                        <div class="py-3">
                            <h4 class="fw-bold card-title">Langkah Kedua</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li>Pilih menu Daftar Nikah pada dashboard area.</li>
                                <li>Siapkan dokumen-dokumen yang diperlukan.
                                </li>
                                <li>Apabila pernikahan dilakukan di kantor KUA, maka biaya pernikahan GRATIS.
                                </li>
                                <li>Apabila pernikahan di luar kantor KUA, maka membayar biaya sebesar
                                    Rp.600.000
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-4">
                <div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
                    <div class="card-body text-center text-md-start">
                        <div class="py-3"><img class="img-fluid" src="template/assets/img/illustrations/step_3_offline.svg" height="90" alt="" />
                        </div>
                        <div class="py-5">
                            <h4 class="fw-bold card-title">Langkah Ketiga</h4>
                            <p class="card-text">
                            <ul align="justify">
                                <li> Pemeriksaan data nikah calon pengantin dan wali nikah di KUA tempat akad
                                    nikah
                                    oleh petugas KUA.</li>
                                <li> Pelaksanaan akad nikah dan penyerahan buku nikah di lokasi nikah apabila
                                    pernikahan dilaksanakan diluar kantor KUA.</li>
                                <li> Pelaksanaan akad nikah dan penyerahan buku nikah di kantor KUA apabila
                                    pernikahan dilaksanakan di kantor KUA.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- <section> begin ============================-->
<section class="py-6 py-lg-8" id="struktur">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h4 class="fw-bold">STRUKTUR ORGANISASI <br>
                    KANTOR URUSAN AGAMA (KUA) DISTRIK SORONG UTARA</h4>
                <hr class="w-25 mx-auto text-dark" />
            </div>
        </div>
        <div class="struktur">
            <img src="img/SO_N.png" alt="">
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-6 py-lg-8" id="faq">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <h4 class="fw-bold">FAQ</h4>
                <hr class="w-25 mx-auto text-dark" style="height:2px;" />
            </div>
        </div>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Setelah Melakukan Pendaftaran Online, Selanjutnya apa yang harus di lakukan ?
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <p>Langkah selanjutnya adalah masyarakat bisa datang ke KUA yang dituju untuk melakukan
                            pemeriksaan nikah dan membawa berkas yang diperlukan paling lambat 15 hari kerja
                            sesuai dengan PMA No. 20 Tahun 2019 Tentang Pencatatan Pernikahan. Jika sampai 15
                            hari kerja masyarakat tidak juga datang ke KUA yang dituju, maka berkas pendaftaran
                            online akan hangus dan harus mendaftar dari awal kembali.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->


<!-- <section class="py-8" id="testimonial">
    <div class="container">
        <div class="bg-holder z-index-1"
            style="background-image:url(template/assets/img/illustrations/dot.png);background-position:right top;background-size:auto;margin-left:-30px;margin-top:10px;filter:contrast(1.5);">
        </div>


        <div class="bg-holder z-index-1"
            style="background-image:url(template/assets/img/illustrations/dot-2.png);background-position:left bottom;background-size:auto;margin-left:-35px;margin-top:-65px;filter:contrast(1.5);">
        </div>

        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: '#Data nikah',
                    data: <?php echo json_encode($jumlah_daftar); ?>,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                    onProgress: function(animation) {
                        progress.value = animation.currentStep / animation.numSteps;
                    }
                }
            }
        });
        </script>


    </div>
</section> -->


<section class="section colored" id="contact-us">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-3 text-center">
                    <h4 class="fw-bold">Contact</h4>
                    <hr class="w-25 mx-auto text-dark" style="height:2px;" />
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <!-- ***** Contact Text Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h5 class="margin-bottom-30">Keep in touch</h5>
                <div class="contact-text">
                    <p>110-220 Quisque diam odio, maximus ac consectetur eu, 10260
                        <br>auctor non lorem
                    </p>
                    <p>You are NOT allowed to re-distribute Softy Pinko template on any template collection websites.
                        Thank you.</p>
                </div>
            </div>
            <!-- ***** Contact Text End ***** -->

            <!-- ***** Contact Form Start ***** -->
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="contact-form">
                    <form id="contact" action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <fieldset>
                                    <textarea name="pesan" rows="6" class="form-control" id="pesan" placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <fieldset>
                                    <button type="submit" name="submit" id="form-submit" class="btn btn-primary">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ***** Contact Form End ***** -->
        </div>
    </div>
</section>

<?php
require('layout/footer.php');
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        <?php if ($response == 'success_add') { ?>
            Swal.fire({
                icon: 'success',
                title: 'Pesan Terkirim',
                text: 'Pesan Terkirim',
                preConfirm: () => {
                    window.location.href = window.location.href;
                }
            });
        <?php } else if ($response == 'error') { ?>
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Terjadi kesalahan. Gagal Mengirim Pesan',
                preConfirm: () => {
                    window.location.href = window.location.href;
                }
            });
        <?php } ?>
    });
</script>