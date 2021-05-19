<form action="" method="POST">
  <div class="mb-3">
    <strong>Guru</strong>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Nama Guru</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('nm_guru') != null ? "is-invalid" : "" ?>" name="nm_guru" id="nm_guru" placeholder="Tambahkan Nama Guru" value="<?= set_value('nm_guru') != null ? set_value('nm_guru') : $guru['nm_guru'] ?>">
        <?= form_error('nm_guru', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>NIP</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control <?= form_error('nip') != null ? "is-invalid" : "" ?>" name="nip" id="nip" placeholder="Tambahkan Nomor Induk Guru" value="<?= set_value('nip') != null ? set_value('nip') : $guru['nip'] ?>">
        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Mata Pelajaran Yang diampu</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control <?= form_error('id_mapel') != null ? "is-invalid" : "" ?>" name="id_mapel" id="id_mapel">
          <option value="">PILIH MATA PELAJARAN</option>
          <?php foreach ($mapel as $M) { ?>
            <option <?= set_select('id_mapel') != null ? set_select('id_mapel', $M['id_mapel']) : ($M['mapel'] == $guru['mapel'] ? 'selected' : '') ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
          <?php } ?>
        </select>
        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>