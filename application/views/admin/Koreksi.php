<!-- koreksi khusus uraian -->
<?php
$ujian = [
  ['jenis Ujian', 'UH'],
  ['Kompetensi Dasar', '3.1'],
  ['KKM', 75],
  ['tanggal Ujian', date('D, d M Y', 1626127200)],
];
$siswa = [
  ['Nama', 'aku'],
  ['Kelas', 'VI 2'],
  ['NIS', 12312],
];
// diganti Datanya
$jawab = [
  'satu', 'dua', 'tiga', 'empat', 'lima'
];
$jenis = [
  'URAIAN', 5
];
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Koreksi Manual Soal</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-4">
          <div class="col-sm-4">
            <?php foreach ($ujian as $U => $key) : ?>
              <div class="row">
                <div class="col-5">
                  <h6 class="mb-0"><?= $key[0] ?></h6>
                </div>
                <div class="col-7 text-secondary">
                  <?= $key[1] ?>
                </div>
              </div>
              <hr>
            <?php endforeach ?>
          </div>
          <div class="col-sm-4 ml-5">
            <?php foreach ($siswa as $S => $val) : ?>
              <div class="row">
                <div class="col-5">
                  <h6 class="mb-0"><?= $val[0] ?></h6>
                </div>
                <div class="col-7 text-secondary">
                  <?= $val[1] ?>
                </div>
              </div>
              <hr>
            <?php endforeach ?>
          </div>
        </div>
        <hr>
        <!-- isi dari selection -->
        <form action="" method="post">
          <?php $i = 1;
          foreach ($jawab as $J => $value) : ?>
            <div class="row">
              <div class="col-sm-2">
                <label>Nomor <?= $i ?></label>
              </div>
              <div class="col-sm-10 text-secondary">
                : <?= $value ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control <?= form_error('no_<?= $i ?>') != null ? "is-invalid" : "" ?>" name="no_<?= $i ?>" id="no_<?= $i ?>" placeholder="Isi Skor Soal Nomor <?= $i ?>" value="<?= set_value('no_' . $i) ?>">
              <?= form_error('no_' . $i, '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <hr>
          <?php $i++;
          endforeach; ?>
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
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>