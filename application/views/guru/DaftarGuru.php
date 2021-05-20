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
        <table id="Table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Guru</th>
              <th>NIP</th>
              <th>Mata Pelajaran</th>
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
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

  </div>
</section>