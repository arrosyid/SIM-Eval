<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Ujian</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <a href="<?= base_url('admin/tambahUjian') ?>" class="col-2 mb-4 btn btn-primary btn-block">
            Tambah Ujian</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th>Jenis Ujian</th>
              <th>KD</th>
              <th>KKM</th>
              <th>Jumlah Soal</th>
              <th>Jumlah Soal PG</th>
              <th>Jumlah Soal Uraian</th>
              <th>Skor Max Ujian</th>
              <th>Skor Max PG</th>
              <th>Skor Max Uraian</th>
              <th>Tanggal Ujian</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($ujian == null) {
              echo '<tr><td colspan="14" class="text-center">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($ujian as $U) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $U['mapel'] ?></td>
                  <td><?= $U['kelas'] . ' ' . $U['bidang'] . ' ' . $U['nomor_kelas'] ?></td>
                  <td><?= $U['jenis_ujian'] ?></td>
                  <td><?= $U['kd'] ?></td>
                  <td><?= $U['kkm'] ?></td>
                  <td><?= $U['jml_soal_ujian'] ?></td>
                  <td><?= $U['jml_soalpg'] ?></td>
                  <td><?= $U['jml_soaluo'] ?></td>
                  <td><?= $U['skor_max_ujian'] ?></td>
                  <td><?= $U['skor_maxpg'] ?></td>
                  <td><?= $U['skor_maxuo'] ?></td>
                  <td><?= date('d-m-Y', $U['tgl_ujian']) ?></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#editUjian" id="<?= $U['id_ujian'] ?>" class="btn btn-success view-data">edit</a>
                    <a href="#" data-url="<?= base_url('Delete/ujian/') . $U['id_ujian'] ?>" class="delete-daftar-ujian btn btn-danger">hapus</a>
                  </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th>Jenis Ujian</th>
              <th>KD</th>
              <th>KKM</th>
              <th>Jumlah Soal</th>
              <th>Jumlah Soal PG</th>
              <th>Jumlah Soal Uraian</th>
              <th>Skor Max Ujian</th>
              <th>Skor Max PG</th>
              <th>Skor Max Uraian</th>
              <th>Tanggal Ujian</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

    <!-- edit modal  -->
    <div class="modal fade" id="editUjian" tabindex="-1" aria-labelledby="edit_UjianLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_UjianLabel">Edit Ujian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailUjian">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>