<?php
require('template/header.php');
$cnt_dtnikah = mysqli_query($conn, "SELECT * FROM tb_pendaftar");
$cnt_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuan");
$cnt_penghulu = mysqli_query($conn, "SELECT * FROM tb_penghulu");
$cnt_desa = mysqli_query($conn, "SELECT * FROM tb_desa");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= mysqli_num_rows($cnt_dtnikah) ?></h3>

              <p>Data Nikah</p>
            </div>
            <a href="data-nikah.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= mysqli_num_rows($cnt_pengajuan) ?></h3>

              <p>Permintaan Duplikat Buku Nikah</p>
            </div>
            <a href="permintaan-baru.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= mysqli_num_rows($cnt_penghulu) ?></h3>

              <p>Data Penghulu</p>
            </div>
            <a href="data-penghulu.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= mysqli_num_rows($cnt_desa) ?></h3>

              <p>Desa/Kelurahan</p>
            </div>
            <a href="data-desa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <section class="home_banner_area">
        <div class="banner_inner">
          <div class="container">
            <div class="banner_content">
              <h2 class="center">SIMKAH SUL-SEL</h2>
            </div>
          </div>
        </div>
      </section>

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
require('template/footer.php');
?>

<script>
  $(document).ready(function() {
    $('#dashboard').addClass(' active');
  });
</script>