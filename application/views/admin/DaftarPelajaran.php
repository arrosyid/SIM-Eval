<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Mata Pelajaran Kelas IX 2</h3>
      </div>
      <div class="card-body">
        <table id="Table" class="table table-bordered table-striped">
          <div class="row mb-4">
            <div class="col-sm-3">
              <a href="" data-toggle="modal" data-target="#tambahPelajaran" class="btn btn-primary btn-block">
                Tambah Mata Pelajaran Kelas</a>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-3">
              <div class="form-grup">
                <select class="form-control" name="id_kelas" id="id_kelas">
                  <option value="1">1</option>
                  <option value="a">a</option>
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
          <tbody>
            <tr>
              <td>1</td>
              <td>VII 2</td>
              <td>Bahasa Indonesia</td>
              <td>Genap</td>
              <td>2019/2020</td>
              <td>
                <a href="" data-toggle="modal" data-target="#editPelajaran" id="<?= $S['id_guru'] ?>" class="badge badge-success view-data">edit</a>
                <a href="#" class="badge badge-danger">hapus</a>
              </td>
            </tr>
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
                    <select class="form-control" name="id_kelas" id="id_kelas">
                      <option value="">PILIH KELAS</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Mata Pelajaran</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select class="form-control" name="id_mapel" id="id_mapel">
                      <option value="">PILIH MAPEL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Semester</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select class="form-control" name="semester" id="semester">
                      <option value="">PILIH SEMESTER</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Tahun Pelajaran</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control" name="thn_pelajaran" id="thn_pelajaran" placeholder="Tambahkan Tahun Pelajaran">
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
          <div class="modal-body" id="DetailPelajaran">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>