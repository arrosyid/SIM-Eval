<?php if (isset($pg)) : ?>
  <h5 class="text-center">PILIHAN GANDA</h5>
  <table id="Tables1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th rowspan="2" class="text-center align-middle">No</th>
        <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
        <th rowspan="2" class="text-center align-middle">kriteria Soal</th>
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
      <?php if ($pg != null) :
        $j = 1;
        foreach ($pg as $P) : ?>
          <tr>
            <th><?= $j ?></th>
            <th><?= $P['no_soal'] ?></th>
            <th><?= $P['ket_soal'] ?></th>
            <th><?= $P['jml_jwbA'] ?></th>
            <th><?= $P['jml_jwbB'] ?></th>
            <th><?= $P['jml_jwbC'] ?></th>
            <th><?= $P['jml_jwbD'] ?></th>
            <th><?= $P['jml_jwbE'] == null ? '' : $P['jml_jwbE'] ?></th>
            <th><?= $P['jml_BenarAts'] ?></th>
            <th><?= $P['jml_BenarBwh'] ?></th>
            <th><?= $P['pengecoh_a'] ?></th>
            <th><?= $P['pengecoh_b'] ?></th>
            <th><?= $P['pengecoh_c'] ?></th>
            <th><?= $P['pengecoh_d'] ?></th>
            <th><?= $P['pengecoh_e'] == null ? '' : $P['pengecoh_e'] ?></th>
            <th><?= $P['tingkat_kesukaran'] ?></th>
            <th><?= $P['daya_pembeda'] ?></th>
          </tr>
      <?php $j++;
        endforeach;
      endif; ?>
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
<?php endif;
if (isset($uo)) : ?>
  <h5 class="text-center">URAIAN</h5>
  <table id="Tables2" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th rowspan="2" class="text-center align-middle">No</th>
        <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
        <th rowspan="2" class="text-center align-middle">kriteria Soal</th>
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
      <?php if ($uo != null) :
        $j = 1;
        foreach ($uo as $U) : ?>
          <tr>
            <td><?= $j ?></td>
            <td><?= $U['no_soal'] ?></td>
            <td><?= $U['ket_soal'] ?></td>
            <td><?= $U['rerata_skor'] ?></td>
            <td><?= $U['rerata_skorAts'] ?></td>
            <td><?= $U['rerata_skorBwh'] ?></td>
            <td><?= $U['tingkat_kesukaran'] ?></td>
            <td><?= $U['daya_pembeda'] ?></td>
          </tr>
      <?php $j++;
        endforeach;
      endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <th rowspan="2" class="text-center align-middle">No</th>
        <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
        <th rowspan="2" class="text-center align-middle">kriteria Soal</th>
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
<?php endif; ?>