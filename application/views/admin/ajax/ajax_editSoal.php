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
<form role="form" action="" method="POST" id="isi-form">
  <div class="row">
    <div class="col-sm-2">
      <label>UJIAN</label>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <input type="hidden" class="form-control" name="id_soal" id="id_soal" value="<?= $soal['id_soal'] ?>">
        <select class="form-control <?= form_error('id_ujian') != null ? "is-invalid" : "" ?>" name="id_ujian" id="id_ujian">
          <option value="">PILIH UJIAN</option>
          <?php foreach ($ujian as $U) { ?>
            <option <?= set_select('id_ujian') != null ? set_select('id_ujian', $U['id_ujian']) : ($U['id_ujian'] == $soal['id_ujian'] ? 'selected' : '') ?> value="<?= $U['id_ujian'] ?>"><?= $U['jenis_ujian'] . ', ' . $U['mapel'] . ', ' . date('d-M-Y', $U['tgl_ujian']) ?></option>
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
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', $soal['jenis_soal']) : ($soal['jenis_soal'] == '' ? 'selected' : '') ?> value="">PILIH JENIS SOAL</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', $soal['jenis_soal']) : ($soal['jenis_soal'] == 'PILIHAN GANDA' ? 'selected' : '') ?> value="PILIHAN GANDA">PILIHAN GANDA</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', $soal['jenis_soal']) : ($soal['jenis_soal'] == 'URAIAN' ? 'selected' : '') ?> value="URAIAN">URAIAN</option>
          <option <?= set_select('jenis_soal') != null ? set_select('jenis_soal', $soal['jenis_soal']) : ($soal['jenis_soal'] == 'Lainnya' ? 'selected' : '') ?> value="Lainnya">Lainnya</option>
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
          <input type="text" class="form-control <?= form_error($val[1]) != null ? "is-invalid" : "" ?>" name="<?= $val[1] ?>" id="<?= $val[1] ?>" placeholder="<?= $val[2] ?>" value="<?= set_value($val[1]) != null ? set_value($val[1]) :  $soal["$val[1]"] ?>">
          <?= form_error($val[1], '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
  <p>NOTE : </p>
  <p>jika pilihan tidak sampai <b>E</b> maka silahkan <b>form pilihan E dikosongkan</b></p>
  <p>Jika anda memilih <b>Uraian</b> maka cukup isi <b>kunci jawaban</b> tanpa harus mengisi pilihan</p>

  <div class="row">
    <div class="col-8">
      capthca
    </div>
    <!-- /.col -->
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Edit Soal</button>
    </div>
    <!-- /.col -->
  </div>
</form>