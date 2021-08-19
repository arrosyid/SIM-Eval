<!-- koreksi khusus uraian -->
<?php
$data_ujian = [
  ['jenis Ujian', $ujian['jenis_ujian']],
  ['Kompetensi Dasar', $ujian['kd']],
  ['KKM', $ujian['kkm']],
  ['tanggal Ujian', date('D, d M Y', $ujian['tgl_ujian'])],
];
$siswa = [
  ['Nama', $siswa['nm_siswa']],
  ['Kelas', $siswa['kelas'] . ' ' . $siswa['bidang'] . ' ' . $siswa['nomor_kelas']],
  ['NIS', $siswa['nis']],
];
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Koreksi Manual Soal Uraian</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-4">
          <div class="col-sm-4">
            <?php foreach ($data_ujian as $U => $key) : ?>
              <div class="row">
                <div class="col-5">
                  <h6 class="mb-0"><?= $key[0] ?></h6>
                </div>
                <div class="col-7 text-secondary">
                  : <?= $key[1] ?>
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
                  : <?= $val[1] ?>
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
          foreach ($soal_uo as $U) : ?>
            <div class="row">
              <div class="col-sm-2">
                <label>Nomor <?= $U['nomor_soal'] ?></label>
              </div>
              <div class="col-sm-10">
                : <?= $U['soal'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>skor maksimal</label>
              </div>
              <div class="col-sm-10 text-secondary">
                : <?= $U['skor_soal'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Jawaban</label>
              </div>
              <div class="col-sm-10 text-secondary">
                : <?= $U['jawaban'] ?>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control <?= form_error('no_' . $U['nomor_soal']) != null ? "is-invalid" : "" ?>" name="no_<?= $U['nomor_soal'] ?>" id="no_<?= $U['nomor_soal'] ?>" placeholder="Isi Skor Soal Nomor <?= $U['nomor_soal'] ?>" value="<?= set_value('no_' . $U['nomor_soal']) ?>">
              <?= form_error('no_' . $U['nomor_soal'], '<small class="text-danger pl-3">', '</small>'); ?>
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
              <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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