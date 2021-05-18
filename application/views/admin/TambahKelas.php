<section class="content">
  <div class="container-fluid">
    <?= $this->session->flashdata('massage') ?>
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Kelas</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="kelas" id="kelas">
                  <option value="">PILIH KELAS</option>
                  <option <?= set_select('kelas', 'VII') ?> value="VII">VII</option>
                  <option <?= set_select('kelas', 'VIII') ?> value="VIII">VIII</option>
                  <option <?= set_select('kelas', 'IX') ?> value="IX">IX</option>
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
                <select class="form-control" name="bidang" id="bidang">
                  <option value="">PILIH BIDANG</option>
                  <option <?= set_select('bidang', 'IPA') ?> value="IPA">IPA</option>
                  <option <?= set_select('bidang', 'IPS') ?> value="IPS">IPS</option>
                  <option <?= set_select('bidang', 'BAHASA') ?> value="BAHASA">BAHASA</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nomor_kelas" id="nomor_kelas" placeholder="Isi Nomor Kelas" value="<?= set_value('nomor_kelas') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Wali Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="id_guru" id="id_guru">
                  <option value="">PILIH WALI KELAS</option>
                  <?php foreach ($guru as $G) { ?>
                    <option <?= set_select('id_guru', $G['id_guru']) ?> value="<?= $G['id_guru'] ?>"><?= $G['nm_guru'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Siswa</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="jml_siswa" id="jml_siswa" placeholder="Isi Jumlah Siswa" value="<?= set_value('jml_siswa') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Mapel</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="jml_mapel" id="jml_mapel" placeholder="Isi Jumlah Mapel" value="<?= set_value('jml_mapel') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Kelas</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>