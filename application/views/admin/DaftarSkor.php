<!-- masih tidak bisa memuat yg uraian -->
<?php
if ($pg != null && $uo != null) {
  $jenis = [
    ['PILIHAN GANDA', $ujian['jml_soalpg']],
    ['URAIAN', $ujian['jml_soaluo']]
  ];
} elseif ($pg != null) {
  $jenis = [
    ['PILIHAN GANDA', $ujian['jml_soalpg']],
  ];
} elseif ($uo != null) {
  $jenis = [
    ['URAIAN', $ujian['jml_soaluo']]
  ];
} else {
  $jenis = [
    ['PILIHAN GANDA', 2],
    ['URAIAN', 2]
  ];
} ?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Distribusi Skor Siswa</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <a href="<?= base_url('admin/distJawaban') ?>" class="btn btn-primary">Lihat Jawaban</a>
        <?php $a = 1;
        foreach ($jenis as $J => $val) : ?>
          <h5 class="text-center"><?= $val[0] ?></h5>
          <table id="Tables<?= $a ?>" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                <th colspan="<?= $val[1] ?>" class="text-center align-middle">nomor</th>
                <th rowspan="2" class="text-center align-middle">Jumlah Skor</th>
                <th rowspan="2" class="text-center align-middle">Kelompok</th>
                <th rowspan="2" class="text-center align-middle">Nilai</th>
              </tr>
              <tr>
                <?php for ($i = 1; $i <= $val[1]; $i++) {
                  echo "<th>$i</th>";
                } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($pg != null || $uo != null) :
                if ($val[0] == 'URAIAN') {
                  $isi = $uo;
                } elseif ($val[0] == 'PILIHAN GANDA') {
                  $isi = $pg;
                }
                $i = 1;
                foreach ($isi as $S) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $S['nm_siswa'] ?></td>
                    <?php for ($k = 1; $k <= $val[1]; $k++) : ?>
                      <td><?= $S["no_$k"] ?>
                      </td>
                    <?php endfor; ?>
                    <td><?= $S['jml_skor'] ?></td>
                    <td><?= $S['kelompok'] ?></td>
                    <td><?= $S['nilai'] ?></td>
                  </tr>
              <?php $i++;
                endforeach;
              endif; ?>
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                <?php for ($i = 1; $i <= $val[1]; $i++) {
                  echo "<th>$i</th>";
                } ?>
                <th rowspan="2" class="text-center align-middle">Jumlah Skor</th>
                <th rowspan="2" class="text-center align-middle">Kelompok</th>
                <th rowspan="2" class="text-center align-middle">Nilai</th>
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
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>