<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Edit Profile Anda</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Siswa</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_siswa') != null ? "is-invalid" : "" ?>" name="nm_siswa" id="nm_siswa" placeholder="Isi Nama Siswa" value="<?= set_value('nm_siswa') != null ? set_value('nm_siswa') : $siswa['nm_siswa'] ?>">
                <?= form_error('nm_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NIS</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nis') != null ? "is-invalid" : "" ?>" name="nis" id="nis" placeholder="Isi Nomor Identitas Pegawai Negeri Sipil" value="<?= set_value('nis') != null ? set_value('nis') : $siswa['nis'] ?>">
                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_kelas') != null ? "is-invalid" : "" ?>" name="id_kelas" id="id_kelas">
                  <option value="">PILIH KELAS</option>
                  <?php foreach ($kelas as $K) { ?>
                    <option <?= set_select('id_kelas') != null ? set_select('id_kelas', $K['id_kelas']) : ($K['id_kelas'] == $siswa['id_kelas'] ? 'selected' : '') ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                  <?php } ?>
                </select>
                <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <!-- akun -->
          <div class="row">
            <div class="col-sm-2">
              <label>Username</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('username') != null ? "is-invalid" : "" ?>" name="username" id="username" placeholder="Isi Username Anda" value="<?= set_value('username') != null ? set_value('username') : $user['username'] ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" value="<?= $user['email'] ?>" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Edit Akun Siswa</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>