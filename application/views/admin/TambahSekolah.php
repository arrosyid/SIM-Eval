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
                <input type="text" class="form-control <?= form_error('nm_sekolah') != null ? "is-invalid" : "" ?>" name="nm_sekolah" id="nm_sekolah" placeholder="Isi Nama Sekolah" value="<?= set_value('nm_sekolah') ?>">
                <?= form_error('nm_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Kepala Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_kepsek') != null ? "is-invalid" : "" ?>" name="nm_kepsek" id="nm_kepsek" placeholder="Isi Nama Kepala Sekolah" value="<?= set_value('nm_kepsek') ?>">
                <?= form_error('nm_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Admin</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_admin') != null ? "is-invalid" : "" ?>" name="nm_admin" id="nm_admin" placeholder="Isi Nama Admin" value="<?= set_value('nm_admin') ?>">
                <?= form_error('nm_admin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Akreditasi</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('akreditasi') != null ? "is-invalid" : "" ?>" name="akreditasi" id="akreditasi">
                  <option value="">PILIH AKREDITASI</option>
                  <option <?= set_select('akreditasi', 'A') ?> value="A">A</option>
                  <option <?= set_select('akreditasi', 'B') ?> value="B">B</option>
                  <option <?= set_select('akreditasi', 'C') ?> value="C">C</option>
                  <option <?= set_select('akreditasi', '') ?> value="">Lainnya</option>
                </select>
                <?= form_error('akreditasi', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kurikulum</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('kurikulum') != null ? "is-invalid" : "" ?>" name="kurikulum" id="kurikulum">
                  <option value="">PILIH KURIKULUM</option>
                  <option <?= set_select('kurikulum', 'K13') ?> value="K13">K13</option>
                  <option <?= set_select('kurikulum', 'KTSP') ?> value="KTSP">KTSP</option>
                  <option <?= set_select('kurikulum', '') ?> value="">Lainnya</option>
                </select>
                <?= form_error('kurikulum', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Lengkap</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('alamat') != null ? "is-invalid" : "" ?>" name="alamat" id="alamat" placeholder="Isi Alamat Lengkap" value="<?= set_value('alamat') ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NPSN</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('npsn') != null ? "is-invalid" : "" ?>" name="npsn" id="npsn" placeholder="Isi Nomor Pokok Sekolah Nasional" value="<?= set_value('npsn') ?>">
                <?= form_error('npsn', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Bentuk Pendidikan</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('bentuk_pendidikan') != null ? "is-invalid" : "" ?>" name="bentuk_pendidikan" id="bentuk_pendidikan">
                  <option value="">PILIH BENTUK PENDIDIKAN</option>
                  <option <?= set_select('bentuk_soal', 'negeri') ?> value="negeri">negeri</option>
                  <option <?= set_select('bentuk_soal', 'swasta') ?> value="swasta">swasta</option>
                  <option <?= set_select('bentuk_soal', '') ?> value="">Lainnya</option>
                </select>
                <?= form_error('bentuk_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Telfon</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('telfon') != null ? "is-invalid" : "" ?>" name="telfon" id="telfon" placeholder="Isi Nomor Telfon Sekolah" value="<?= set_value('telfon') ?>">
                <?= form_error('telfon', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Website</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('website') != null ? "is-invalid" : "" ?>" name="website" id="website" placeholder="Isi Alamat Website Sekolah" value="<?= set_value('website') ?>">
                <?= form_error('website', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('email') != null ? "is-invalid" : "" ?>" name="emai" id="emai" placeholder="Isi Email Sekolah" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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
                <input type="text" class="form-control <?= form_error('sk_pendirian') != null ? "is-invalid" : "" ?>" name="sk_pendirian" id="sk_pendirian" placeholder="Isi Nomor SK Pendirian" value="<?= set_value('sk_pendirian') ?>">
                <?= form_error('sk_pendirian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Pendirian</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <input type="date" class="form-control <?= form_error('tgl_sk_pendirian') != null ? "is-invalid" : "" ?>" name="tgl_sk_pendirian" id="tgl_sk_pendirian" placeholder="Isi Tanggal SK Pendirian" value="<?= set_value('tgl_sk_pendirian') ?>">
                <?= form_error('tgl_sk_pendirian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor SK Izin</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('sk_izin') != null ? "is-invalid" : "" ?>" name="sk_izin" id="sk_izin" placeholder="Isi Nomor SK Izin" value="<?= set_value('sk_izin') ?>">
                <?= form_error('sk_izin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Izin</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <input type="date" class="form-control <?= form_error('tgl_sk_izin') != null ? "is-invalid" : "" ?>" name="tgl_sk_izin" id="tgl_sk_izin" placeholder="Isi Tanggal SK Izin" value="<?= set_value('tgl_sk_izin') ?>">
                <?= form_error('tgl_sk_izin', '<small class="text-danger pl-3">', '</small>'); ?>
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