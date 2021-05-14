<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Profile Sekolah</h3>
      </div>
      <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i> Tentang kami</strong>
        <ul class="text-muted">
          <lu>Nama Sekolah : <a class="float-right"><?= $sekolah['nm_sekolah'] ?></a> <br></lu>
          <lu>NPSN : <a class="float-right"><?= $sekolah['npsn'] ?></a> <br></lu>
          <lu>Nama Kepala Sekolah : <a class="float-right"><?= $sekolah['nm_kepsek'] ?></a> <br></lu>
          <lu>Nama Admin Sekolah : <a class="float-right"><?= $sekolah['nm_admin'] ?></a> <br></lu>
          <lu>Akreditasi : <a class="float-right"><?= $sekolah['akreditasi'] ?></a> <br></lu>
          <lu>Kurikulum : <a class="float-right"><?= $sekolah['kurikulum'] ?></a> <br></lu>
          <lu>Alamat : <a class="float-right"><?= $sekolah['alamat'] ?></a> <br></lu>
          <lu>Bentuk Pendidikan : <a class="float-right"><?= $sekolah['bentuk_pendidikan'] ?></a> <br></lu>
          <lu>SK Pendirian Sekolah : <a class="float-right"><?= $sekolah['sk_pendirian'] ?></a> <br></lu>
          <lu>Tanggal SK Pendirian Sekolah : <a class="float-right"><?= date('d-m-Y', $sekolah['tgl_sk_pendirian']) ?></a> <br></lu>
          <lu>SK Izin Sekolah : <a class="float-right"><?= $sekolah['sk_izin'] ?></a> <br></lu>
          <lu>Tanggal SK Izin Sekolah : <a class="float-right"><?= date('d-m-Y', $sekolah['tgl_sk_izin']) ?></a> <br></lu>
        </ul>
        <hr>
        <strong><i class="fas fa-address-book mr-1"></i>Contact Me</strong>
        <ul class="text-muted">
          <lu>Nomer Telfon : <a class="float-right"><?= $sekolah['telfon'] ?></a> <br></lu>
          <lu>Website : <a class="float-right"><?= $sekolah['website'] ?></a> <br></lu>
          <lu>Email : <a class="float-right"><?= $sekolah['email'] ?></a> <br></lu>
        </ul>
      </div>
      <div class="card-footer">
        <a href="<?= base_url('admin/editSekolah/1') ?>" class="btn btn-primary">Edit</a>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>