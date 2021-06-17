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

<!-- Stylesheet -->
<style>
  /* Dashboard */
  .dashboard-card {
    box-shadow: 0px 8px 5px rgba(0, 0, 0, 0.03);
    border-radius: 5px;
    padding: 1.5rem 1rem;
  }
  .card-orange {
    background: linear-gradient(113.02deg, rgba(255, 77, 0, 0.63) 1.33%, rgba(255, 122, 0, 0.63) 54.21%, rgba(255, 168, 0, 0.63) 99.23%, rgba(255, 168, 0, 0.63) 99.24%, rgba(255, 214, 0, 0.63) 99.24%);
  }
  .card-blue {
    background: linear-gradient(113.02deg, rgba(86, 59, 255, 0.63) 1.33%, rgba(9, 175, 246, 0.63) 54.21%, rgba(19, 223, 236, 0.63) 99.22%, rgba(255, 168, 0, 0.63) 99.23%, rgba(255, 168, 0, 0.63) 99.24%, rgba(30, 215, 215, 0.63) 99.24%);
  }
  .card-gray {
    background: linear-gradient(113.02deg, rgba(77, 88, 103, 0.63) 1.33%, rgba(158, 172, 179, 0.63) 54.21%, rgba(180, 191, 191, 0.63) 99.21%, rgba(19, 223, 236, 0.63) 99.22%, rgba(255, 168, 0, 0.63) 99.23%, rgba(255, 168, 0, 0.63) 99.24%, rgba(137, 137, 137, 0.63) 99.24%);
  }
  .card-purple {
    background: linear-gradient(113.02deg, rgba(173, 0, 255, 0.63) 1.33%, rgba(207, 76, 209, 0.63) 54.21%, rgba(208, 99, 255, 0.63) 99.2%, rgba(180, 191, 191, 0.63) 99.21%, rgba(19, 223, 236, 0.63) 99.22%, rgba(255, 168, 0, 0.63) 99.23%, rgba(255, 168, 0, 0.63) 99.24%, rgba(237, 42, 241, 0.63) 99.24%);
  }

  /* Jumbotron for ProfileSekolah.php & ProfileAdmin.php */
  .jumbotron-bg {
    background: url("https://images.unsplash.com/photo-1553526777-5ffa3b3248d8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"), linear-gradient(to bottom, #ADB2B6, #ABAEB3);
    background-size: cover;
    background-position: bottom;
  }
</style>

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
      $('#kelas').on('change', function() {
        var id_kelas = $('#kelas').val();
        console.log(id_kelas);
        $.ajax({
          url: "<?= $user['level'] == 1 ? base_url('admin/ajax') :  base_url('guru/ajax') ?>",
          method: "post",
          data: {
            ajax_menu: 'get_Allpelajaran',
            id_kelas: id_kelas
          },
          success: function(data) {
            console.log('editable success');
            $('#table-data').html(data);
          }
        });
      });

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

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  function displayAlert(deleteUrl) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data yang sudah di hapus tidak bisa di kembalikan lagi",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = deleteUrl;
      }
    })
  }

  const deleteButtons = [
    '.delete-daftar-guru', 
    '.delete-daftar-siswa', 
    '.delete-mapel-btn', 
    '.delete-daftar-kelas',
    '.delete-daftar-soal'
  ]

  for (const btn of deleteButtons) {
    $(btn).on('click', function(e) {
      displayAlert($(this).data('url'));
    });
  }
  
</script>
<!-- End Sweet Alert -->

<!-- Input Lainnya -->
<script>
  const forms = [
    {input: '#mapel_lainnya', select: "#id_mapel"},
    {input: '#kelas_lainnya', select: "#id_kelas"},
    {input: '#kelas_wali_lainnya', select: "#id_guru"},
    {input: '#kelas_bidang_lainnya', select: "#bidang"},
    {input: '#kelas_kelas_lainnya', select: "#kelas"},
    {input: '#soal_mapel_lainnya', select: "#id_mapel"},
    {input: '#soal_jenis_lainnya', select: "#jenis_soal"},
    {input: '#soal_kelas_lainnya', select: "#id_kelas"},
  ]

  forms.forEach(i => {
    $(i.input).hide();
    $(i.select).change(function() {
    if ($(this).val() == "Lainnya") {
      $(i.input).show();
    } else {
      $(i.input).hide();
    }
    })
  })

</script>
<!-- End Input Lainnya -->


</body>

</html>