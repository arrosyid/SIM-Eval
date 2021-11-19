<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Siswa</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message1'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <button type="button" class="col-2 mb-4 btn btn-primary btn-block" data-toggle="modal" data-target="#tambahSiswa">
            Tambah Siswa</button>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($siswa == null) {
              echo '<tr><td colspan="5">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($siswa as $S) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $S['nm_siswa'] ?></td>
                  <td><?= $S['nis'] ?></td>
                  <td><?= $S['kelas'] . ' ' . $S['bidang'] . ' ' . $S['nomor_kelas'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>