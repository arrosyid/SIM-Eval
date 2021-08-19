<?php
if (isset($nilai)) {
  $i = 1;
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
  endforeach;
} ?>