<section class="content">
  <div class="container-fluid">

    <!-- HEADER -->
    <div class="jumbotron jumbotron-fluid text-white">
      <div class="container">
        <h1 class="display-4 font-weight-bold">SMP NEGERI 2 SUGIO</h1>
      </div>
    </div>
    <!-- END HEADER -->

    <div class="row gutters-sm">

      <!-- USER CARD -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 75C0 33.5786 33.5786 0 75 0C116.421 0 150 33.5786 150 75C150 116.421 116.421 150 75 150C33.5786 150 0 116.421 0 75Z" fill="#FFC96B"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M75 75.5801C87.4265 75.5801 97.5 65.5065 97.5 53.0801C97.5 40.6537 87.4265 30.5801 75 30.5801C62.5736 30.5801 52.5 40.6537 52.5 53.0801C52.5 65.5065 62.5736 75.5801 75 75.5801ZM75 135.58C93.9059 135.58 110.798 126.789 121.804 113.081C110.798 99.3714 93.9055 90.5801 74.9991 90.5801C56.0932 90.5801 39.2008 99.371 28.1949 113.08C39.2007 126.789 56.0936 135.58 75 135.58Z" fill="#7E5700"/>
              </svg>
              <div class="mt-3">
                <h4><?= $user['username'] ?></h4>
                <p class="text-secondary mb-1"><?= $user['email'] ?></p>
                <p class="text-muted font-size-sm">Akun dibuat pada <?= date('d-m-Y', $user['date_created']) ?></p>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editPass">Ganti Password</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END USER CARD -->

      <!-- PROFILE -->
      <div class="col-md-8">
        <div class="card card-primary mb-3">
          <div class="card-header py-3">
            <h3 class="card-title"><i class="fas fa-user mr-1"></i>Profil</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nama</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $guru['nm_guru'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">NIP</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $guru['nip'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Mata Pelajaran</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $guru['mapel'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <a href="#" class="btn btn-warning py-2"><i class="fas fa-edit"></i> Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
      <!-- END PROFILE -->

    </div>



    <?= $this->session->flashdata('message') ?>
    <?= $this->session->flashdata('message1') ?>
    <div class="row">
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
                      <input type="text" class="form-control <?= form_error('password1') != null ? "is-invalid" : "" ?>" name="password1" id="password1" placeholder="Masukkan Password Baru Anda" value="<?= set_value('password1') ?>">
                      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <label>Konfirmasi Password</label>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control<?= form_error('password2') != null ? "is-invalid" : "" ?>" name="password2" id="password2" placeholder="Konfirmasi Password Baru Anda">
                      <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
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
    </div>


  </div>

  <!-- Stylesheet -->
  <style>
    .jumbotron {
      background: url("https://images.unsplash.com/photo-1553526777-5ffa3b3248d8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"), linear-gradient(to bottom, #ADB2B6, #ABAEB3);
      background-size: cover;
      background-position: bottom;
    }
  </style>
</section>