<?php
require('template/header.php');
// Hapus Data
if (isset($_GET['hapus_data'])) {
    $id = $_GET['idpesan'];
    $res = mysqli_query($conn, "DELETE FROM tb_pesan WHERE idpesan='$id'");
    if ($res) $response = 'success_delete';
    else $response = 'error';
}
$pesan = mysqli_query($conn, "SELECT * FROM tb_pesan");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Admin</a></li>
                        <li class="breadcrumb-item active">Pesan</li>
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
                                <h3>Pesan Masuk</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th width="150">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pesan as $dta) { ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dta['nama'] ?></td>
                                            <td><?= $dta['email'] ?></td>
                                            <td><?= $dta['pesan'] ?></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#modal-hapus<?= $dta['idpesan'] ?>"><i
                                                        class="fa fa-trash"></i> Hapus</a>
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


<?php foreach ($pesan as $dta) { ?>

<!-- MODAL HAPUS -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus<?= $dta['idpesan'] ?>">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    Yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a href="?hapus_data=true&id=<?= $dta['idpesan'] ?>" role="button" class="btn btn-danger"
                        name="edit_data">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php
require('template/footer.php');
?>

<script>
$(document).ready(function() {
    $('#').addClass('active');

    <?php if ($response == 'success_delete') { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Menghapus Data',
        text: 'Data telah berhasil di hapus',
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
});
</script>