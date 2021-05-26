</div>
<!-- /.content wraper-->
<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2021 | Argopuro Kurir.</strong>
  <div class="float-right">
    <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-google-plus-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
  </div>
</footer>
<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
<!-- /.wraper -->


<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
<!-- ChartJS -->
<!-- <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- overlayScrollbar -->
<script>
  // $(function() {
  //   //The passed argument has to be at least a empty object or a object with your desired options
  //   $("body").overlayScrollbars({});
  // });
  var osInstance = $('body').overlayScrollbars({}).overlayScrollbars();

  $('body').on('show.bs.modal', function() {
    setTimeout(function() {
      var osContentElm = $(osInstance.getElements().content);
      var backdropElms = $('body > .modal-backdrop');
      backdropElms.each(function(index, elm) {
        osContentElm.append(elm);
      });
    }, 1);
  });
</script>
<!-- ajax live search jQuery-->
<script>
  $(document).ready(function() {
    $('#keyword').on('keyup', function(e) {
      $('#container').load('<?= base_url('kurir/ajax') ?>?keyword=' + $('#keyword').val());
    });
  });
</script>
<!-- ajax live search -->
<!-- <script>
  // handling click button search
  var container = document.getElementById('container');
  var cari = document.getElementById('search');
  var keyword = document.getElementById('keyword');

  // cari.style.display = 'none';

  keyword.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        container.innerHTML = xhr.responseText;
        // console.log(xhr.responseText);
      }
    }
    xhr.open('get', '<?= base_url('kurir/ajax') ?>?keyword=' + keyword.value, true);
    xhr.send();
  });
</script> -->

<script>
  $(function() {
    $('#Tables').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  //------------------
  //- Modal Edit Box -
  //------------------
  $(function() {
    <?php if ($tittle == 'Daftar Siswa') : ?>
      $('.view-data').on('click', function() {
        var id_siswa = $(this).attr('id');
        console.log(id_siswa);

        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_siswa',
            id_siswa: id_siswa
          },
          success: function(data) {
            $('#detailSiswa').html(data);
            $('#editSiswa').modal();
          }
        });
      });

    <?php elseif ($tittle == 'Daftar Guru') : ?>
      $('.view-data').on('click', function() {
        var id_guru = $(this).attr('id');
        console.log(id_guru);

        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_guru',
            id_guru: id_guru
          },
          success: function(data) {
            $('#detailGuru').html(data);
            $('#editGuru').modal();
          }
        });
      });

    <?php elseif ($tittle == 'Daftar Soal') : ?>
      $('.view-data').on('click', function() {
        var id_soal = $(this).attr('id');
        console.log(id_soal);

        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_soal',
            id_soal: id_soal
          },
          success: function(data) {
            $('#detailSoal').html(data);
            $('#editSoal').modal();
          }
        });
      });

    <?php elseif ($tittle == 'Daftar Kelas') : ?>
      $('.view-data').on('click', function() {
        var id_kelas = $(this).attr('id');
        console.log(id_kelas);

        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_kelas',
            id_kelas: id_kelas
          },
          success: function(data) {
            $('#detailKelas').html(data);
            $('#editKelas').modal();
          }
        });
      });

    <?php elseif ($tittle == 'Daftar Pelajaran') : ?>
      $('.view-data').on('click', function() {
        var id_pelajaran = $(this).attr('id');
        console.log(id_pelajaran);

        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_pelajaran',
            id_pelajaran: id_pelajaran
          },
          success: function(data) {
            $('#detailPelajaran').html(data);
            $('#editPelajaran').modal();
          }
        });
      });
    <?php endif ?>
  });
</script>
</body>

</html>