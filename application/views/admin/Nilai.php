<?php
// data dibawah dikirim dari controller ke variable pg dan uraian
//array dalam jenis adalah jenis soal dan jumlah soals
$nilai = [
  'Nomor', 'Nama Siswa', 'jumlah Skor Ujian', 'Nilai Ujian', 'Nilai Perbaikan', 'Nilai Akhir',
  'Ranking', 'Kelompok', 'Ketuntasan Belajar', 'Tindak Lanjut',
];
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Distribusi Nilai</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-4">
          <div class="col-sm-3">
            <div class="form-grup">
              <select class="form-control" name="ujian" id="ujian">
                <option value="">PILIH UJIAN</option>
                <?php foreach ($ujian as $U) : ?>
                  <option value="<?= $U['id_ujian'] ?>"><?= $U['mapel'] . ', ' . $U['jenis_ujian'] . ', ' . date("d-m-Y", $U['tanngal']) ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <table id="Tables" class="table table-bordered table-striped">
          <thead>
            <tr>
              <?php foreach ($nilai as $N => $val) {
                echo "<th>$val</th>";
              }  ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>aku</td>
              <td>12</td>
              <td>100</td>
              <td>50</td>
              <td>100</td>
              <td>1</td>
              <td>ATS</td>
              <td>tuntas</td>
              <td>PK1</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <?php foreach ($nilai as $N => $val) {
                echo "<th>$val</th>";
              }  ?>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>