<?php
$identitas = [
  ["NPSN",  $sekolah['npsn']],
  ["Nama Kepala Sekolah", $sekolah['nm_kepsek']],
  ["Akreditasi", $sekolah['akreditasi']],
  ["Kurikulum", $sekolah['kurikulum']],
  ["Alamat", $sekolah['alamat']],
];
?>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <!-- JUMLAH STATS -->
    <div class="row">
      <div class="col-md-3 my-2">
        <div>
          <div class="dashboard-card card-orange">
            <div class="d-flex align-items-center">
              <svg width="39" height="29" viewBox="0 0 39 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.658 6.21428C17.658 9.65285 15.3071 12.4286 12.3729 12.4286C9.4388 12.4286 7.07026 9.65285 7.07026 6.21428C7.07026 2.77571 9.4388 0 12.3729 0C15.3071 0 17.658 2.77571 17.658 6.21428ZM31.7985 6.21428C31.7985 9.65285 29.4476 12.4286 26.5135 12.4286C23.5793 12.4286 21.2108 9.65285 21.2108 6.21428C21.2108 2.77571 23.5793 0 26.5135 0C29.4476 0 31.7985 2.77571 31.7985 6.21428ZM12.3729 16.5715C8.25451 16.5715 0 18.995 0 23.8214V29H24.7459V23.8214C24.7459 18.995 16.4914 16.5715 12.3729 16.5715ZM24.799 16.675C25.4176 16.6128 26.0009 16.5714 26.5135 16.5714C30.6319 16.5714 38.8864 18.995 38.8864 23.8214V29H28.281V23.8214C28.281 20.7557 26.8493 18.415 24.799 16.675Z" fill="black" fill-opacity="0.9" />
              </svg>
              <div class="ml-4">
                <p class="mb-0">Jumlah Siswa Terdaftar</p>
                <p class="mb-0"><?= $jml['siswa'] ?> orang</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 my-2">
        <div class="dashboard-card card-blue">
          <div class="d-flex align-items-center">
            <svg width="39" height="29" viewBox="0 0 39 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.658 6.21428C17.658 9.65285 15.3071 12.4286 12.3729 12.4286C9.4388 12.4286 7.07026 9.65285 7.07026 6.21428C7.07026 2.77571 9.4388 0 12.3729 0C15.3071 0 17.658 2.77571 17.658 6.21428ZM31.7985 6.21428C31.7985 9.65285 29.4476 12.4286 26.5135 12.4286C23.5793 12.4286 21.2108 9.65285 21.2108 6.21428C21.2108 2.77571 23.5793 0 26.5135 0C29.4476 0 31.7985 2.77571 31.7985 6.21428ZM12.3729 16.5715C8.25451 16.5715 0 18.995 0 23.8214V29H24.7459V23.8214C24.7459 18.995 16.4914 16.5715 12.3729 16.5715ZM24.799 16.675C25.4176 16.6128 26.0009 16.5714 26.5135 16.5714C30.6319 16.5714 38.8864 18.995 38.8864 23.8214V29H28.281V23.8214C28.281 20.7557 26.8493 18.415 24.799 16.675Z" fill="black" fill-opacity="0.9" />
            </svg>
            <div class="ml-4">
              <p class="mb-0">Jumlah Guru Terdaftar</p>
              <p class="mb-0"><?= $jml['guru'] ?> orang</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 my-2">
        <div class="dashboard-card card-gray">
          <div class="d-flex align-items-center">
            <svg width="39" height="29" viewBox="0 0 39 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.658 6.21428C17.658 9.65285 15.3071 12.4286 12.3729 12.4286C9.4388 12.4286 7.07026 9.65285 7.07026 6.21428C7.07026 2.77571 9.4388 0 12.3729 0C15.3071 0 17.658 2.77571 17.658 6.21428ZM31.7985 6.21428C31.7985 9.65285 29.4476 12.4286 26.5135 12.4286C23.5793 12.4286 21.2108 9.65285 21.2108 6.21428C21.2108 2.77571 23.5793 0 26.5135 0C29.4476 0 31.7985 2.77571 31.7985 6.21428ZM12.3729 16.5715C8.25451 16.5715 0 18.995 0 23.8214V29H24.7459V23.8214C24.7459 18.995 16.4914 16.5715 12.3729 16.5715ZM24.799 16.675C25.4176 16.6128 26.0009 16.5714 26.5135 16.5714C30.6319 16.5714 38.8864 18.995 38.8864 23.8214V29H28.281V23.8214C28.281 20.7557 26.8493 18.415 24.799 16.675Z" fill="black" fill-opacity="0.9" />
            </svg>
            <div class="ml-4">
              <p class="mb-0">Jumlah Kelas Terdaftar</p>
              <p class="mb-0"><?= $jml['kelas'] ?> kelas</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 my-2">
        <div class="dashboard-card card-purple">
          <div class="d-flex align-items-center">
            <svg width="39" height="29" viewBox="0 0 39 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.658 6.21428C17.658 9.65285 15.3071 12.4286 12.3729 12.4286C9.4388 12.4286 7.07026 9.65285 7.07026 6.21428C7.07026 2.77571 9.4388 0 12.3729 0C15.3071 0 17.658 2.77571 17.658 6.21428ZM31.7985 6.21428C31.7985 9.65285 29.4476 12.4286 26.5135 12.4286C23.5793 12.4286 21.2108 9.65285 21.2108 6.21428C21.2108 2.77571 23.5793 0 26.5135 0C29.4476 0 31.7985 2.77571 31.7985 6.21428ZM12.3729 16.5715C8.25451 16.5715 0 18.995 0 23.8214V29H24.7459V23.8214C24.7459 18.995 16.4914 16.5715 12.3729 16.5715ZM24.799 16.675C25.4176 16.6128 26.0009 16.5714 26.5135 16.5714C30.6319 16.5714 38.8864 18.995 38.8864 23.8214V29H28.281V23.8214C28.281 20.7557 26.8493 18.415 24.799 16.675Z" fill="black" fill-opacity="0.9" />
            </svg>
            <div class="ml-4">
              <p class="mb-0">Jumlah Mata Pelajaran</p>
              <p class="mb-0"><?= $jml['mapel'] ?> mapel</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END JUMLAH STATS -->

    <!-- PROFILE AND PIE CHART -->
    <div class="row my-3">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header py-3">
            <h2 class="text-center"><?= $sekolah['nm_sekolah'] ?></h2>
          </div>
          <div class="card-body">
            <!-- COLUMN -->
            <?php for ($i = 0; $i < count($identitas); $i++) { ?>
              <div class="row">
                <div class="col-sm-4"><?= $identitas[$i][0] ?></div>
                <div class="col-sm-8 text-secondary">
                  <?= $identitas[$i][1] ?>
                </div>
              </div>

              <?php if ($i < count($identitas) - 1) {
                echo "<hr>";
              }
              ?>
            <?php } ?>
            <!-- END COLUMN -->
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Kelompok Atas Bawah</h4>
          </div>
          <div class="card-body">
            <canvas id="chartKelompok" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header py-3">
            <h4 class="card-title">Program Perbaikan dan Pengayaan</h4>
          </div>
          <div class="card-body">
            <canvas id="chartProgram" width="100%" height="100%"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- END PROFILE AND PIE CHART -->

    <!-- ACTIVITY AND GRAPH CHART -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header py-3">
            <p class="card-title">Activity Monitor</p>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex flex-row">
                <div class="ms-2">
                  <p class="mb-0">Admin</p> <span class="text-secondary">1 days ago</span>
                </div>
              </div>
              <div class="badge badge-green d-flex justify-content-center align-items-center"><i class="fas fa-arrow-up text-white"></i></div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex flex-row">
                <div class="ms-2">
                  <p class="mb-0">John Cena</p> <span class="text-secondary">1 days ago</span>
                </div>
              </div>
              <div class="badge badge-red d-flex justify-content-center align-items-center"><i class="fas fa-arrow-down text-white"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header py-3">
            <p class="card-title">Grafik Ketuntasan Belajar Siswa</p>
          </div>
          <div class="card-body">
            <canvas id="chartKetuntasan" width="100%" height="50px"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- END ACTIVITY AND GRAPH CHART -->

  </div>
</div>