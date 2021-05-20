<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Mata Pelajaran</h3>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table id="Table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Mata Pelajaran</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($mapel == null) {
              echo '<tr><td colspan="3">Data Tidak Di Temukan</td></tr>';
            } else {
              $i = 1; ?>
              <?php foreach ($mapel as $M) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $M['mapel'] ?></td>
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
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->

  </div>
</section>