<?php
if (isset($pg) && isset($uo)) {
  $jenis = [
    ['PILIHAN GANDA', $ujian['jml_soalpg']],
    ['URAIAN', $ujian['jml_soaluo']]
  ];
} elseif (isset($pg)) {
  $jenis = [
    ['PILIHAN GANDA', $ujian['jml_soalpg']],
  ];
} elseif (isset($uo)) {
  $jenis = [
    ['URAIAN', $ujian['jml_soalou']]
  ];
} else {
  $jenis = [
    ['PILIHAN GANDA', 2],
    ['URAIAN', 2]
  ];
}
$a = 1;
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
      <?php
      if (isset($pg) || isset($uo)) :
        if ($val[0] == 'URAIAN') {
          // href kirim id siswa dan id ujian
          $koreksi = '<a href="' . base_url('admin/koreksi/') . '" class="btn btn-primary float-right">Koreksi jawaban</a>';
          $isi = $uo;
        } elseif ($val[0] == 'PILIHAN GANDA') {
          $isi = $pg;
        }
        $i = 1;
        foreach ($isi as $S) : ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= isset($koreksi) ? $S['nm_siswa'] . $koreksi : $S['nm_siswa'] ?></td>
            <?php for ($k = 1; $k <= $val[1]; $k++) : ?>
              <td><?= $S["no_$k"] ?>
              </td>
            <?php endfor;
            if ($S['status'] == 1) {
              $status = 'terkoreksi';
            } elseif ($S['status'] == 0) {
              $status = 'belum dikoreksi';
            }
            ?>
            <?= $val[0] == 'URAIAN' ? '<td>' . $status . '</td>' : '' ?>
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