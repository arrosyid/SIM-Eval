<?php
// data dibawah dikirim dari controller ke variable pg dan uraian
//array dalam jenis adalah jenis soal dan jumlah soals
$pg = [
  ['AKU', 'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B', 'C', 'A', 'C', 'B'],
  ['AKU', 'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B', 'C', 'A', 'C', 'B'],
  ['AKU', 'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B', 'C', 'A', 'C', 'B'],
  ['AKU', 'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B', 'C', 'A', 'C', 'B'],
];
$uraian = [
  ['AKU', '1', '2', '3', '4', '5', '6', '7', '1', '2', '1', '2', '1', '2'],
  ['AKU', '1', '2', '3', '4', '5', '6', '7', '1', '2', '1', '2', '1', '2'],
  ['AKU', '1', '2', '3', '4', '5', '6', '7', '1', '2', '1', '2', '1', '2'],
  ['AKU', '1', '2', '3', '4', '5', '6', '7', '1', '2', '1', '2', '1', '2'],
];
if (isset($pg) && isset($uraian)) {
  $jenis = [
    ['PILIHAN GANDA', 12],
    ['URAIAN', 5]
  ];
} elseif (isset($pg)) {
  $jenis = [
    ['PILIHAN GANDA', 12],
  ];
} elseif (isset($uraian)) {
  $jenis = [
    ['URAIAN', 5]
  ];
}
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
                <option value="">PILIH Ujian</option>
                <?php foreach ($ujian as $U) : ?>
                  <option value="<?= $U['id_ujian'] ?>"><?= $U['mapel'] . ', ' . $U['jenis_ujian'] . ', ' . date("d-m-Y", $U['tanngal']) ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <?php foreach ($jenis as $J => $val) : ?>
          <table id="Tables" class="table table-bordered table-striped">
            <h5 class="text-center"><?= $val[0] ?></h5>
            <thead>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                <th colspan="<?= $val[1] ?>" class="text-center align-middle">nomor</th>
              </tr>
              <tr>
                <?php for ($i = 1; $i <= $val[1]; $i++) {
                  echo "<th>$i</th>";
                } ?>
              </tr>
            </thead>
            <tbody>
              <?php if ($val[0] == 'URAIAN') {
                $isi = $uraian;
              } elseif ($val[0] == 'PILIHAN GANDA') {
                $isi = $pg;
              } ?>
              <?php $i = 1;
              foreach ($isi as $S => $value) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <?php for ($k = 0; $k <= $val[1]; $k++) : ?>
                    <td><?= $value[$k] ?></td>
                  <?php endfor ?>
                </tr>
              <?php $i++;
              endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="2" class="text-center align-middle">No</th>
                <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                <?php for ($i = 1; $i <= $val[1]; $i++) {
                  echo "<th>$i</th>";
                } ?>
              </tr>
              <tr>
                <th colspan="<?= $val[1] ?>" class="text-center align-middle">nomor</th>
              </tr>
            </tfoot>
          </table>
          <br>
        <?php endforeach ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>