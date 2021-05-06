<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Siswa</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">

          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Siswa yang ingin didaftarkan</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="loop" id="loop" maxlength="2" placeholder="Isi Jumlah Yang ingin di Inputkan">
              </div>
            </div>
          </div>

          <hr>
          <div class="loop-class" id="container">
            <div class="row">
              <div class="col-sm-2">
                <label>Nama Siswa</label>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" placeholder="Isi Nama Siswa" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>NIS</label>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" class="form-control" name="nis" id="nis" placeholder="Isi Nomor Induk Siswa" value="">
                </div>
              </div>
            </div>
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
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Siswa</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>