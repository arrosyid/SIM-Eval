  <form action="" method="POST">
    <div class="row">
      <div class="col-sm-2">
        <label>Nama Siswa</label>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" placeholder="Isi Nama Siswa" value="<?= set_value('nm_siswa') != null ? set_value('nm_siswa') : $siswa['nm_siswa'] ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <label>NIS</label>
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          <input type="text" class="form-control" name="nis" id="nis" placeholder="Isi Nomor Induk Siswa" value="<?= set_value('nis') != null ? set_value('nis') : $siswa['nis'] ?>">
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
              <option <?= $K['id_kelas'] == $siswa['id_kelas'] ? 'selected' : ''; ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
            <?php endforeach ?>
          </select>
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