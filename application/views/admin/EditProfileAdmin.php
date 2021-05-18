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
              <label>Nama Guru</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_guru" id="nm_guru" placeholder="Isi Nama Guru" value="<?= set_value('nm_guru') != null ? set_value('nm_guru') : $guru['nm_guru'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NIP</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Isi Nomor Identitas Pegawai Negeri Sipil" value="<?= set_value('nip') != null ? set_value('nip') : $guru['nip'] ?>">
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
                    <option <?= set_select('id_mapel') != null ? set_select('id_mapel', $M['mapel']) : ($M['mapel'] == $guru['mapel'] ? 'selected' : '') ?> value="<?= $M['id_mapel'] ?>"><?= $M['mapel'] ?></option>
                  <?php } ?>
                </select>
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
                <input type="text" class="form-control" name="username" id="username" placeholder="Isi Username Anda" value="<?= set_value('username') != null ? set_value('username') : $user['username'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Isi Email Anda" value="<?= set_value('email') != null ? set_value('email') : $user['email'] ?>">
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