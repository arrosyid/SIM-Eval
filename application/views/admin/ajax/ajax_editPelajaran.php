<form action="" method="POST">
  <div class="mb-3">
    <strong>Edit Mata Pelajaran</strong>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Kelas</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <select class="form-control <?= form_error('id_kelas') != null ? "is-invalid" : "" ?>" name="id_kelas" id="id_kelas">
          <option value="">PILIH KELAS</option>
          <?php foreach ($kelas as $K) : ?>
            <option <?= set_select('id_kelas') != null ? set_select('id_kelas', $K['id_kelas']) : ($K['id_kelas'] == $pelajaran['id_kelas'] ? 'selected' : '') ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
          <?php endforeach ?>
        </select>
        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Mata Pelajaran</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <select class="form-control <?= form_error('id_mapel') != null ? "is-invalid" : "" ?>" name="id_mapel" id="id_mapel">
          <option value="">PILIH MATA PELAJARAN</option>
          <?php foreach ($mapel as $M) { ?>
            <option <?= set_select('id_mapel') != null ? set_select('id_mapel', $M['id_mapel']) : ($M['mapel'] == $pelajaran['mapel'] ? 'selected' : '') ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Semester</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <select class="form-control <?= form_error('semester') != null ? "is-invalid" : "" ?>" name="semester" id="semester">
          <option <?= $pelajaran['semester'] == null ? 'selected' : '' ?> value="">PILIH SEMESTER</option>
          <option <?= set_select('semester') != null ? set_select('semester', $pelajaran['semester']) : ($pelajaran['semester'] == 'GANJIL' ? 'selected' : '') ?> value="GANJIL">GANJIL</option>
          <option <?= set_select('semester') != null ? set_select('semester', $pelajaran['semester']) : ($pelajaran['semester'] == 'GENAP' ? 'selected' : '') ?> value="GENAP">GENAP</option>
        </select>
        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Tahun Pelajaran</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('thn_pelajaran') != null ? "is-invalid" : "" ?>" name="thn_pelajaran" id="thn_pelajaran" placeholder="Tambahkan Tahun Pelajaran" value="<?= set_value('thn_pelajaran') != null ? set_value('thn_pelajaran') : $pelajaran['thn_pelajaran'] ?>">
        <?= form_error('thn_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahPelajaran" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>