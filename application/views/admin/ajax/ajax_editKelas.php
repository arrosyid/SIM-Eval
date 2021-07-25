<form action="" method="POST">
  <div class="row">
    <div class="col-sm-2">
      <label>Wali Kelas</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="<?= $kelas['id_kelas'] ?>">
        <select class="form-control <?= form_error('id_guru') != null ? "is-invalid" : "" ?>" name="id_guru" id="id_guru">
          <option value="">PILIH WALI KELAS</option>
          <?php foreach ($guru as $G) { ?>
            <option <?= set_select('id_guru') != null ? set_select('id_guru', $G['id_guru']) : ($G['nm_guru'] == $kelas['nm_guru'] ? 'selected' : '') ?> value="<?= $G['id_guru'] ?>"><?= $G['nm_guru'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Kelas</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('kelas') != null ? "is-invalid" : "" ?>" name="kelas" id="kelas">
          <option <?= $kelas['kelas'] == '' ? 'selected' : '' ?> value="">PILIH KELAS</option>
          <option <?= set_select('kelas') != null ? set_select('kelas', $kelas['kelas']) : ($kelas['kelas'] == 'VII' ? 'selected' : '') ?> value="VII">VII</option>
          <option <?= set_select('kelas') != null ? set_select('kelas', $kelas['kelas']) : ($kelas['kelas'] == 'VIII' ? 'selected' : '') ?> value="VIII">VIII</option>
          <option <?= set_select('kelas') != null ? set_select('kelas', $kelas['kelas']) : ($kelas['kelas'] == 'IX' ? 'selected' : '') ?> value="IX">IX</option>
        </select>
        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Bidang</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('bidang') != null ? "is-invalid" : "" ?>" name="bidang" id="bidang" placeholder="Isi Bidang" value="<?= set_value('bidang') != null ? set_value('bidang') : $kelas['bidang'] ?>">
        <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Nomor Kelas</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('nomor_kelas') != null ? "is-invalid" : "" ?>" name="nomor_kelas" id="nomor_kelas" placeholder="Isi Nomor Kelas" value="<?= set_value('nomor_kelas') != null ? set_value('nomor_kelas') : $kelas['nomor_kelas'] ?>">
        <?= form_error('nomor_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Jumlah Siswa</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('jml_siswa') != null ? "is-invalid" : "" ?>" name="jml_siswa" id="jml_siswa" placeholder="Isi Jumlah Siswa" value="<?= set_value('jml_siswa') != null ? set_value('jml_siswa') : $kelas['jml_siswa'] ?>">
        <?= form_error('jml_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="editKelas" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>