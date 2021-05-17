<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Kelas</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Table" class="table table-bordered table-striped">
          <a href="<?= base_url('admin/tambahKelas') ?>" class="col-2 mb-4 btn btn-primary btn-block">
            Tambah Kelas</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun/Kelas</th>
              <th>Bidang</th>
              <th>Nomor Kelas</th>
              <th>jml_siswa</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($guru == null) {
              echo '<tr><td colspan="5">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($guru as $G) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $G['nm_guru'] ?></td>
                  <td><?= $G['nip'] ?></td>
                  <td><?= $G['mapel'] ?></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#editKelas" id="<?= $G['id_kelas'] ?>" class="badge badge-success view-data">edit</a>
                    <a href="<?= base_url('admin/delete/Kelas/') . $G['id_kelas'] ?>" class="badge badge-danger">hapus</a>
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
              <th>Tahun/Kelas</th>
              <th>Bidang</th>
              <th>Nomor Kelas</th>
              <th>jml_siswa</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

    <!-- edit modal  -->
    <div class="modal fade" id="editKelas" tabindex="-1" aria-labelledby="edit_KelasLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_KelasLabel">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailKelas">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>