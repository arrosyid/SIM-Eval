<div class="card-body">
  <p class="login-box-msg">Daftar guru baru</p>
  <?= $this->session->flashdata('message') ?>
  <form action="" method="post">

    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="text" id="name" name="name" class="form-control" placeholder="Nama lengkap" value="<?= set_value('name'); ?>">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" id="password2" name="password2" class="form-control" placeholder="konfirmasi password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        capthca
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <a href="<?= base_url('auth') ?>" class="text-center">Sudah punya akun?</a>
</div>
<!-- /.form-box -->