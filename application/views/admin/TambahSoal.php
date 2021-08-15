<?php
$form = [
  ['Nomor Soal', 'nomor_soal', 'Isi Nomor Soal'],
  ['Pertanyaan', 'soal', 'Isi Pertanyaan'],
  ['Skor Soal', 'skor_soal', 'Isi Skor Soal'],
  ['Kunci Jawaban', 'kunci', 'Isi Kunci Jawaban'],
  ['Pilihan A', 'pilihan_a', 'Isi Pilihan Ganda A'],
  ['Pilihan B', 'pilihan_b', 'Isi Pilihan Ganda B'],
  ['Pilihan C', 'pilihan_c', 'Isi Pilihan Ganda C'],
  ['Pilihan D', 'pilihan_d', 'Isi Pilihan Ganda D'],
  ['Pilihan E', 'pilihan_e', 'Isi Pilihan Ganda E'],
];
?>
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
        <form role="form" action="" method="POST" id="isi-form">
          <div class="row">
            <div class="col-sm-2">
              <label>UJIAN</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_ujian') != null ? "is-invalid" : "" ?>" name="id_ujian" id="id_ujian">
                  <option value="">PILIH UJIAN</option>
                  <?php foreach ($ujian as $U) { ?>
                    <option <?= set_select('id_ujian', $U['id_ujian']) ?> value="<?= $U['id_ujian'] ?>"><?= $U['jenis_ujian'] . ', ' . $U['mapel'] . ', ' . date('d-M-Y', $U['tgl_ujian']) ?></option>
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
                  <option value="">PILIH JENIS SOAL</option>
                  <option value="PILIHAN GANDA">PILIHAN GANDA</option>
                  <option value="URAIAN">URAIAN</option>
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

          <?php foreach ($form as $F => $val) : ?>
            <div class="row">
              <div class="col-sm-2">
                <label><?= $val[0] ?></label>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" class="form-control <?= form_error($val[1]) != null ? "is-invalid" : "" ?>" name="<?= $val[1] ?>" id="<?= $val[1] ?>" placeholder="<?= $val[2] ?>" value="<?= set_value($val[1]) ?>">
                  <?= form_error($val[1], '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>

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