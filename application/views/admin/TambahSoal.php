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
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jenis Soal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="jenis_soal" id="jenis_soal">
                  <option value="">PILIH SOAL</option>
                  <option value="Pilihan Ganda UH">Pilihan Ganda UH</option>
                  <option value="Uraian UH">Uraian UH</option>
                  <option value="Pilihan Ganda PTS">Pilihan Ganda PTS</option>
                  <option value="Uraian PTS">Uraian PTS</option>
                  <option value="Pilihan Ganda PAS">Pilihan Ganda PAS</option>
                  <option value="Uraian PAS">Uraian PAS</option>
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
                </select>
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
              <label>Nilai Maksimal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="skor_max" id="skor_max" placeholder="isi Nilai Maksimal" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal Ujian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Soal</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>