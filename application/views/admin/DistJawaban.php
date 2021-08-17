<?php
// data dibawah dikirim dari controller ke variable pg dan uraian
//array dalam jenis adalah jenis soal dan jumlah soals
$jenis = [
  ['PILIHAN GANDA', 2],
  ['URAIAN', 2]
];
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Distribusi jawaban</h3>
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
          </div>
        </div>
        <div id="table-data">
          <a href="<?= base_url('admin/skor') ?>" class="btn btn-primary">Lihat Skor</a>
          <?php $a = 1;
          foreach ($jenis as $J => $val) : ?>
            <!-- data table yg uraian tidak bisa diuggah -->
            <h5 class="text-center"><?= $val[0] ?></h5>
            <table id="Tables<?= $a ?>" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th rowspan="2" class="text-center align-middle">No</th>
                  <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                  <th colspan="<?= $val[1] ?>" class="text-center align-middle">nomor</th>
                  <?= $val[0] == 'URAIAN' ? '<th rowspan="2" class="text-center align-middle">status</th>' : '' ?>
                </tr>
                <tr>
                  <?php for ($i = 1; $i <= $val[1]; $i++) {
                    echo "<th>$i</th>";
                  } ?>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <th rowspan="2" class="text-center align-middle">No</th>
                  <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                  <?php for ($i = 1; $i <= $val[1]; $i++) {
                    echo "<th>$i</th>";
                  } ?>
                  <?= $val[0] == 'URAIAN' ? '<th rowspan="2" class="text-center align-middle">status</th>' : '' ?>
                </tr>
                <tr>
                  <th colspan="<?= $val[1] ?>" class="text-center align-middle">nomor</th>
                </tr>
              </tfoot>
            </table>
            <br>
          <?php $a++;
          endforeach; ?>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>