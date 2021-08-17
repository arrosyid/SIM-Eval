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

<?php if ($tittle == 'dashboard') : ?>
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

    /* Dashbord Activity Monitor */
    .badge {
      width: 1.5rem;
      height: 1.5rem;
      border-radius: 50%;
    }

    .badge-green {
      background-color: #51CF66;
    }

    .badge-red {
      background-color: #D45151;
    }
  </style>
<?php endif ?>

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
<?php
if ($tittle != 'dashboard' || $tittle != 'Hasil Analisis') :
?>
  <script>
    $(function() {
      $('.table').DataTable({
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
<?php endif ?>

<?php if (isset($url_ajax)) : ?>
  <script>
    //------------------
    //- Modal Edit Box -
    //------------------
    $(function() {
      $('.view-data').on('click', function() {
        var <?= $id_ajax ?> = $(this).attr('id');
        console.log(<?= $id_ajax ?>);

        $.ajax({
          url: "<?= $url_ajax ?>",
          method: "post",
          data: {
            ajax_menu: '<?= $data_menu_ajax ?>',
            <?= $id_ajax ?>: <?= $id_ajax ?>
          },
          success: function(data) {
            $('<?= $html_ajax ?>').html(data);
            $('<?= $modal_ajax ?>').modal();
          }
        });
      });
    });
  </script>
<?php endif ?>

<?php if (isset($table_url_ajax)) : ?>
  <script>
    //------------------
    //- Modal Edit Box -
    //------------------
    $('<?= $table_ajax_dom ?>').on('change', function() {
      var <?= $table_id_ajax ?> = $('<?= $table_ajax_dom ?>').val();
      console.log(<?= $table_id_ajax ?>);
      $.ajax({
        url: "<?= $table_url_ajax ?>",
        method: "post",
        data: {
          ajax_menu: '<?= $table_ajax_menu ?>',
          <?= $table_id_ajax ?>: <?= $table_id_ajax ?>
        },
        success: function(data) {
          console.log('editable success');
          $('<?= $table_html_ajax ?>').html(data);
        }
      });
    });
  </script>
<?php endif ?>

<?php if (isset($tittle_sweets)) : ?>
  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <script>
    function displayAlert(deleteUrl) {
      Swal.fire({
        title: '<?= $tittle_sweets ?>',
        text: '<?= $text_sweets ?>',
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
      '.delete-pelajaran',
      '.delete-daftar-kelas',
      '.delete-daftar-ujian',
      '.delete-daftar-soal'
    ]

    for (const btn of deleteButtons) {
      $(btn).on('click', function(e) {
        displayAlert($(this).data('url'));
      });
    }
  </script>
  <!-- End Sweet Alert -->
<?php endif ?>

<!-- Input Lainnya -->
<script>
  const forms = [{
      // ada tapi akan dihapus
      input: '#mapel_lainnya',
      select: "#id_mapel"
    },
    {
      // ada tapi akan dihapus
      input: '#kelas_wali_lainnya',
      select: "#id_guru"
    },
    {
      // ada
      input: '#kelas_bidang_lainnya',
      select: "#bidang"
    },
    {
      // ada
      input: '#kelas_kelas_lainnya',
      select: "#kelas"
    },
    {
      // ada
      input: '#ujian_jenis_lainnya',
      select: "#jenis_ujian"
    },
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

<?php if ($tittle == 'Tambah Soal') : ?>
  <!-- Input soal -->
  <script>
    const jenis = [{
        input: '#pilihan-ganda',
        select: "#jenis_soal",
        valuation: "Pilihan Ganda"
      },
      {
        input: '#uraian',
        select: "#jenis_soal",
        valuation: "Uraian"
      },
      // {
      //   input: '#isi-form',
      //   select: "#pilihan-soal",
      //   valuation: "isi-form"
      // },
      // {
      //   input: '#upload-file',
      //   select: "#pilihan-soal",
      //   valuation: "upload-file"
      // },
      {
        input: '#soal_jenis_lainnya',
        select: "#jenis_soal",
        valuation: "Lainnya"
      },
    ]
    jenis.forEach(i => {
      $(i.input).hide();
      $(i.select).change(function() {
        if ($(this).val() == i.valuation) {
          // ditambahkan input post untuk mengirim
          $(i.input).show();
          // $.ajax({
          //   url: "<?= base_url('admin/tambahSoal') ?>",
          //   method: "post",
          //   data: {
          //     ajax_menu: 'tambah-soal',
          //     jenis_soal: i.valuation,
          //   },
          //   success: function(data) {
          //     $(i.input).show();
          //     // $('').html(data);
          //     // $('').modal();
          //   },
          // });
        } else {
          $(i.input).hide();
        };
      });
    });
  </script>
  <!-- End Input soal -->
<?php endif ?>

<?php if ($tittle == 'dashboard') : ?>
  <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.js"></script>
  <!-- Import Chart -->

  <!-- Chart Dashboard -->
  <script>
    var chartKelompok = document.getElementById('chartKelompok').getContext('2d');
    var myChart = new Chart(chartKelompok, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($kelompokTitle); ?>,
        datasets: [{
          label: 'Kelompok',
          data: <?php echo json_encode($kelompokData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartProgram = document.getElementById('chartProgram').getContext('2d');
    var myChart = new Chart(chartProgram, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($programTitle); ?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($programData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF',
            '#9B51E0',
            '#E6E5E6',
            '#EC6363',
            '#65DC71'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartKetuntasan = document.getElementById('chartKetuntasan').getContext('2d');
    var myChart = new Chart(chartKetuntasan, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($grafikTitle); ?>,
        datasets: [{
          data: <?php echo json_encode($grafikKetuntasanBelajar); ?>,
          label: "Ketuntasan Belajar",
          borderColor: "#3e95cd",
          fill: false
        }, {
          data: <?php echo json_encode($grafikRataRataNilai); ?>,
          label: "Rata-rata Nilai",
          borderColor: "#8e5ea2",
          fill: false
        }, {
          data: <?php echo json_encode($grafikRataRataSkor); ?>,
          label: "Rata-rata Skor",
          borderColor: "#3cba9f",
          fill: false
        }, {
          data: <?php echo json_encode($grafikRataRataNilaiAkhir); ?>,
          label: "Rata-rata Nilai Akhir",
          borderColor: "#e8c3b9",
          fill: false
        }]
      },
      options: {
        legend: {
          position: "right",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });
  </script>
  <!-- End Chart Dashboard -->
<?php elseif ($tittle == 'Hasil Analisis') : ?>
  <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.js"></script>
  <!-- Chart Analisis -->
  <script>
    var chartTingkatKesukaran = document.getElementById('chartTingkatKesukaran').getContext('2d');
    var myChart = new Chart(chartTingkatKesukaran, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($tingkatKesukaranTitle); ?>,
        datasets: [{
          data: <?php echo json_encode($tingkatKesukaranKetuntasanBelajar); ?>,
          label: "Ketuntasan Belajar",
          borderColor: "#3e95cd",
          fill: false
        }, {
          data: <?php echo json_encode($tingkatKesukaranRataRataNilai); ?>,
          label: "Rata-rata Nilai",
          borderColor: "#8e5ea2",
          fill: false
        }, {
          data: <?php echo json_encode($tingkatKesukaranRataRataSkor); ?>,
          label: "Rata-rata Skor",
          borderColor: "#3cba9f",
          fill: false
        }, {
          data: <?php echo json_encode($tingkatKesukaranRataRataNilaiAkhir); ?>,
          label: "Rata-rata Nilai Akhir",
          borderColor: "#e8c3b9",
          fill: false
        }]
      },
      options: {
        legend: {
          position: "right",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartDayaPembeda = document.getElementById('chartDayaPembeda').getContext('2d');
    var myChart = new Chart(chartDayaPembeda, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($dayaPembedaTitle); ?>,
        datasets: [{
          data: <?php echo json_encode($dayaPembedaKetuntasanBelajar); ?>,
          label: "Ketuntasan Belajar",
          borderColor: "#3e95cd",
          fill: false
        }, {
          data: <?php echo json_encode($dayaPembedaRataRataNilai); ?>,
          label: "Rata-rata Nilai",
          borderColor: "#8e5ea2",
          fill: false
        }, {
          data: <?php echo json_encode($dayaPembedaRataRataSkor); ?>,
          label: "Rata-rata Skor",
          borderColor: "#3cba9f",
          fill: false
        }, {
          data: <?php echo json_encode($dayaPembedaRataRataNilaiAkhir); ?>,
          label: "Rata-rata Nilai Akhir",
          borderColor: "#e8c3b9",
          fill: false
        }]
      },
      options: {
        legend: {
          position: "right",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartAnalisisKelompok = document.getElementById('chartAnalisisKelompok').getContext('2d');
    var myChart = new Chart(chartAnalisisKelompok, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($analisisKelompokTitle); ?>,
        datasets: [{
          label: 'Kelompok',
          data: <?php echo json_encode($analisisKelompokData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartAnalisisNilai = document.getElementById('chartAnalisisNilai').getContext('2d');
    var myChart = new Chart(chartAnalisisNilai, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($analisisNilaiTitle); ?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($analisisNilaiData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF',
            '#9B51E0',
            '#E6E5E6',
            '#EC6363',
            '#65DC71'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    // Distribusi 

    var chartDistribusiKelompok = document.getElementById('chartDistribusiKelompok').getContext('2d');
    var myChart = new Chart(chartDistribusiKelompok, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($distribusiKelompokTitle); ?>,
        datasets: [{
          label: 'Kelompok',
          data: <?php echo json_encode($distribusiKelompokData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartDistribusiNilai = document.getElementById('chartDistribusiNilai').getContext('2d');
    var myChart = new Chart(chartDistribusiNilai, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($distribusiNilaiTitle); ?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($distribusiNilaiData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF',
            '#9B51E0',
            '#E6E5E6',
            '#EC6363',
            '#65DC71'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartDistribusiKetuntasan = document.getElementById('chartDistribusiKetuntasan').getContext('2d');
    var myChart = new Chart(chartDistribusiKetuntasan, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($distribusiKetuntasanTitle); ?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($distribusiKetuntasanData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF',
            '#9B51E0',
            '#E6E5E6',
            '#EC6363',
            '#65DC71'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });

    var chartDistribusiTindakLanjut = document.getElementById('chartDistribusiTindakLanjut').getContext('2d');
    var myChart = new Chart(chartDistribusiTindakLanjut, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($distribusiTindakLanjutTitle); ?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($distribusiTindakLanjutData); ?>,
          backgroundColor: [
            '#FB8832',
            '#007AFF',
            '#9B51E0',
            '#E6E5E6',
            '#EC6363',
            '#65DC71'
          ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            boxWidth: 6
          }
        }
      }
    });
  </script>
  <!-- End Chart Analisis -->
<?php endif ?>

</body>

</html>