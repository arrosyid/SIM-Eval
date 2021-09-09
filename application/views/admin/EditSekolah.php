<section class="content">
  <div class="container-fluid">
    <?= $this->session->flashdata('message') ?>
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Edit Sekolah</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_sekolah') != null ? "is-invalid" : "" ?>" name="nm_sekolah" id="nm_sekolah" placeholder="Isi Nama Sekolah" value="<?= set_value('nm_sekolah') != null ? set_value('nm_sekolah') : $sekolah['nm_sekolah'] ?>">
                <?= form_error('nm_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NPSN</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('npsn') != null ? "is-invalid" : "" ?>" name="npsn" id="npsn" placeholder="Isi Nomor Pokok Sekolah Nasional" value="<?= set_value('npsn') != null ? set_value('npsn') : $sekolah['npsn'] ?>">
                <?= form_error('npsn', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Kepala Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_kepsek') != null ? "is-invalid" : "" ?>" name="nm_kepsek" id="nm_kepsek" placeholder="Isi Nama Kepala Sekolah" value="<?= set_value('nm_kepsek') != null ? set_value('nm_kepsek') : $sekolah['nm_kepsek'] ?>">
                <?= form_error('nm_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Admin Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_admin') != null ? "is-invalid" : "" ?>" name="nm_admin" id="nm_admin" placeholder="Isi Nama Admin Sekolah" value="<?= set_value('nm_admin') != null ? set_value('nm_admin') : $sekolah['nm_admin'] ?>">
                <?= form_error('nm_admin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>No. Telfon</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('telfon') != null ? "is-invalid" : "" ?>" name="telfon" id="telfon" placeholder="Isi Nomor Telfon Sekolah" value="<?= set_value('telfon') != null ? set_value('telfon') : $sekolah['telfon'] ?>">
                <?= form_error('telfon', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Website</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('website') != null ? "is-invalid" : "" ?>" name="website" id="website" placeholder="Isi Website Sekolah" value="<?= set_value('website') != null ? set_value('website') : $sekolah['website'] ?>">
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
                <input type="text" class="form-control <?= form_error('email') != null ? "is-invalid" : "" ?>" name="email" id="email" placeholder="Isi Email Sekolah" value="<?= set_value('email') != null ? set_value('email') : $sekolah['email'] ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Akreditasi</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control <?= form_error('akreditasi') != null ? "is-invalid" : "" ?>" name="akreditasi" id="akreditasi">
                  <option <?= $sekolah['akreditasi'] == NULL ? 'selected' : '' ?> value="">PILIH AKREDITASI</option>
                  <option <?= set_select('akreditasi') != null ? set_select('akreditasi', 'A') : ($sekolah['akreditasi'] == 'A' ? 'selected' : '') ?> value="A">A</option>
                  <option <?= set_select('akreditasi') != null ? set_select('akreditasi', 'B') : ($sekolah['akreditasi'] == 'B' ? 'selected' : '') ?> value="B">B</option>
                  <option <?= set_select('akreditasi') != null ? set_select('akreditasi', 'C') : ($sekolah['akreditasi'] == 'C' ? 'selected' : '') ?> value="C">C</option>
                  <option <?= set_select('akreditasi', '') ?> value="">LAINNYA</option>
                </select>
                <?= form_error('akreditasi', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kurikulum</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control <?= form_error('kurikulum') != null ? "is-invalid" : "" ?>" name="kurikulum" id="kurikulum">
                  <option <?= $sekolah['kurikulum'] == NULL ? 'selected' : '' ?> value="">PILIH KURIKULUM</option>
                  <option <?= set_select('kurikulum') != null ? set_select('kurikulum', 'K13') : ($sekolah['kurikulum'] == 'K13' ? 'selected' : '') ?> value="K13">K13</option>
                  <option <?= set_select('kurikulum') != null ? set_select('kurikulum', 'KTSP') : ($sekolah['kurikulum'] == 'KTSP' ? 'selected' : '') ?> value="KTSP">KTSP</option>
                  <option <?= set_select('kurikulum') != null ? set_select('kurikulum', '2004') : ($sekolah['kurikulum'] == '2004' ? 'selected' : '') ?> value="2004">2004</option>
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
                <input type="text" class="form-control <?= form_error('alamat') != null ? "is-invalid" : "" ?>" name="alamat" id="alamat" placeholder="Isi Alamat Lengkap" value="<?= set_value('alamat') != null ? set_value('alamat') : $sekolah['alamat'] ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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
                  <option <?= $sekolah['bentuk_pendidikan'] == NULL ? 'selected' : '' ?> value="">PILIH BENTUK PENDIDIKAN</option>
                  <option <?= set_select('bentuk_pendidikan') != null ? set_select('bentuk_pendidikan', 'SD') : ($sekolah['bentuk_pendidikan'] == 'SD' ? 'selected' : '') ?> value="SD">SD</option>
                  <option <?= set_select('bentuk_pendidikan') != null ? set_select('bentuk_pendidikan', 'SMP') : ($sekolah['bentuk_pendidikan'] == 'SMP' ? 'selected' : '') ?> value="SMP">SMP</option>
                  <option <?= set_select('bentuk_pendidikan') != null ? set_select('bentuk_pendidikan', 'SMA') : ($sekolah['bentuk_pendidikan'] == 'SMA' ? 'selected' : '') ?> value="SMA">SMA</option>
                  <option <?= set_select('bentuk_pendidikan') != null ? set_select('bentuk_pendidikan', 'Lainnya') : ($sekolah['bentuk_pendidikan'] == 'Lainnya' ? 'selected' : '') ?> value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('bentuk_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>SK Pendirian Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('sk_pendirian') != null ? "is-invalid" : "" ?>" name="sk_pendirian" id="sk_pendirian" placeholder="Isi SK Pendirian Sekolah" value="<?= set_value('sk_pendirian') != null ? set_value('sk_pendirian') : $sekolah['sk_pendirian'] ?>">
                <?= form_error('sk_pendirian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Pendirian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control <?= form_error('tgl_sk_pendirian') != null ? "is-invalid" : "" ?>" name="tgl_sk_pendirian" id="tgl_sk_pendirian" placeholder="Isi Tanggal SK Pendirian Sekolah" value="<?= set_value('tgl_sk_pendirian') != null ? set_value('tgl_sk_pendirian') : date('Y-m-d', $sekolah['tgl_sk_pendirian']) ?>">
                <?= form_error('tgl_sk_pendirian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>SK Izin Operasional</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('sk_izin') != null ? "is-invalid" : "" ?>" name="sk_izin" id="sk_izin" placeholder="Isi SK Izin Operasional Sekolah" value="<?= set_value('sk_izin') != null ? set_value('sk_izin') : $sekolah['sk_izin'] ?>">
                <?= form_error('sk_izin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Izin Operasional</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control <?= form_error('tgl_sk_izin') != null ? "is-invalid" : "" ?>" name="tgl_sk_izin" id="tgl_sk_izin" placeholder="Isi Tanggal SK Izin Operasional Sekolah" value="<?= set_value('tgl_sk_izin') != null ? set_value('tgl_sk_izin') : date('Y-m-d', $sekolah['tgl_sk_izin']) ?>">
                <?= form_error('tgl_sk_izin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <!-- <div class="row">
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
          </div> -->
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Edit Sekolah</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>