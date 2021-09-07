<?php
if ($user['level'] == 1) {
  $href = base_url('admin/');
  $role = 'Admin';
} elseif ($user['level'] == 2) {
  $href = base_url('guru/');
  $role = 'Guru';
} elseif ($user['level'] == 3) {
  $href = base_url('siswa/');
  $role = 'Siswa';
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/img/logo-lamongan.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIM Eval</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-2 mb-2 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= $href ?>" class="d-block"><?= $role ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= $href ?>" class="nav-link 
                    <?php if ($tittle == 'dashboard') echo 'active'; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        <li class="nav-item">
          <a href="<?= $href . 'analisis' ?>" class="nav-link
                        <?php if ($tittle == 'Hasil Analisis') echo 'active'; ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Hasil Analisis</p>
          </a>
        </li>
        </li>
        <li class="nav-header">Soal</li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarUjian' ?>" class="nav-link 
          <?php if ($tittle == 'Daftar Ujian') echo 'active'; ?>">
            <i class="nav-icon far fa-file-alt"></i>
            <p>Daftar Ujian</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarSoal' ?>" class="nav-link 
                  <?php if ($tittle == 'Daftar Soal') echo 'active'; ?>">
            <i class="nav-icon fas fa-lightbulb"></i>
            <p>Daftar Soal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'analisisSoal' ?>" class="nav-link 
                  <?php if ($tittle == 'Analisis Soal') echo 'active'; ?>">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Analisis Soal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'distJawaban' ?>" class="nav-link 
                    <?php if ($tittle == 'Distribusi Jawaban' || $tittle == 'Koreksi Soal' || $tittle == 'Skor Soal') echo 'active'; ?>">
            <i class="nav-icon fas fa-spell-check"></i>
            <p>Distribusi Jawaban</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'nilai' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Nilai') echo 'active'; ?>">
            <i class="nav-icon fas fa-poll-h"></i>
            <p>Nilai Siswa</p>
          </a>
        </li>
        <li class="nav-header">Daftar</li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarGuru' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Guru') echo 'active'; ?>">
            <i class="nav-icon fas fa-address-book"></i>
            <p>Daftar Guru</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarSiswa' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Siswa') echo 'active'; ?>">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Daftar Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarMapel' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Mapel') echo 'active'; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Daftar Mapel</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarKelas' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Kelas') echo 'active'; ?>">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>Daftar Kelas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'daftarPelajaran' ?>" class="nav-link 
                    <?php if ($tittle == 'Daftar Pelajaran') echo 'active'; ?>">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Daftar Pelajaran</p>
          </a>
        </li>
        <li class="nav-header">Setting</li>
        <li class="nav-item">
          <a href="<?= $href . 'profileAdmin' ?>" class="nav-link
                    <?php if ($tittle == 'Profile Anda' || $tittle == 'Profile Admin') echo 'active'; ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>My Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'profileSekolah' ?>" class="nav-link
                    <?php if ($tittle == 'Profile Sekolah') echo 'active'; ?>">
            <i class="nav-icon fas fa-school"></i>
            <p>Profile sekolah</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $href . 'editProfile' ?>" class="nav-link
                    <?php if ($tittle == 'Edit Profile Anda') echo 'active'; ?>">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>Edit Profile</p>
          </a>
        </li>
        <?php if ($user['level'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/editSekolah') ?>" class="nav-link
                      <?php if ($tittle == 'Edit Profile Sekolah') echo 'active'; ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>Edit Profile Sekolah</p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>