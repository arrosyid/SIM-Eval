<?php
if (isset($soal)) {
  $i = 1;
  foreach ($soal as $S) : ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $S['soal'] ?></td>
      <td><?= $S['nomor_soal'] ?></td>
      <td><?= $S['skor_soal'] ?></td>
      <td><?= $S['jenis_soal'] ?></td>
      <td><?= $S['kunci'] ?></td>
      <td><?= $S['pilihan_a'] ?></td>
      <td><?= $S['pilihan_b'] ?></td>
      <td><?= $S['pilihan_c'] ?></td>
      <td><?= $S['pilihan_d'] ?></td>
      <td><?= $S['pilihan_e'] ?></td>
      <td><?= $S['status'] == 0 ? 'tidak aktif' : 'aktif' ?></td>
      <td>
        <a href="" data-toggle="modal" data-target="#editSoal" id="<?= $S['id_soal'] ?>" class="btn btn-success view-data">edit</a>
        <a href="#" data-url="<?= base_url('Delete/soal/') . $S['id_soal'] ?>" class="delete-daftar-soal btn btn-danger">hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach;
} ?>