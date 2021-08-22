<?php
$data_ujian = [
  ["Mata Pelajaran",  'Bahasa Indonesia'],
  ["KELAS", "VII 2"],
  ["KD", "2.3"],
  ["Jumlah Soal", "20"],
  ["Tanggal Ujian", "12 02 2021"],
  ["KKM", "7.5"],
  ["Jenis Soal", "Pilihan Ganda PTS"],
];
?>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <!-- PILIH SOAL -->
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">Pilih Soal</div>
              <div class="col-sm-8 text-secondary">
                <div class="form-group my-0">
                  <select class="form-control" name=" id_mapel" id="id_mapel">
                    <option value="">PILIH KELAS/JENIS SOAL</option>
                    <option value="Lainnya">Hola! Adios!</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PILIH SOAL -->

    <div class="row my-3">

      <!-- DATA SOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Data Ujian</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->
            <?php for ($i = 0; $i < count($data_ujian); $i++) { ?>
              <div class="row">
                <div class="col-sm-4"><?= $data_ujian[$i][0] ?></div>
                <div class="col-sm-8 text-secondary">
                  <?= $data_ujian[$i][1] ?>
                </div>
              </div>

              <?php if ($i < count($data_ujian) - 1) {
                echo "<hr>";
              }
              ?>
            <?php } ?>
            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END DATA SOAL -->

      <!-- DAFTAR SISWA -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Daftar Siswa</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END DAFTAR SISWA -->

      <!-- DISTRIBUSI JAWABAN -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Distribusi Jawaban</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END DISTRIBUSI JAWABAN -->

      <!-- ANALISIS SOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Analisis Soal</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END ANALISIS SOAL -->

      <!-- KESUKARAN PERSOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <p class="card-title">Tingkat Kesukaran Persoal</p>
          </div>
          <div class="card-body">
            <canvas id="chartTingkatKesukaran" width="100%" height="50px"></canvas>
          </div>
        </div>
      </div>
      <!-- END KESUKARAN PERSOAL -->

      <!-- DAYA PEMBEDA PERSOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <p class="card-title">Daya Pembeda Persoal</p>
          </div>
          <div class="card-body">
            <canvas id="chartDayaPembeda" width="100%" height="50px"></canvas>
          </div>
        </div>
      </div>
      <!-- END DAYA PEMBEDA PERSOAL -->

      <!-- KELOMPOK ATAS BAWAH TENGAH -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Kelompok Atas, Bawah dan Tengah</h4>
          </div>
          <div class="card-body">
            <canvas id="chartAnalisisKelompok" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END KELOMPOK ATAS BAWAH TENGAH -->

      <!-- NILAI -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Nilai</h4>
          </div>
          <div class="card-body">
            <canvas id="chartAnalisisNilai" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END NILAI -->

      <!-- KATEGORI SOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Kategori Soal</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END KATEGORI SOAL -->

      <!-- KESIMPULAN -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Kesimpulan</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- KESIMPULAN -->
    </div>

    <!-- PILIH DISTRIBUSI SOAL -->
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">Pilih Distribusi Soal</div>
              <div class="col-sm-8 text-secondary">
                <div class="form-group my-0">
                  <select class="form-control" name="id_mapel" id="id_mapel">
                    <option value="">PILIH KELAS/JENIS SOAL</option>
                    <option value="Lainnya">Hola! Adios!</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PILIH SOAL -->

    <div class="row my-3">

      <!-- DISTRIBUSI JAWABAN -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Distribusi Jawaban</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END DISTRIBUSI JAWABAN -->

      <!-- ANALISIS SOAL -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Analisis Soal</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- END ANALISIS SOAL -->

      <!-- KELOMPOK ATAS BAWAH TENGAH -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Kelompok Atas, Bawah dan Tengah</h4>
          </div>
          <div class="card-body">
            <canvas id="chartDistribusiKelompok" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END KELOMPOK ATAS BAWAH TENGAH -->

      <!-- NILAI -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Nilai</h4>
          </div>
          <div class="card-body">
            <canvas id="chartDistribusiNilai" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END NILAI -->

      <!-- KELOMPOK ATAS BAWAH TENGAH -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Ketuntasan Belajar</h4>
          </div>
          <div class="card-body">
            <canvas id="chartDistribusiKetuntasan" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END KELOMPOK ATAS BAWAH TENGAH -->

      <!-- NILAI -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Tindak Lanjut</h4>
          </div>
          <div class="card-body">
            <canvas id="chartDistribusiTindakLanjut" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <!-- END NILAI -->

      <!-- KESIMPULAN -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="card-title">Kesimpulan</h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->

            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <!-- KESIMPULAN -->
    </div>


  </div>
</div>