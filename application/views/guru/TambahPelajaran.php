<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Mata Pelajaran Kelas</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="id_kelas" id="id_kelas">
                  <option value="">PILIH KELAS</option>
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Mata Pelajaran</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="id_mapel" id="id_mapel">
                  <option value="">PILIH MATA PELAJARAN</option>
                  <option value=""></option>
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
                <input type="text" class="form-control" name="semester" id="semester" placeholder="Isi Semester" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>tahun pelajaran</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="thn_pelajaran" id="thn_pelajaran" placeholder="Isi Tahun Pelajaran" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Pelajaran</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>