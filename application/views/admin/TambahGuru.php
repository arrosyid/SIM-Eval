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
                <input type="text" class="form-control" name="nm_guru" id="nm_guru" placeholder="Isi Nama Guru" value="<?= set_value('nm_guru') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NIP</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Isi Nomor Identitas Pegawai Negeri Sipil" value="<?= set_value('nip') ?>">
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
                    <option <?= set_select('id_mapel', $M['id_mapel']) ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <!-- jika di centang maka muncul yg dibawahnya -->
          <div class="icheck-primary">
            <label for="akun">Buat Akun Guru?</label>
            <input class="ml-3" type="checkbox" id="akun" name="akun" value="1"> iya
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Status </label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status" value="1" <?= set_radio('status', '1') ?>>
                  <label class="form-check-label">Aktif</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status" value="0" <?= set_radio('status', '0') ?>>
                  <label class="form-check-label">Tidak Aktif</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Isi Email" value="<?= set_value('email') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Password</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="password" class="form-control" name="password1" id="password1" placeholder="Isi Kata Sandi Akun Guru" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Konfirmasi Password</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Isi Konfirmasi Kata Sandi Akun Guru" value="">
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
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>