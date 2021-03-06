<?php 
  $identitas = [
    ["Nama Sekolah", $sekolah['nm_sekolah']],
    ["NPSN",  $sekolah['npsn']],
    ["Nama Kepala Sekolah", $sekolah['nm_kepsek']],
    ["Akreditasi", $sekolah['akreditasi']],
    ["Kurikulum", $sekolah['kurikulum']],
    ["Alamat", $sekolah['alamat']],
    ["Bentuk Pendidikan", $sekolah['bentuk_pendidikan']],
    ["SK Pendirian Sekolah", $sekolah['sk_pendirian']],
    ["Tanggal SK Pendirian Sekolah", $sekolah['sk_pendirian']],
    ["SK Izin Sekolah", $sekolah['sk_izin']],
    ["Tanggal SK Izin Sekolah", $sekolah['tgl_sk_izin']],
  ];

  $kontak = [
    ["Nomer Telepon", $sekolah['telfon']],
    ["Website", $sekolah['website']],
    ["Email", $sekolah['email'] ]
  ];

?>

<section class="content">
  <div class="container-fluid">

    <!-- HEADER -->
    <div class="jumbotron jumbotron-fluid jumbotron-bg text-white">
      <div class="container">
        <h1 class="display-4 font-weight-bold">SMP NEGERI 2 SUGIO</h1>
      </div>
    </div>
    <!-- END HEADER -->


    <!-- CONTENT -->
    <div class="row">

      <!-- 1ST CARD -->
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header py-3">
            <h3 class="card-title"><i class="fas fa-school"></i> Identitas Sekolah</h3>
          </div>
          <div class="card-body">

            <!-- COLUMN -->
            <?php for ($i = 0; $i < count($identitas); $i++) { ?>  
              <div class="row">
                <div class="col-sm-4"><?= $identitas[$i][0] ?></div>
                <div class="col-sm-8 text-secondary">
                  <?= $identitas[$i][1] ?>
                </div>
              </div>

              <?php if ($i < count($identitas) - 1) {
                echo "<hr>";
              }
              ?>
            <?php } ?>
            <!-- END COLUMN -->

          </div>
        </div>
      </div>
      <!-- END 1ST CARD -->


      <!-- 2ND CARD -->
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header py-3">
            <h3 class="card-title"><i class="fas fa-address-book mr-1"></i> Kontak</h3>
          </div>
            <div class="card-body">

              <!-- COLUMN -->
              <?php for ($i = 0; $i < count($kontak); $i++) { ?>  
                <div class="row">
                  <div class="col-sm-4"><?= $kontak[$i][0] ?></div>
                  <div class="col-sm-8 text-secondary">
                    <?= $kontak[$i][1] ?>
                  </div>
                </div>

                <?php if ($i < count($kontak) - 1) {
                  echo "<hr>";
                }
                ?>
              <?php } ?>
              <!-- END COLUMN -->

            </div>
        </div>
      </div>
      <!-- END 2ND CARD -->

      <div class="col-12 mb-3">
        <a href="<?= base_url('admin/editSekolah/1') ?>" class="btn btn-warning btn-block py-3"><i class="fa fa-edit"></i> Edit Profile Sekolah</a>
      </div>
    </div>
    <!-- END CONTENT -->
  </div>
</section>