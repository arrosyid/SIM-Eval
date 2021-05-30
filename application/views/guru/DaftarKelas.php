<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Kelas</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Wali Kelas</th>
              <th>Tahun/Kelas</th>
              <th>Bidang</th>
              <th>Nomor Kelas</th>
              <th>jml_siswa</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($kelas == null) {
              echo '<tr><td colspan="7">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($kelas as $K) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $K['nm_guru'] ?></td>
                  <td><?= $K['kelas'] ?></td>
                  <td><?= $K['bidang'] ?></td>
                  <td><?= $K['nomor_kelas'] ?></td>
                  <td><?= $K['jml_siswa'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Wali Kelas</th>
              <th>Tahun/Kelas</th>
              <th>Bidang</th>
              <th>Nomor Kelas</th>
              <th>jml_siswa</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

  </div>
</section>