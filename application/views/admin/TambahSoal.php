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
                <select class="form-control" name="id_mapel" id="id_mapel">
                  <option value="">PILIH MATA PELAJARAN</option>
                  <?php foreach ($mapel as $M) { ?>
                    <option <?= set_select('id_mapel', $M['id_mapel']) ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
                  <?php } ?>
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
                  <option <?= set_select('jenis_soal', 'Pilihan Ganda UH') ?> value="Pilihan Ganda UH">Pilihan Ganda UH</option>
                  <option <?= set_select('jenis_soal', 'Uraian UH') ?> value="Uraian UH">Uraian UH</option>
                  <option <?= set_select('jenis_soal', 'Pilihan Ganda PTS') ?> value="Pilihan Ganda PTS">Pilihan Ganda PTS</option>
                  <option <?= set_select('jenis_soal', 'Uraian PTS') ?> value="Uraian PTS">Uraian PTS</option>
                  <option <?= set_select('jenis_soal', 'Pilihan Ganda PAS') ?> value="Pilihan Ganda PAS">Pilihan Ganda PAS</option>
                  <option <?= set_select('jenis_soal', 'Uraian PAS') ?> value="Uraian PAS">Uraian PAS</option>
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
                <select class="form-control" name="id_kelas" id="id_kelas">
                  <option value="">PILIH KELAS</option>
                  <?php foreach ($kelas as $K) : ?>
                    <option <?= set_select('id_kelas', $K['id_kelas']) ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                  <?php endforeach ?>
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
                <input type="text" class="form-control" name="jml_soal" id="jml_soal" placeholder="Isi Jumlah Soal" value="<?= set_value('jml_soal') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kopetensi Dasar</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="kd" id="kd" placeholder="Isi Kopetensi Dasar" value="<?= set_value('kd') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>KKM</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="kkm" id="kkm" placeholder="Isi  Kriteria Ketuntasan Minimal (KKM)" value="<?= set_value('kkm') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nilai Maksimal</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="skor_max" id="skor_max" placeholder="isi Nilai Maksimal" value="<?= set_value('skor_max') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal Ujian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="<?= set_value('tgl_ujian') ?>">
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