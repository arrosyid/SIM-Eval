<?php
$jml_soal = 40;
for ($i = 1; $i <= $jml_soal; $i++) {
  $nomor[$i] = ["Nomor $i", "no_$i", 'isi skor uraian siswa'];
}
?>

<!-- dikasih upload jawaban CSV -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Soal</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message1'); ?>
        <!-- penentuan cara pengisian data -->
        <!-- <div class="form-group">
          <select name="pilihan-soal" id="pilihan-soal" class="form-control">
            <option value="">PILIH METODE PENGISIAN DATA</option>
            <option value="upload-file">UPLOAD FILE</option>
            <option value="isi-form">ISI FORM</option>
          </select>
        </div> -->

        <form role="form" action="" method="POST" id="isi-form">
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Siswa</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_siswa') != null ? "is-invalid" : "" ?>" name="id_siswa" id="id_siswa">
                  <option value="">PILIH NAMA SISWA</option>
                  <?php foreach ($siswa as $S) { ?>
                    <option <?= set_select('id_siswa', $S['id_siswa']) ?> value="<?= $S['id_siswa'] ?>"><?= $S['nm_siswa'] ?></option>
                  <?php } ?>
                </select>
                <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                tidak menemukan Siswa? <a href="<?= base_url('admin/tambahSiswa') ?>">Tambahkan Siswa</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>UJIAN</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_ujian') != null ? "is-invalid" : "" ?>" name="id_ujian" id="id_ujian">
                  <option value="">PILIH UJIAN</option>
                  <?php foreach ($ujian as $U) { ?>
                    <option <?= set_select('id_ujian', $U['id_ujian']) ?> value="<?= $U['id_ujian'] ?>"><?= $U['jenis_ujian'] ?></option>
                  <?php } ?>
                </select>
                <?= form_error('id_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                tidak menemukan Ujian? <a href="<?= base_url('admin/tambahUjian') ?>">Tambahkan Ujian</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jenis Soal</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('jenis_soal') != null ? "is-invalid" : "" ?>" name="jenis_soal" id="jenis_soal">
                  <option value="">PILIH SOAL</option>
                  <option value="Pilihan Ganda">Pilihan Ganda</option>
                  <option value="Uraian">Uraian</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('jenis_soal', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="soal_jenis_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Jenis Soal">
              </div>
            </div>
          </div>
          <!-- refactoring nomor -->
          <div id="pilihan-ganda">
            <div class="row">
              <div class="col-sm-2">
                <label>Ini Kunci Jawaban?</label>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <div class="form-check form-check-inline <?= form_error('kunci') != null ? "is-invalid" : "" ?>">
                    <input class="form-check-input" type="radio" name="kunci" id="kunci-ya" value="1" ?>
                    <label class="form-check-label">IYA</label>
                    <input class="form-check-input" type="radio" name="kunci" id="kunci-tidak" value="0" ?>
                    <label class="form-check-label">TIDAK</label>
                  </div>
                  <?= form_error('kunci', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
            <?php foreach ($nomor as $N => $isi) : ?>
              <div class="row">
                <div class="col-sm-2">
                  <label><?= $isi[0] ?></label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <?php for ($i = 'A'; $i <= 'E'; $i++) : ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pg-<?= $isi[1] ?>" id="pg-<?= $isi[1], '-', $i ?>" value="<?= $i ?>" <?= set_radio($isi[1], $i) ?>>
                        <label class="form-check-label"><?= $i ?></label>
                      </div>
                    <?php endfor; ?>
                    <?= form_error($isi[1], '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
          <div id="uraian">
            <?php foreach ($nomor as $N => $isi) : ?>
              <div class="row">
                <div class="col-sm-2">
                  <label><?= $isi[0] ?></label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" class="form-control <?= form_error($isi[1]) != null ? "is-invalid" : "" ?>" name="uraian-<?= $isi[1] ?>" id="uraian-<?= $isi[1] ?>" placeholder="<?= $isi[2] ?>" value="<?= set_value($isi[1]) ?>">
                    <?= form_error($isi[1], '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Soal</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>