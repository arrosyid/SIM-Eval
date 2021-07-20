<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Mata Pelajaran Kelas IX 2</h3>
      </div>
      <div class="card-body">
        <table id="Tables" class="table table-bordered table-striped">
          <div class="row mb-4">
            <div class="col-sm-3">
              <a href="" data-toggle="modal" data-target="#tambahPelajaran" class="btn btn-primary btn-block">
                Tambah Mata Pelajaran Kelas</a>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-3">
              <div class="form-grup">
                <select class="form-control" name="kelas" id="kelas">
                  <option value="">PILIH KELAS</option>
                  <?php foreach ($kelasAll as $K) : ?>
                    <option value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <thead>
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Mata Pelajaran</th>
              <th>Semester</th>
              <th>Tahun pelajaran</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody id="table-data">
            <?php $i = 1; ?>
            <?php foreach ($pelajaran as $P) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $P['kelas'] . ' ' . $P['bidang'] . ' ' . $P['nomor_kelas'] ?></td>
                <td><?= $P['mapel'] ?></td>
                <td><?= $P['semester'] ?></td>
                <td><?= $P['thn_pelajaran'] ?></td>
                <td>
                  <a href="" data-toggle="modal" data-target="#editPelajaran" id="<?= $P['id_pelajaran'] ?>" class="btn btn-success view-data">edit</a>
                  <a href="#" data-url="<?= base_url('admin/delete/pelajaran/') . $M['id_pelajaran'] ?>" class="delete-pelajaran btn btn-danger">hapus</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Mata Pelajaran</th>
              <th>Semester</th>
              <th>Tahun pelajaran</th>
              <th>action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

    <!-- Tambah modal box -->
    <div class="modal fade" id="tambahPelajaran" tabindex="-1" aria-labelledby="edit_GuruLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_GuruLabel">Tambah Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                <strong>Tambah Mata Pelajaran</strong>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Kelas</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select class="form-control <?= form_error('id_kelas') != null ? "is-invalid" : "" ?>" name="id_kelas" id="id_kelas">
                      <option value="">PILIH KELAS</option>
                      <?php foreach ($kelasAll as $K) : ?>
                        <option <?= set_select('id_kelas', $K['id_kelas']) ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Mata Pelajaran</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select class="form-control <?= form_error('id_mapel') != null ? "is-invalid" : "" ?>" name="id_mapel" id="id_mapel">
                      <option value="">PILIH MATA PELAJARAN</option>
                      <?php foreach ($mapel as $M) { ?>
                        <option <?= set_select('id_mapel', $M['id_mapel']) ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Semester</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select class="form-control <?= form_error('semester') != null ? "is-invalid" : "" ?>" name="semester" id="semester">
                      <option value="">PILIH SEMESTER</option>
                      <option <?= set_select('id_mapel', "GANJIL") ?> value="GANJIL">GANJIL</option>
                      <option <?= set_select('id_mapel', "GENAP") ?> value="GENAP">GENAP</option>
                    </select>
                    <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Tahun Pelajaran</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control <?= form_error('thn_pelajaran') != null ? "is-invalid" : "" ?>" name="thn_pelajaran" id="thn_pelajaran" placeholder="Tambahkan Tahun Pelajaran" value=" <?= set_value('thn_pelajaran') ?> ">
                    <?= form_error('thn_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <input type="submit" name="tambahPelajaran" class="btn btn-danger" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit modal box -->
    <div class="modal fade" id="editPelajaran" tabindex="-1" aria-labelledby="edit_GuruLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_GuruLabel">Edit Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailPelajaran">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>