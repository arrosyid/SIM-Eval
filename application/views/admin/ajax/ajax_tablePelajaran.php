<?php $i = 1; ?>
<?php foreach ($pelajaran as $P) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $P['kelas'] . ' ' . $P['bidang'] . ' ' . $P['nomor_kelas'] ?></td>
    <td><?= $P['mapel'] ?></td>
    <td><?= $P['semester'] ?></td>
    <td><?= $P['thn_pelajaran'] ?></td>
    <td>
      <a href="" data-toggle="modal" data-target="#editPelajaran" id="<?= $P['id_pelajaran'] ?>" class="badge badge-success view-data">edit</a>
      <a href="#" class="badge badge-danger">hapus</a>
    </td>
  </tr>
  <?php $i++; ?>
<?php endforeach; ?>