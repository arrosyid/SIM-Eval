<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Siswa</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <button type="button" class="col-2 mb-4 btn btn-primary btn-block" data-toggle="modal" data-target="#tambahSiswa">
            Tambah Siswa</button>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Action</th>
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
                  <td>
                    <a href="" data-toggle="modal" data-target="#editSiswa" id="<?= $S['id_siswa'] ?>" class="badge badge-success view-data">edit</a>
                    <a href="#" data-url="<?= base_url('index.php/admin/delete/siswa/') . $S['id_siswa'] ?>" class="delete-daftar-siswa badge badge-danger">hapus</a>
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
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
    <!-- tambah modal  -->
    <div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="edit_SiswaLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_SiswaLabel">Tambah Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                <strong>SISWA</strong>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Nama Siswa</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control <?= form_error('nm_siswa') != null ? "is-invalid" : "" ?>" name="nm_siswa" id="nm_siswa" placeholder="Tambahkan Nama Siswa" value="<?= set_value('nm_siswa') ?>">
                    <?= form_error('nm_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>NIS</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control <?= form_error('nis') != null ? "is-invalid" : "" ?>" name="nis" id="nis" placeholder="Tambahkan Nomor Induk Siswa" value="<?= set_value('nis') ?>">
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Kelas</label>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <select class="form-control <?= form_error('id_kelas') != null ? "is-invalid" : "" ?>" name="id_kelas" id="id_kelas">
                      <option value="">PILIH KELAS</option>
                      <?php foreach ($kelas as $K) : ?>
                        <option <?= set_select('id_kelas', $K['id_kelas']) ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                      <?php endforeach ?>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                    <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-sm-5" id="kelas_lainnya">
                  <div class="form-group">
                    <input type="text" class="form-control" name="" placeholder="Isi Nama Kelas">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <input type="submit" name="tambahSiswa" class="btn btn-danger" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Mengubah data sesuai dengan data yang dipilih -->
    <div class="modal fade" id="editSiswa" tabindex="-1" aria-labelledby="edit_SiswaLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_SiswaLabel">Edit Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailSiswa">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>