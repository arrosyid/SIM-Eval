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
            <td><?= $j ?></td>
            <td><?= $P['no_soal'] ?></td>
            <td><?= $P['ket_soal'] ?></td>
            <td><?= $P['jml_jwbA'] ?></td>
            <td><?= $P['jml_jwbB'] ?></td>
            <td><?= $P['jml_jwbC'] ?></td>
            <td><?= $P['jml_jwbD'] ?></td>
            <td><?= $P['jml_jwbE'] == null ? '' : $P['jml_jwbE'] ?></td>
            <td><?= $P['jml_BenarAts'] ?></td>
            <td><?= $P['jml_BenarBwh'] ?></td>
            <td><?= $P['pengecoh_a'] ?></td>
            <td><?= $P['pengecoh_b'] ?></td>
            <td><?= $P['pengecoh_c'] ?></td>
            <td><?= $P['pengecoh_d'] ?></td>
            <td><?= $P['pengecoh_e'] == null ? '' : $P['pengecoh_e'] ?></td>
            <td><?= $P['tingkat_kesukaran'] ?></td>
            <td><?= $P['daya_pembeda'] ?></td>
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
            <td><?= $U['rerata_skor'] ?></td>
            <td><?= $U['ket_soal'] ?></td>
            <td><?= $U['rerata_skorats'] ?></td>
            <td><?= $U['rerata_skorbwh'] ?></td>
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
        <th rowspan="2" class="text-center align-middle">kriteria Soal</th>
        <th rowspan="2" class="text-center align-middle">Nomor Soal</th>
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