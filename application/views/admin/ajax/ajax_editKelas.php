<form action="" method="POST">
  <div class="row">
    <div class="col-sm-2">
      <label>Wali Kelas</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control" name="id_guru" id="id_guru">
          <option value="">PILIH WALI KELAS</option>
          <?php foreach ($guru as $G) { ?>
            <option <?= $G['nm_guru'] == $kelas['nm_guru'] ? 'selected' : ''; ?> value="<?= $G['id_guru'] ?>"><?= $G['nm_guru'] ?></option>;
          <?php } ?>
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
        <select class="form-control" name="kelas" id="kelas">
          <option <?= $kelas['mapel'] == '' ? 'selected' : ''; ?> value="">PILIH KELAS</option>
          <option <?= $kelas['mapel'] == 'VII' ? 'selected' : ''; ?> value="VII">VII</option>
          <option <?= $kelas['mapel'] == 'VIII' ? 'selected' : ''; ?> value="VIII">VIII</option>
          <option <?= $kelas['mapel'] == 'IX' ? 'selected' : ''; ?> value="IX">IX</option>
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
        <input type="text" class="form-control" name="bidang" id="bidang" placeholder="Isi Bidang" value="<?= set_value('bidang') != null ? set_value('bidang') : $kelas['bidang'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Nomor Kelas</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="nomor_kelas" id="nomor_kelas" placeholder="Isi Nomor Kelas" value="<?= set_value('nomor_kelas') != null ? set_value('nomor_kelas') : $kelas['nomor_kelas'] ?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Jumlah Siswa</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="jml_siswa" id="jml_siswa" placeholder="Isi Jumlah Siswa" value="<?= set_value('jml_siswa') != null ? set_value('jml_siswa') : $kelas['jml_siswa'] ?>">
      </div>
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>