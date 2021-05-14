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
        <input type="text" class="form-control" name="nm_guru" id="nm_guru" placeholder="Tambahkan Nama Guru">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>NIP</label>
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <input type="text" class="form-control" name="nip" id="nip" placeholder="Tambahkan Nomor Induk Guru">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label>Mata Pelajaran Yang diampu</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select class="form-control" name="id_mapel" id="id_mapel">
          <option value="">PILIH MATA PELAJARAN</option>
          <?php foreach ($mapel as $M) { ?>
            <option value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>;
          <?php } ?>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
    </div>
  </div>
</form>