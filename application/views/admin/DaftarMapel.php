<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Mata Pelajaran</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <button type="button" class="col-2 mb-4 btn btn-primary btn-block" data-toggle="modal" data-target="#tambahMapel">
            Tambah Mata Pelajaran</button>
          <thead>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($mapel == null) {
              echo '<tr><td colspan="3">Data Tidak Di Temukan</td></tr>';
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

    <!-- tambah modal  -->
    <div class="modal fade" id="tambahMapel" tabindex="-1" aria-labelledby="edit_MapelLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_MapelLabel">Tambah Mata Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="" method="POST">
              <div class="row">
                <div class="col-sm-2">
                  <label>Mata Pelajaran</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control <?= form_error('mapel') != null ? "is-invalid" : "" ?>" name="mapel" id="mapel" placeholder="Isi Nama Mata Pelajaran" value="<?= set_value('mapel') ?>">
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  capthca
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Tambah Mata Pelajaran</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>