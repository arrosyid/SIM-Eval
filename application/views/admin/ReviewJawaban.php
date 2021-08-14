<!-- koreksi khusus uraian -->
<?php
$ujian = [
  ['jenis Ujian', 'UH'],
  ['Kompetensi Dasar', '3.1'],
  ['KKM', 75],
  ['tanggal Ujian', date('D, d M Y', 1626127200)],
];
$pg = [
  [
    'nomor_soal' => 1,
    'soal' => 'INI PILIHAN GANDA',
    'pilihan_a' => 'pilihan a',
    'pilihan_b' => 'aku',
    'pilihan_c' => 'pilihan c',
    'pilihan_d' => 'pilihan d',
    'pilihan_e' => 'pilihan e'
  ],
  [
    'nomor_soal' => 2,
    'soal' => 'INI PILIHAN GANDA',
    'pilihan_a' => 'pilihan a',
    'pilihan_b' => 'pilihan b',
    'pilihan_c' => 'pilihan c',
    'pilihan_d' => 'pilihan d',
    'pilihan_e' => 'pilihan e'
  ],
  [
    'nomor_soal' => 3,
    'soal' => 'INI PILIHAN GANDA',
    'pilihan_a' => 'pilihan a',
    'pilihan_b' => 'pilihan b',
    'pilihan_c' => 'pilihan c',
    'pilihan_d' => 'pilihan d',
    'pilihan_e' => 'pilihan e'
  ],
];
$uraian = [
  [
    'nomor_soal' => 1,
    'soal' => 'INI URAIAN',
  ],
  [
    'nomor_soal' => 2,
    'soal' => 'INI URAIAN',
  ],
  [
    'nomor_soal' => 3,
    'soal' => 'INI URAIAN',
  ],
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
        </div>
        <hr>
        <!-- isi dari selection -->
        <h4>PILIHAN GANDA</h4>
        <hr>
        <?php foreach ($pg as $P => $val) : ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor <?= $val['nomor_soal'] ?></label>
            </div>
            <div class="col-sm-10">
              <p><?= $val['soal'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <?php for ($i = 'a'; $i <= 'e'; $i++) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pg_no_<?= $val['nomor_soal'] ?>" id="pg-<?= $val['nomor_soal'] ?>-<?= $i ?>" value="<?= $i ?>" <?= set_radio('pg_no_' . $val['nomor_soal'], $i) ?> readonly>
                    <label class="form-check-label" for="<?= $val['nomor_soal'] . '-' . $i ?>"><?= $i . '. ' . $val["pilihan_$i"] ?></label>
                  </div>
                <?php endfor; ?>
                <?= form_error('pg_no_' . $val['nomor_soal'], '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <hr>
        <h4>URAIAN</h4>
        <hr>
        <!-- untuk uraian -->
        <?php foreach ($uraian as $U => $value) : ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor <?= $value['nomor_soal'] ?></label>
            </div>
            <div class="col-sm-10">
              <p><?= $value['soal'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('uo_no_' . $value['nomor_soal']) != null ? "is-invalid" : "" ?>" name="uo_no_<?= $val['nomor_soal'] ?>" id="uo-<?= $val['nomor_soal'] ?>" placeholder="Isi Jawaban Anda" value="<?= set_value('uo_no_' . $val['nomor_soal'], $i) ?>" readonly>
                <?= form_error('uo_no_' . $value['nomor_soal'], '<small class="text-danger pl-3">', '</small>'); ?>
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
            <button type="submit" class="btn btn-primary btn-block">Kirim Jawaban Anda</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
  </div>
</section>