<form role="form" action="" method="POST">
  <div class="row">
    <div class="col-sm-2">
      <label>Mata Pelajaran</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('id_mapel') != null ? "is-invalid" : "" ?>" name="id_mapel" id="id_mapel">
          <option value="">PILIH MATA PELAJARAN</option>
          <?php foreach ($mapel as $M) { ?>
            <option <?= set_select('id_kelas') != null ? set_select('id_kelas', $K['id_kelas']) : ($M['mapel'] == $soal['mapel'] ? 'selected' : '') ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Jenis Soal</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <select class="form-control <?= form_error('jenis_soal') != null ? "is-invalid" : "" ?>" name="jenis_soal" id="jenis_soal">
          <option value="">PILIH SOAL</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Pilihan Ganda UH') : ($sekolah['jenis_soal'] == 'Pilihan Ganda UH' ? 'selected' : '') ?> value="Pilihan Ganda UH">Pilihan Ganda UH</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Uraian UH') : ($sekolah['jenis_soal'] == 'Uraian UH' ? 'selected' : '') ?> value="Uraian UH">Uraian UH</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Pilihan Ganda PTS') : ($sekolah['jenis_soal'] == 'Pilihan Ganda PTS' ? 'selected' : '') ?> value="Pilihan Ganda PTS">Pilihan Ganda PTS</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Uraian PTS') : ($sekolah['jenis_soal'] == 'Uraian PTS' ? 'selected' : '') ?> value="Uraian PTS">Uraian PTS</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Pilihan Ganda PAS') : ($sekolah['jenis_soal'] == 'Pilihan Ganda PAS' ? 'selected' : '') ?> value="Pilihan Ganda PAS">Pilihan Ganda PAS</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Uraian PAS') : ($sekolah['jenis_soal'] == 'Uraian PAS' ? 'selected' : '') ?> value="Uraian PAS">Uraian PAS</option>
        </select>
        <?= form_error('jenis_soal', '<small class="text-danger pl-3">', '</small>'); ?>
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
            <option <?= set_select('id_kelas') != null ? set_select('id_kelas', $K['id_kelas']) : ($K['id_kelas'] == $soal['id_kelas'] ? 'selected' : '') ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
          <?php endforeach ?>
        </select>
        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Jumlah Soal</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('jml_soal') != null ? "is-invalid" : "" ?>" name="jml_soal" id="jml_soal" placeholder="Isi Jumlah Soal" value="<?= set_value('jml_soal') != null ? set_value('jml_soal') :  $soal['jml_soal'] ?>">
        <?= form_error('jml_soal', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Kompetensi Dasar</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('kd') != null ? "is-invalid" : "" ?>" name="kd" id="kd" placeholder="Isi Kompetensi Dasar" value="<?= set_value('kd') != null ? set_value('kd') :  $soal['kd'] ?>">
        <?= form_error('kd', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>KKM</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('kkm') != null ? "is-invalid" : "" ?>" name="kkm" id="kkm" placeholder="Isi Kriteria Ketuntasan Minimal (KKM)" value="<?= set_value('kkm') != null ? set_value('kkm') :  $soal['kkm'] ?>">
        <?= form_error('kkm', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Nilai Maksimal</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('skor_max') != null ? "is-invalid" : "" ?>" name="skor_max" id="skor_max" placeholder="isi Nilai Maksimal" value="<?= set_value('skor_max') != null ? set_value('skor_max') :  $soal['skor_max'] ?>">
        <?= form_error('skor_max', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Tanggal Ujian</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="date" class="form-control <?= form_error('tgl_ujian') != null ? "is-invalid" : "" ?>" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="<?= set_value('tgl_ujian') != null ? set_value('tgl_ujian') :  date('Y-m-d', $soal['tgl_ujian']) ?>">
        <?= form_error('tgl_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>