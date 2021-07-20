<?php
$form = [
  ['Skor Maksimal Ujian', 'skor_max_ujian', 'isi Skor Maksimal Ujian'],
  ['Skor Maksimal Pilihan Ganda', 'skor_maxpg', 'isi Skor Maksimal Pilihan Ganda'],
  ['Skor Maksimal Uraian', 'skor_maxuo', 'isi Skor Maksimal Uraian'],
  ['Jumlah Soal Ujian', 'jml_soal_ujian', 'isi Jumlah Soal Ujian'],
  ['Jumlah Soal Pilihan Ganda', 'jml_soalpg', 'isi Jumlah Soal Pilihan Ganda'],
  ['Jumlah Soal Uraian', 'jml_soaluo', 'isi Jumlah Soal Uraian'],
  ['Kompetensi Dasar', 'kd', 'isi Kompetensi Dasar'],
  ['Kriteria Ketuntasan Minimal (KKM)', 'kkm', 'isi Kriteria Ketuntasan Minimal (KKM)'],
  ['Tanggal Ujian', 'kkm', 'isi Tanggal Ujian'],
]
?>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Tambahkan Soal</h3>
      </div>
      <div class="card-body">
        <form role="form" action="" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <label>Mata Pelajaran</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_pelajaran') != null ? "is-invalid" : "" ?>" name="id_pelajaran" id="id_pelajaran">
                  <option value="">PILIH MATA PELAJARAN</option>
                  <?php foreach ($pelajaran as $M) { ?>
                    <option <?= set_select('id_pelajaran', $M['id_pelajaran']) ?> value="<?= $M['id_pelajaran'] ?>"><?= $M['mapel'], ', SMT : ' . $M['semester'], ', THN : ' . $M['thn_pelajaran'] ?></option>
                  <?php } ?>
                </select>
                <?= form_error('id_pelajaran', '<small class="text-danger pl-3">', '</small><br>'); ?>
                tidak menemukan Mata Pelajaran? <a href="<?= base_url('admin/tambahPelajaran') ?>">Tambahkan Mata Pelajaran</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Jenis Ujian</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('jenis_ujian') != null ? "is-invalid" : "" ?>" name="jenis_ujian" id="jenis_ujian">
                  <option value="">PILIH JENIS</option>
                  <option <?= set_select('jenis_ujian', 'UH') ?> value="UH">UH</option>
                  <option <?= set_select('jenis_ujian', 'PTS') ?> value="PTS">PTS</option>
                  <option <?= set_select('jenis_ujian', 'PAS') ?> value="PAS">PAS</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <?= form_error('jenis_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-5" id="ujian_jenis_lainnya">
              <div class="form-group">
                <input type="text" class="form-control" name="" placeholder="Isi Jenis Ujian">

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Kelas</label>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <select class="form-control <?= form_error('id_kelas') != null ? "is-invalid" : "" ?>" name="id_kelas" id="id_kelas">
                  <option value="">PILIH KELAS</option>
                  <?php foreach ($kelas as $K) : ?>
                    <option <?= set_select('id_kelas', $K['id_kelas']) ?> value="<?= $K['id_kelas'] ?>"><?= $K['kelas'] . ' ' . $K['bidang'] . ' ' . $K['nomor_kelas'] ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small> <br>'); ?>
                tidak menemukan kelas? <a href="<?= base_url('admin/tambahKelas') ?>">Tambahkan Kelas</a>
              </div>
            </div>
          </div>

          <?php foreach ($form as $F => $for) : ?>
            <div class="row">
              <div class="col-sm-2">
                <label><?= $for[0] ?></label>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" class="form-control <?= form_error($for[1]) != null ? "is-invalid" : "" ?>" name="<?= $for[1] ?>" id="<?= $for[1] ?>" placeholder="<?= $for[2] ?>" value="<?= set_value($for[1]) ?>">
                  <?= form_error($for[1], '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>

          <div class="row">
            <div class="col-sm-2">
              <label>Tanggal Ujian</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="date" class="form-control <?= form_error('tgl_ujian') != null ? "is-invalid" : "" ?>" name="tgl_ujian" id="tgl_ujian" placeholder="isi Tanggal Ujian" value="<?= set_value('tgl_ujian') ?>">
                <?= form_error('tgl_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              capthca
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Tambah Ujian</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</section>