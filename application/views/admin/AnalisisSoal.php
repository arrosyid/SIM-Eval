<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Analisis Soal</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-4">
          <div class="col-sm-3">
            <div class="form-grup">
              <select class="form-control" name="ujian" id="ujian">
                <option value="">PILIH UJIAN</option>
                <?php foreach ($ujian as $U) : ?>
                  <option value="<?= $U['id_ujian'] ?>"><?= $U['mapel'] . ', ' . $U['jenis_ujian'] . ', ' . date("d-m-Y", $U['tgl_ujian']) ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <p>Pilih untuk memfilter analisis soal berdasarkan ujian</p>
          </div>
        </div>
        <div id="table-data">
          <h5 class="text-center">PILIHAN GANDA</h5>
          <table id="Tables1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
                <th rowspan="2" class="text-center align-middle">Kriteria Soal</th>
                <th colspan="5" class="text-center align-middle">Jumlah Jawab</th>
                <th colspan="2" class="text-center align-middle">Jumlah Benar</th>
                <th colspan="5" class="text-center align-middle">Pengecoh</th>
                <th rowspan="2" class="text-center align-middle">Tingkat Kesukaran</th>
                <th rowspan="2" class="text-center align-middle">Daya Pembeda</th>
              </tr>
              <tr>
                <?php for ($i = 'A'; $i <= 'E'; $i++) {
                  echo "<th>$i</th>";
                } ?>
                <th>Atas</th>
                <th>Bawah</th>
                <?php for ($i = 'A'; $i <= 'E'; $i++) {
                  echo "<th>$i</th>";
                } ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
                <th rowspan="2" class="text-center align-middle">Kriteria Soal</th>
                <?php for ($i = 'A'; $i <= 'E'; $i++) {
                  echo "<th>$i</th>";
                } ?>
                <th>Atas</th>
                <th>Bawah</th>
                <?php for ($i = 'A'; $i <= 'E'; $i++) {
                  echo "<th>$i</th>";
                } ?>
                <th rowspan="2" class="text-center align-middle">Tingkat Kesukaran</th>
                <th rowspan="2" class="text-center align-middle">Daya Pembeda</th>
              </tr>
              <tr>
                <th colspan="5" class="text-center align-middle">Jumlah Jawab</th>
                <th colspan="2" class="text-center align-middle">Jumlah Benar</th>
                <th colspan="5" class="text-center align-middle">Pengecoh</th>
              </tr>
            </tfoot>
          </table>
          <br>

          <h5 class="text-center">URAIAN</h5>
          <table id="Tables2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
                <th rowspan="2" class="text-center align-middle">Kriteria Soal</th>
                <th colspan="2" class="text-center align-middle">Rata-Rata Skor</th>
                <th rowspan="2" class="text-center align-middle">Rata-Rata Benar</th>
                <th rowspan="2" class="text-center align-middle">Tingkat Kesukaran</th>
                <th rowspan="2" class="text-center align-middle">Daya Pembeda</th>
              </tr>
              <tr>
                <th>Atas</th>
                <th>Bawah</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
                <th rowspan="2" class="text-center align-middle">Kriteria Soal</th>
                <th>Atas</th>
                <th>Bawah</th>
                <th rowspan="2" class="text-center align-middle">Rata-Rata Benar</th>
                <th rowspan="2" class="text-center align-middle">Tingkat Kesukaran</th>
                <th rowspan="2" class="text-center align-middle">Daya Pembeda</th>
              </tr>
              <tr>
                <th colspan="2" class="text-center align-middle">Rata-Rata Skor</th>
              </tr>
            </tfoot>
          </table>
          <br>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>