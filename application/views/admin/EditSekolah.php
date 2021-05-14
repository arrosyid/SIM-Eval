<section class="content">
  <div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
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
                <input type="text" class="form-control" name="nm_sekolah" id="nm_sekolah" placeholder="Isi Nama Sekolah" value="<?= set_value('nm_sekolah') != null ? set_value('nm_sekolah') : $sekolah['nm_sekolah'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>NPSN</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="npsn" id="npsn" placeholder="Isi Nomor Pokok Sekolah Nasional" value="<?= set_value('npsn') != null ? set_value('npsn') : $sekolah['npsn'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Kepala Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_kepsek" id="nm_kepsek" placeholder="Isi Nama Kepala Sekolah" value="<?= set_value('nm_kepsek') != null ? set_value('nm_kepsek') : $sekolah['nm_kepsek'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Admin Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_admin" id="nm_admin" placeholder="Isi Nama Admin Sekolah" value="<?= set_value('nm_admin') != null ? set_value('nm_admin') : $sekolah['nm_admin'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>No. Telfon</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="telfon" id="telfon" placeholder="Isi Nomor Telfon Sekolah" value="<?= set_value('telfon') != null ? set_value('telfon') : $sekolah['telfon'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Website</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="website" id="website" placeholder="Isi Website Sekolah" value="<?= set_value('website') != null ? set_value('website') : $sekolah['website'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Email</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Isi Email Sekolah" value="<?= set_value('email') != null ? set_value('email') : $sekolah['email'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Akreditasi</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="Akreditasi" id="Akreditasi">
                  <option value="">PILIH AKREDITASI</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="">LAINNYA</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kurikulum</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <select class="form-control" name="kurikulum" id="kurikulum">
                  <option value="">PILIH KURIKULUM</option>
                  <option value="K13">K13</option>
                  <option value="KTSP">KTSP</option>
                  <option value="2004">2004</option>
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
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Isi Alamat Lengkap" value="<?= set_value('alamat') != null ? set_value('alamat') : $sekolah['alamat'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Bentuk Pendidikan</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control" name="bentuk_pendirikan" id="bentuk_pendirikan">
                  <option value="">PILIH BENTUK PENDIDIKAN</option>
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="">Lainnya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>SK Pendirian Sekolah</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="sk_pendirian" id="sk_pendirian" placeholder="Isi SK Pendirian Sekolah" value="<?= set_value('sk_pendirian') != null ? set_value('sk_pendirian') : $sekolah['sk_pendirian'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Pendirian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_sk_pendirian" id="tgl_sk_pendirian" placeholder="Isi Tanggal SK Pendirian Sekolah" value="<?= set_value('tgl_sk_pendirian') != null ? set_value('tgl_sk_pendirian') : $sekolah['tgl_sk_pendirian'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>SK Izin Operasional</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="sk_izin" id="sk_izin" placeholder="Isi SK Izin Operasional Sekolah" value="<?= set_value('sk_izin') != null ? set_value('sk_izin') : $sekolah['sk_izin'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal SK Izin Operasional</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control" name="tgl_sk_izin" id="tgl_sk_izin" placeholder="Isi Tanggal SK Izin Operasional Sekolah" value="<?= set_value('tgl_sk_izin') != null ? set_value('tgl_sk_izin') : $sekolah['tgl_sk_izin'] ?>">
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
                  <input class="form-check-input" type="radio" name="status" id="status" value="1">
                  <label class="form-check-label">Aktif</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status" value="0">
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