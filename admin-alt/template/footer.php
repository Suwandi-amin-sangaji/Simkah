<!-- MODAL EDIT AKUN -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-edt-akun">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kelola Akun Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        <div class="modal-body px-5" style="margin-bottom: -20px;">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required autocomplete="off" placeholder="Username" value="<?= $adm['username'] ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" autocomplete="off" placeholder="Password">
            <span class="text-info text-sm">Note: Masukkan password baru untuk mengganti password!</span>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary" name="update_akun">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<footer class="main-footer">
  Copyright &copy;<script>
    document.write(new Date().getFullYear());
  </script> Direktorat Jenderal Bimbingan Masyarakat Islam | All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.instagram.com/auliaulfiana/?hl=id" target="_blank">VIVI</a>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
JQVMap
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/printjs/print.min.js"></script>
<script src="../js/jquery.PrintArea.js"></script>
<!-- Page specific script -->

<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
  $(function() {
    $("#dataTablelaporan").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print", ]
    }).buttons().container().appendTo('#dataTablelaporan_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function() {
    $(document).tooltip({
      selector: '[data-toggle1="tooltip"]'
    });
    $('#dataTable').DataTable();
  });
</script>
</body>

</html>

<?php
// Update Akun
if (isset($_POST['update_akun'])) {
  $id = $adm['id'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  if ($_POST['password'] != '')
    $query_updt = "UPDATE tb_admin SET username='$username', password='$password' WHERE id='$id'";
  else
    $query_updt = "UPDATE tb_admin SET username='$username' WHERE id='$id'";

  $updt = mysqli_query($conn, $query_updt);
  if ($updt) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Update Berhasil',
        text: 'Akun Login berhasil di update',
        preConfirm: () => {
          window.location.href = window.location.href;
        }
      });
    </script>
<?php }
}
?>