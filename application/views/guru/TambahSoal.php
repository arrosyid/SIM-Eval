<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Soal</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Mata Pelajaran</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="mapel" id="mapel">
                  <option value="">PILIH MATA PELAJARAN</option>
                  <option value="">mapel 1</option>
                  <option value="">mapel 2</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="kelas" id="kelas">
                  <option value="">PILIH KELAS</option>
                  <option value="">Kelas 1</option>
                  <option value="">Kelas 2</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kopetensi Dasar</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="KD" id="KD" placeholder="Isi Kopetensi Dasar" value="">
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
              <label>KKM</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="kkm" id="kkm" placeholder="Isi  Kriteria Ketuntasan Minimal (KKM)" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal Ujian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jenis Soal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <!-- jadikan datepicker -->
                <input type="text" class="form-control" name="tgl_ujian" id="tgl_ujian" placeholder="isi Jenis Soal" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nilai Maksimal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="skor_max" id="skor_max" placeholder="isi Nilai Maksimal" value="">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>