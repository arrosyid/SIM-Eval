<section class="content">
  <div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <?= $this->session->flashdata('message1'); ?>
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Guru</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Guru</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_guru') != null ? "is-invalid" : "" ?>" name="nm_guru" id="nm_guru" placeholder="Isi Nama Guru" value="<?= set_value('nm_guru') ?>">
              </div>
              <?= form_error('nm_guru', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NIP</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nip') != null ? "is-invalid" : "" ?>" name="nip" id="nip" placeholder="Isi Nomor Identitas Pegawai Negeri Sipil" value="<?= set_value('nip') ?>">
              </div>
              <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <option <?= set_select('id_mapel', $M['id_mapel']) ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
                  <?php } ?>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="mapel_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Nama Mata Pelajaran">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('email') != null ? "is-invalid" : "" ?>" name="email" id="email" placeholder="Isi Email" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Status </label>
            </div>
            <div class="col-sm-5">
              <div class="form-group <?= form_error('status') != null ? "is-invalid" : "" ?>">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status" value="1" <?= set_radio('status', '1') ?>>
                  <label class="form-check-label">Aktif</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status" value="0" <?= set_radio('status', '0') ?>>
                  <label class="form-check-label">Tidak Aktif</label>
                </div>
                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Guru</button>
            </div>
            <!-- /.col -->
          </div>
          <p>Note : <b>username</b> diisi dengan <b>Nama Guru</b> sedangkan <b>Password</b> diisi dengan <b>NIP</b> segera konfirmasi untuk mengganti Password</p>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>