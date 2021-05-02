<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Kelas</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="kelas" id="kelas">
                  <option value="">PILIH KELAS</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Bidang</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="bidang" id="bidang">
                  <option value="">PILIH BIDANG</option>
                  <option value="IPA">IPA</option>
                  <option value="IPS">IPS</option>
                  <option value="BAHASA">BAHASA</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nomor_kelas" id="nomor_kelas" placeholder="Isi Nomor Kelas" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Soal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="jml_soal" id="jml_soal" placeholder="Isi Jumlah Soal" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Wali Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="id_guru" id="id_guru">
                  <option value="">PILIH WALI KELAS</option>
                  <option value="">guru a</option>
                  <option value="">guru b</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Siswa</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="jml_siswa" id="jml_siswa" placeholder="Isi Jumlah Siswa" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Mapel</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="jml_mapel" id="jml_mapel" placeholder="Isi Jumlah Mapel" value="">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>