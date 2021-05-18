<form role="form" action="" method="POST">
  <div class="row">
    <div class="col-sm-2">
      <label>Mata Pelajaran</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control" name="id_mapel" id="id_mapel">
          <option value="">PILIH MATA PELAJARAN</option>
          <?php foreach ($mapel as $M) { ?>
            <option <?= $M['mapel'] == $soal['mapel'] ? 'selected' : ''; ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>;
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
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control" name="id_kelas" id="id_kelas">
          <option value="">PILIH KELAS</option>
          <?php foreach ($kelas as $K) : ?>
            <option <?= $K['id_kelas'] == $soal['id_kelas'] ? 'selected' : ''; ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
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
        <input type="text" class="form-control" name="jml_soal" id="jml_soal" placeholder="Isi Jumlah Soal" value="<?= set_value('jml_soal') != null ? set_value('jml_soal') :  $soal['jml_soal'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Kompetensi Dasar</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="kd" id="kd" placeholder="Isi Kompetensi Dasar" value="<?= set_value('kd') != null ? set_value('kd') :  $soal['kd'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>KKM</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="kkm" id="kkm" placeholder="Isi Kriteria Ketuntasan Minimal (KKM)" value="<?= set_value('kkm') != null ? set_value('kkm') :  $soal['kkm'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Nilai Maksimal</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="skor_max" id="skor_max" placeholder="isi Nilai Maksimal" value="<?= set_value('skor_max') != null ? set_value('skor_max') :  $soal['skor_max'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Tanggal Ujian</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="date" class="form-control" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="<?= set_value('tgl_ujian') != null ? set_value('tgl_ujian') :  date('Y-m-d', $soal['tgl_ujian']) ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>