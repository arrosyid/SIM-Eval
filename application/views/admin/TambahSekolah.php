<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Sekolah</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_sekolah" id="nm_sekolah" placeholder="Isi Nama Sekolah" value="<?= set_value('nm_sekolah') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Kepala Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_kepsek" id="nm_kepsek" placeholder="Isi Nama Kepala Sekolah" value="<?= set_value('nm_kepsek') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Admin</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_admin" id="nm_admin" placeholder="Isi Nama Admin" value="<?= set_value('nm_admin') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Akreditasi</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="akreditasi" id="akreditasi">
                  <option value="">PILIH AKREDITASI</option>
                  <option <?= set_select('akreditasi', 'A') ?> value="A">A</option>
                  <option <?= set_select('akreditasi', 'B') ?> value="B">B</option>
                  <option <?= set_select('akreditasi', 'C') ?> value="C">C</option>
                  <option <?= set_select('akreditasi', '') ?> value="">Lainnya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kurikulum</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="kurikulum" id="kurikulum">
                  <option value="">PILIH KURIKULUM</option>
                  <option <?= set_select('kurikulum', 'K13') ?> value="K13">K13</option>
                  <option <?= set_select('kurikulum', 'KTSP') ?> value="KTSP">KTSP</option>
                  <option <?= set_select('kurikulum', '') ?> value="">Lainnya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Lengkap</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Isi Alamat Lengkap" value="<?= set_value('alamat') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NPSN</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="npsn" id="npsn" placeholder="Isi Nomor Pokok Sekolah Nasional" value="<?= set_value('npsn') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Bentuk Pendidikan</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="bentuk_pendidikan" id="bentuk_pendidikan">
                  <option value="">PILIH BENTUK PENDIDIKAN</option>
                  <option <?= set_select('bentuk_soal', 'negeri') ?> value="negeri">negeri</option>
                  <option <?= set_select('bentuk_soal', 'swasta') ?> value="swasta">swasta</option>
                  <option <?= set_select('bentuk_soal', '') ?> value="">Lainnya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Telfon</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="telfon" id="telfon" placeholder="Isi Nomor Telfon Sekolah" value="<?= set_value('telfon') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Website</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="website" id="website" placeholder="Isi Alamat Website Sekolah" value="<?= set_value('website') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="emai" id="emai" placeholder="Isi Email Sekolah" value="<?= set_value('email') ?>">
              </div>
            </div>
          </div>
          <!--  -->
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor SK Pendirian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="sk_pendidikan" id="sk_pendidikan" placeholder="Isi Nomor SK Pendirian" value="<?= set_value('sk_pendidikan') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Pendirian</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_sk_pendidikan" id="tgl_sk_pendidikan" placeholder="Isi Tanggal SK Pendirian" value="<?= set_value('tgl_sk_pendidikan') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor SK Izin</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="sk_izin" id="sk_izin" placeholder="Isi Nomor SK Izin" value="<?= set_value('sk_izin') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Izin</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_sk_izin" id="tgl_sk_izin" placeholder="Isi Tanggal SK Izin" value="<?= set_value('tgl_sk_izin') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Sekolah</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>