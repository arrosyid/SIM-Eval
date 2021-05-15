<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Mata Pelajaran</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Table" class="table table-bordered table-striped">
          <a href="<?= base_url('admin/tambahMapel') ?>" class="col-2 mb-4 btn btn-primary btn-block">
            Tambah Mata Pelajaran</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($mapel == null) {
              echo '<tr><td colspan="5">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($mapel as $M) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $M['mapel'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/delete/mapel/') . $M['id_mapel'] ?>" class="badge badge-danger">hapus</a>
                  </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>