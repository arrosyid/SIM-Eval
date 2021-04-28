<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIM Eval</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-2 mb-2 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url() ?>" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru') ?>" class="nav-link 
                    <?php if ($tittle == 'Dashboard') echo 'active'; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/analisis') ?>" class="nav-link
                        <?php if ($tittle == 'Hasil Analisis') echo 'active'; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Hasil Analisis</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Tabel</li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/guruSiswa') ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Guru dan Siswa') echo 'active'; ?>">
            <i class="nav-icon far fa-clock"></i>
            <p>Daftar Guru dan Siswa</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/mapel') ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Mata Pelajaran') echo 'active'; ?>">
            <i class="nav-icon fas fa-truck-loading"></i>
            <p>Daftar Mapel</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/kelas') ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Kelas') echo 'active'; ?>">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>Daftar Kelas</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/soal') ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Soal') echo 'active'; ?>">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>Daftar Soal</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/nilai') ?>" class="nav-link 
                    <?php if ($tittle == 'Distribusi Jawaban') echo 'active'; ?>">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>Distribusi Jawaban</p>
          </a>
        </li>
        <li class="nav-header">Setting</li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/myProfile') ?>" class="nav-link
                    <?php if ($tittle == 'Profile Anda') echo 'active'; ?>">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>My Profile</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/profileSekolah') ?>" class="nav-link
                    <?php if ($tittle == 'Profile Sekolah') echo 'active'; ?>">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>Profile sekolah</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('guru/editProfile') ?>" class="nav-link
                    <?php if ($tittle == 'Edit Profile Anda') echo 'active'; ?>">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>Edit Profile</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= base_url() ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
      </li>
      </ul>
    </nav>
  </div>
</aside>