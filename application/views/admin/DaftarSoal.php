<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Soal</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <a href="<?= base_url('admin/tambahSoal') ?>" class="col-2 mb-4 btn btn-primary btn-block">
            Tambah Soal</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Jenis Soal</th>
              <th>Ujian</th>
              <th>jawaban</th>
              <th>kelompok</th>
              <th>Jumlah skor</th>
              <th>Nilai</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($soal == null) {
              echo '<tr><td colspan="9" class="text-center">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($soal as $S) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $S['nm_siswa'] ?></td>
                  <td><?= $S['jenis_soal'] ?></td>
                  <td><a href="<?= base_url('admin/') . $S['id_jawab'] ?>" class="btn btn-warning">detail jawaban</a></td>
                  <td><?= $S['kelompok'] ?></td>
                  <td><?= $S['jml_skor'] ?></td>
                  <td><?= $S['nilai'] ?></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#editSoal" id="<?= $S['id_soal'] ?>" class="btn btn-success view-data">edit</a>
                    <a href="#" data-url="<?= base_url('Delete/soal/') . $S['id_soal'] ?>" class="delete-daftar-soal btn btn-danger">hapus</a>
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
              <th>Nama Siswa</th>
              <th>Jenis Soal</th>
              <th>Ujian</th>
              <th>jawaban</th>
              <th>kelompok</th>
              <th>Jumlah skor</th>
              <th>Nilai</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

    <!-- edit modal  -->
    <div class="modal fade" id="editSoal" tabindex="-1" aria-labelledby="edit_SoalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_SoalLabel">Edit Soal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailSoal">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>