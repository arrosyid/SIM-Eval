<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Guru</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message1'); ?>
        <table id="Tables" class="table table-bordered table-striped">
          <a href="<?= base_url('admin/tambahGuru') ?>" class="col-2 mb-4 btn btn-primary btn-block">
            Tambah Guru</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Guru</th>
              <th>NIP</th>
              <th>Mata Pelajaran</th>
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
                    <a href="" data-toggle="modal" data-target="#editGuru" id="<?= $G['id_guru'] ?>" class="btn btn-success view-data">edit</a>
                    <a href="#" data-url="<?= base_url('Delete/guru/') . $G['id_guru'] ?>" class="delete-daftar-guru btn btn-danger">hapus</a>
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
              <th>Nama Guru</th>
              <th>NIP</th>
              <th>Mata Pelajaran</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

    <!-- edit modal  -->
    <div class="modal fade" id="editGuru" tabindex="-1" aria-labelledby="edit_GuruLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_GuruLabel">Tambah Guru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detailGuru">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>