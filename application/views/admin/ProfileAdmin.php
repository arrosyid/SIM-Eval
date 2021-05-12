<section class="content">
  <div class="container-fluid">
    <?= $this->session->flashdata('message') ?>
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <img src="http://placehold.it/150x100" class="card-img-top img-fluid" alt="ini foto">
          <div class="card-body box-profile">
            <h5 class="profile-username text-center">Akun Anda</h5>
            <p class="card-text">
            <ul class="list-group mb-3">
              <lu>Username : <a class="float-right"><?= $user['username'] ?></a> <br></lu>
              <lu>Email : <a class="float-right"><?= $user['email'] ?></a> <br></lu>
              <lu>Tanggal Dibuat : <a class="float-right"><?= date('d-m-Y', $user['date_created']) ?></a> <br></lu>
            </ul>
            </p>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editPass">
              Ganti Password</button>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- tambah modal  -->
      <div class="modal fade" id="editPass" tabindex="-1" aria-labelledby="edit_SiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit_SiswaLabel">Ganti Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <strong>Password Baru</strong>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <label>Password</label>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="password1" id="password1" placeholder="Masukkan Password Baru Anda">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <label>Konfirmasi Password</label>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password Baru Anda">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <input type="submit" name="tambahModal" class="btn btn-danger" value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- About Me Box -->
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i>Profile Anda</strong>
            <ul class="text-muted">
              <lu>Nama Guru : <a class="float-right"><?= $guru['nm_guru'] ?></a> <br></lu>
              <lu>Nomor Induk Kepegawaian : <a class="float-right"><?= $guru['nip'] ?></a> <br></lu>
              <lu>Mata pelajaran yang Diampu : <a class="float-right"><?= $guru['mapel'] ?></a> <br></lu>
            </ul>
            <hr>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>