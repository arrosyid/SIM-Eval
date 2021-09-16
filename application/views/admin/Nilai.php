<?php
$tb_nilai = [
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
                  <option value="<?= $U['id_ujian'] ?>"><?= $U['mapel'] . ', ' . $U['jenis_ujian'] . ', ' . date("d-m-Y", $U['tgl_ujian']) ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <p>Pilih untuk memfilter nilai siswa berdasarkan ujian</p>
          </div>
        </div>
        <table id="Tables" class="table table-bordered table-striped">
          <thead>
            <tr>
              <?php foreach ($tb_nilai as $N => $val) {
                echo "<th>$val</th>";
              }  ?>
            </tr>
          </thead>
          <tbody id="table-data">
            <?php $i = 1;
            foreach ($nilai as $N) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $N['nm_siswa'] ?></td>
                <td><?= $N['jml_skor_ujian'] ?></td>
                <td><?= $N['nilai_ujian'] ?></td>
                <td><?= $N['nilai_perbaikan'] ?></td>
                <td><?= $N['nilai_akhir'] ?></td>
                <td><?= $N['ranking'] ?></td>
                <td><?= $N['kelompok'] ?></td>
                <td><?= $N['tuntas_belajar'] == 1 ? 'Tuntas' : 'Tidak Tuntas' ?></td>
                <td><?= $N['tindak_lanjut'] ?></td>
              </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <?php foreach ($tb_nilai as $N => $val) {
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