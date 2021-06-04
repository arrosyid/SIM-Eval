<section class="content">
  <div class="container-fluid">

    
    <!-- HEADER -->
    <div class="jumbotron jumbotron-fluid text-white">
      <div class="container">
        <h1 class="display-4 font-weight-bold">SMP NEGERI 2 SUGIO</h1>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="row">

      <!-- 1ST CARD -->
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-school"></i> Identitas Sekolah</h3>
          </div>
          <div class="card-body">
            <ul class="text-muted">
              <lu><span class="mr-2 text-dark font-weight-bold">Nama Sekolah :</span> <?= $sekolah['nm_sekolah'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">NPSN :</span> <?= $sekolah['npsn'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Nama Kepala Sekolah :</span> <?= $sekolah['nm_kepsek'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Nama Admin Sekolah :</span> <?= $sekolah['nm_admin'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Akreditasi :</span> <?= $sekolah['akreditasi'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Kurikulum :</span> <?= $sekolah['kurikulum'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Alamat :</span> <?= $sekolah['alamat'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Bentuk Pendidikan :</span> <?= $sekolah['bentuk_pendidikan'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">SK Pendirian Sekolah :</span> <?= $sekolah['sk_pendirian'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Tanggal SK Pendirian Sekolah :</span> <?= date('d-m-Y', $sekolah['tgl_sk_pendirian']) ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">SK Izin Sekolah :</span> <?= $sekolah['sk_izin'] ?> <br></lu>
              <lu><span class="mr-2 text-dark font-weight-bold">Tanggal SK Izin Sekolah :</span> <?= date('d-m-Y', $sekolah['tgl_sk_izin']) ?> <br></lu>
            </ul>
          </div>
        </div>
      </div>
      <!-- END 1ST CARD -->


      <!-- 2ND CARD -->
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-address-book mr-1"></i> Kontak</h3>
          </div>
          <div class="card-body">
            <ul class="text-muted">
              <lu><span class="font-weight-bold  text-dark mr-2">Nomer Telfon: </span> <?= $sekolah['telfon'] ?></a> <br></lu>
              <lu><span class="font-weight-bold  text-dark mr-2">Website: </span> <?= $sekolah['website'] ?></a> <br></lu>
              <lu><span class="font-weight-bold  text-dark mr-2">Email: </span> <?= $sekolah['email'] ?></a> <br></lu>
            </ul>
          </div>
        </div>
      </div>
      <!-- END 2ND CARD -->

      <div class="col-12 mb-3">
        <a href="<?= base_url('admin/editSekolah/1') ?>" class="btn btn-warning btn-block"><i class="fa fa-edit"></i> Edit Profile Sekolah</a>
      </div>
    </div>
    <!-- END CONTENT -->
    

  </div>
  <!-- Stylesheet -->
  <style>
    .jumbotron {
      background: url("https://images.unsplash.com/photo-1553526777-5ffa3b3248d8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"), linear-gradient(to bottom, #ADB2B6, #ABAEB3);
      background-size: cover;
      background-position: bottom;
    }
    ul {
      padding: 0
    }
  </style>
</section>