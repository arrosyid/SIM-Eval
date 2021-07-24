<form role="form" action="" method="POST" id="isi-form">
  <div class="row">
    <div class="col-sm-2">
      <label>Nama Siswa</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('id_siswa') != null ? "is-invalid" : "" ?>" name="id_siswa" id="id_siswa">
          <option value="">PILIH NAMA SISWA</option>
          <?php foreach ($siswa as $S) { ?>
            <option <?= set_select('id_siswa') != null ? set_select('id_siswa', $S['id_siswa']) : ($S['id_siswa'] == $soal['id_siswa'] ? 'selected' : '') ?> value="<?= $S['id_siswa'] ?>"><?= $S['nm_siswa'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>UJIAN</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('id_ujian') != null ? "is-invalid" : "" ?>" name="id_ujian" id="id_ujian">
          <option value="">PILIH UJIAN</option>
          <?php foreach ($ujian as $U) { ?>
            <option <?= set_select('id_ujian') != null ? set_select('id_ujian', $U['id_ujian']) : ($U['id_ujian'] == $soal['id_ujian'] ? 'selected' : '') ?> value="<?= $U['id_ujian'] ?>"><?= $U['jenis_ujian'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Jenis Soal</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('jenis_soal') != null ? "is-invalid" : "" ?>" name="jenis_soal" id="jenis_soal">
          <option value="">PILIH SOAL</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Pilihan Ganda') : ($soal['jenis_soal'] == 'Pilihan Ganda' ? 'selected' : '') ?> value="Pilihan Ganda">Pilihan Ganda</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Uraian') : ($soal['jenis_soal'] == 'Uraian' ? 'selected' : '') ?> value="Uraian">Uraian</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', 'Lainnya') : ($soal['jenis_soal'] == 'Lainnya' ? 'selected' : '') ?> value="Lainnya">Lainnya</option>
        </select>
        <?= form_error('jenis_soal', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
    <div class="col-sm-5" id="soal_jenis_lainnya">
      <div class="form-group">
        <input type="text" class="form-control" name="" placeholder="Isi Jenis Soal">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>