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
          <div class="col-sm-8">
            <div class="d-flex flex-row-reverse">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title text-bold"><i class="fas fa-exclamation-triangle"></i>&nbsp;PERHATIAN!! </h3>
                </div>
                <div class="card-body">
                  <p>Dilarang mengakses tab lain jika tidak ingin halaman ini</p>
                  <p>memuat secara otomatis dan semua jawaban anda hilang </p>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <hr>
        <!-- isi dari selection -->
        <form action="" method="post">
          <div class="row">
            <div class="col-sm-2">
              <label>Siswa</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_siswa') != null ? "is-invalid" : "" ?>" name="id_siswa" id="id_siswa">
                  <option value="">PILIH SISWA</option>
                  <?php foreach ($siswa as $S) { ?>
                    <option <?= set_select('id_siswa', $S['id_siswa']) ?> value="<?= $S['id_siswa'] ?>"><?= $S['nm_siswa'] ?></option>
                  <?php } ?>
                </select>
                <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                tidak menemukan Siswa? <a href="<?= base_url('admin/tambahSiswa') . "?kelas=" . $ujian['id_kelas'] ?>">Tambahkan Siswa</a>
              </div>
            </div>
          </div>

          <h4>PILIHAN GANDA</h4>
          <hr>
          <?php foreach ($pg as $P) : ?>
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
                        <input class="form-check-input <?= form_error("pg_no_" . $P['nomor_soal']) != null ? "is-invalid" : "" ?>" type="radio" name="pg_no_<?= $P['nomor_soal'] ?>" id="pg-<?= $P['nomor_soal'] . '-' . $i ?>" value="<?= $i ?>" <?= set_radio('pg_no_' . $P['nomor_soal'], $i) ?>>
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
          <?php foreach ($uo as $U) : ?>
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
                  <input type="text" class="form-control <?= form_error('uo_no_' . $U['nomor_soal']) != null ? "is-invalid" : "" ?>" name="uo_no_<?= $U['nomor_soal'] ?>" id="uo-<?= $U['nomor_soal'] ?>" placeholder="Isi Jawaban Anda" value="<?= set_value('uo_no_' . $U['nomor_soal']) ?>">
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
              <button type="submit" class="btn btn-primary btn-block">Simpan jawaban anda</button>
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