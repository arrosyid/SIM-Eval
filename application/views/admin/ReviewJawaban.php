<!-- koreksi khusus uraian -->
<?php
$data_ujian = [
  ['jenis Ujian', $ujian['jenis_ujian']],
  ['Kompetensi Dasar', $ujian['kd']],
  ['KKM', $ujian['kkm']],
  ['tanggal Ujian', date('D, d M Y', $ujian['tgl_ujian'])],
];
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Lembar Soal</h3>
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
                  <?= $key[1] ?>
                </div>
              </div>
              <hr>
            <?php endforeach ?>
          </div>
        </div>
        <hr>
        <!-- isi dari selection -->
        <h4>PILIHAN GANDA</h4>
        <hr>
        <?php foreach ($soal_pg as $P) : ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor <?= $P['nomor_soal'] ?></label>
            </div>
            <div class="col-sm-10">
              <p><?= $P['soal'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <div class="form-group ">
                <?php for ($i = 'a'; $i <= 'e'; $i++) :
                  if ($P["pilihan_$i"] != null) : ?>
                    <div class="form-check">
                      <input class="form-check-input <?= form_error("pg_no_" . $P['nomor_soal']) != null ? "is-invalid" : "" ?>" type="radio" name="pg_no_<?= $P['nomor_soal'] ?>" id="pg-<?= $P['nomor_soal'] . '-' . $i ?>" value="<?= $i ?>" <?= $pg['no_' . $P['nomor_soal']] == strtoupper($i) ? 'checked' : 'disabled' ?>>
                      <label class="form-check-label" for="pg-<?= $P['nomor_soal'] . '-' . $i ?>"><?= $i . '. ' . $P["pilihan_$i"] ?></label>
                    </div>
                <?php endif;
                endfor; ?>
                <?= form_error('pg_no_' . $P['nomor_soal'], '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <hr>
        <h4>URAIAN</h4>
        <hr>
        <!-- untuk uraian -->
        <?php foreach ($soal_uo as $U) : ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor <?= $U['nomor_soal'] ?></label>
            </div>
            <div class="col-sm-10">
              <p><?= $U['soal'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('uo_no_' . $U['nomor_soal']) != null ? "is-invalid" : "" ?>" name="uo_no_<?= $U['nomor_soal'] ?>" id="uo-<?= $U['nomor_soal'] ?>" placeholder="Isi Jawaban Anda" value="<?= $uo['no_' . $U['nomor_soal']] ?>" readonly>
                <?= form_error('uo_no_' . $U['nomor_soal'], '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <hr>
        <div class="row">
          <div class="col-8">
            capthca
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a href="<?= base_url('admin/nilai') ?>" class="btn btn-primary btn-block">Kirim Jawaban Anda</a>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>