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
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('kelas') != null ? "is-invalid" : "" ?>" name="kelas" id="kelas">
                  <option value="">PILIH KELAS</option>
                  <option <?= set_select('kelas', 'VII') ?> value="VII">VII</option>
                  <option <?= set_select('kelas', 'VIII') ?> value="VIII">VIII</option>
                  <option <?= set_select('kelas', 'IX') ?> value="IX">IX</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="kelas_kelas_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Nama Kelas">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Bidang</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('bidang') != null ? "is-invalid" : "" ?>" name="bidang" id="bidang">
                  <option value="">PILIH BIDANG</option>
                  <option <?= set_select('bidang', 'IPA') ?> value="IPA">IPA</option>
                  <option <?= set_select('bidang', 'IPS') ?> value="IPS">IPS</option>
                  <option <?= set_select('bidang', 'BAHASA') ?> value="BAHASA">BAHASA</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="kelas_bidang_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Nama Bidang">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Kelas</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nomor_kelas') != null ? "is-invalid" : "" ?>" name="nomor_kelas" id="nomor_kelas" placeholder="Isi Nomor Kelas" value="<?= set_value('nomor_kelas') ?>">
                <?= form_error('nomor_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Wali Kelas</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_guru') != null ? "is-invalid" : "" ?>" name="id_guru" id="id_guru">
                  <option value="">PILIH WALI KELAS</option>
                  <?php foreach ($guru as $G) { ?>
                    <option <?= set_select('id_guru', $G['id_guru']) ?> value="<?= $G['id_guru'] ?>"><?= $G['nm_guru'] ?></option>
                  <?php } ?>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="kelas_wali_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Nama Wali Kelas">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Siswa</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('jml_siswa') != null ? "is-invalid" : "" ?>" name="jml_siswa" id="jml_siswa" placeholder="Isi Jumlah Siswa" value="<?= set_value('jml_siswa') ?>">
                <?= form_error('jml_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jumlah Mapel</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('jml_mapel') != null ? "is-invalid" : "" ?>" name="jml_mapel" id="jml_mapel" placeholder="Isi Jumlah Mapel" value="<?= set_value('jml_mapel') ?>">
                <?= form_error('jml_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
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