<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
      (new IonAuth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
    $this->load->model('Mapel_model');
    $this->load->model('Guru_model');
    $this->load->model('Siswa_model');
    $this->load->model('Kelas_model');
    $this->load->model('Sekolah_model');
    $this->load->model('Soal_model');
  }

  public function index()
  {
    // dashboard
    $data['tittle'] = 'dashboard';
    $data['subtittle'] = 'Tambah Guru Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    echo 'selamat datang admin';
    echo '<a href="' . base_url('auth/logout') . '"> keluar </a>';
    $this->load->view('templates/admin_footer');
  }

  public function analisis()
  {
    // read data analisis
    $data['tittle'] = 'Hasil Analisis';
  }

  public function nilai()
  {
    // Read Nilai per ujian siwa
  }

  public function skor()
  {
    // Input skor soal Uraian
  }

  public function jawaban()
  {
    // Read distribusi jawaban siswa dan kunci jawaban
    $data['tittle'] = 'Distribusi Jawaban';
  }

  public function daftarKelas()
  {
    // Read Data Kelas
    $data['tittle'] = 'Daftar Kelas';
    $data['subtittle'] = 'Daftar Semua Soal';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();

    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('nomor_kelas', 'Nomor Kelas', 'required|trim');
    $this->form_validation->set_rules('id_guru', 'Wali Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_siswa', 'Jumlah Siswa', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarKelas');
      $this->load->view('templates/admin_footer');
    } else {
      $data_kelas = [
        'kelas' => htmlspecialchars($this->input->post('kelas', true)),
        'bidang' => htmlspecialchars($this->input->post('bidang', true)),
        'nomor_kelas' => htmlspecialchars($this->input->post('nomor_kelas', true)),
        'id_guru' => htmlspecialchars($this->input->post('id_guru', true)),
        'jml_siswa' => htmlspecialchars($this->input->post('jml_siswa', true)),
      ];
      // var_dump($data_kelas);
      // die;
      if ($this->db->insert('tb_kelas', $data_kelas)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Kelas</div>'
        );
        redirect('admin/daftarKelas');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Kelas</div>'
        );
        redirect('admin/daftarKelas');
      }
    }
  }

  public function daftarSoal()
  {
    // Read data soal
    $data['tittle'] = 'Daftar Soal';
    $data['subtittle'] = 'Daftar Semua Soal';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['soal'] = $this->Soal_model->getAllSoal();
    // var_dump($data['soal']);
    // die;

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/DaftarSoal');
    $this->load->view('templates/admin_footer');
  }

  public function daftarMapel()
  {
    // Read Data Mapel
    $data['tittle'] = 'Daftar Mata Pelajaran';
    $data['subtittle'] = 'Daftar Mata Pelajaran';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['mapel'] = $this->Mapel_model->getAllMapel();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/DaftarMapel');
    $this->load->view('templates/admin_footer');
  }

  public function daftarGuru()
  {
    // Read Data Guru
    $data['tittle'] = 'Daftar Guru';
    $data['subtittle'] = 'Daftar Guru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['guru'] = $this->Guru_model->getAllGuru();
    $data['mapel'] = $this->Mapel_model->getAllMapel();

    $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarGuru');
      $this->load->view('templates/admin_footer', $data);
    } else {
      $data_guru = [
        'nm_guru' => htmlspecialchars($this->input->post('nm_guru', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
      ];
      // var_dump($data_guru);
      // die;
      if ($this->db->insert('tb_guru', $data_guru)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Guru</div>'
        );
        redirect('admin/daftarGuru');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Guru</div>'
        );
        redirect('admin/daftarGuru');
      }
    }
  }

  public function profileAdmin()
  {
    // read profile guru
    $data['tittle'] = 'Profile Anda';
    $data['subtittle'] = 'Profile Anda';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['guru'] = $this->Guru_model->getGuruByType('id_guru', $data['user']['id_guru']);
    // var_dump($data['guru']);
    // die;
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'min_length' => 'password terlalu pendek!',
      'matches' => 'password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/ProfileAdmin');
      $this->load->view('templates/admin_footer');
    } else {
      $data_password = [
        'password' => password_hash(
          htmlspecialchars($this->input->post('password1', true)),
          PASSWORD_DEFAULT
        )
      ];
      if ($this->User_model->updateUserById($data_password, $data['user']['id_user'])) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Password atau Kata Sandi Anda</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Password atau Kata Sandi Anda</div>'
        );
      }
    }
  }

  public function profileSekolah()
  {
    // read profile sekolah
    $data['tittle'] = 'Profile Sekolah';
    $data['subtittle'] = 'Profile Sekolah';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid(1);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/ProfileSekolah');
    $this->load->view('templates/admin_footer');
  }

  public function editProfile()
  {
    // edit profile guru
    $data['tittle'] = 'Edit Profile Anda';
    $data['subtittle'] = 'Edit Profile Anda';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['guru'] = $this->Guru_model->getGuruByType('id_guru', $data['user']['id_guru']);

    $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
      'valid_email' => 'email tidak cocok',
      'is_unique' => 'email sudah digunakan'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/EditProfileAdmin');
      $this->load->view('templates/admin_footer');
    } else {
      $data_guru = [
        'nm_guru' => htmlspecialchars($this->input->post('nm_guru', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true))
      ];
      $data_akunGuru = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
      ];
      if ($this->db->insert('tb_akun', $data_akunGuru)) {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Akun Anda</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Akun Anda</div>'
        );
      }
      if ($this->db->insert('tb_guru', $data_guru)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Anda</div>'
        );
        redirect('admin/profileAdmin');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Anda</div>'
        );
        redirect('admin/profileAdmin');
      }
    }
  }

  public function editSekolah($id_sekolah)
  {
    // edit & Input data sekolah
    $data['tittle'] = 'Edit Profile Sekolah';
    $data['subtittle'] = 'Edit Profile Sekolah';
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid($id_sekolah);
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);

    $this->form_validation->set_rules('nm_sekolah', 'Nama Sekolah', 'required|trim');
    $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim');
    $this->form_validation->set_rules('nm_kepsek', 'Nama Kepala Sekolah', 'required|trim');
    $this->form_validation->set_rules('nm_admin', 'Nama Admin Sekolah', 'required|trim');
    $this->form_validation->set_rules('telfon', 'Nomor Telfon', 'required|trim');
    $this->form_validation->set_rules('website', 'Website', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
      'valid_email' => 'email tidak cocok',
      'is_unique' => 'email sudah digunakan'
    ]);
    $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required|trim');
    $this->form_validation->set_rules('kurikulum', 'Kurikulum', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('bentuk_pendidikan', 'Bentuk Pendidikan', 'required|trim');
    $this->form_validation->set_rules('sk_pendirian', 'SK Pendirian Sekolah', 'required|trim');
    $this->form_validation->set_rules('tgl_sk_pendirian', 'Tanggal SK Pendirian Sekolah', 'required|trim');
    $this->form_validation->set_rules('sk_izin', 'SK Izin Sekolah', 'required|trim');
    $this->form_validation->set_rules('tgl_sk_izin', 'Tanggal SK Izin Sekolah', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/EditSekolah');
      $this->load->view('templates/admin_footer');
    } else {
      $data_sekolah = [
        'nm_sekolah' => htmlspecialchars($this->input->post('nm_sekolah', true)),
        'npsn' => htmlspecialchars($this->input->post('npsn', true)),
        'nm_kepsek' => htmlspecialchars($this->input->post('nm_kepsek', true)),
        'nm_admin' => htmlspecialchars($this->input->post('nm_admin', true)),
        'telfon' => htmlspecialchars($this->input->post('telfon', true)),
        'website' => htmlspecialchars($this->input->post('website', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'akreditasi' => htmlspecialchars($this->input->post('akreditasi', true)),
        'kurikulum' => htmlspecialchars($this->input->post('kurikulum', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'bentuk_pendidikan' => htmlspecialchars($this->input->post('bentuk_pendidikan', true)),
        'sk_pendirian' => htmlspecialchars($this->input->post('sk_pendirian', true)),
        'tgl_sk_pendirian' => htmlspecialchars($this->input->post('tgl_sk_pendirian', true)),
        'sk_izin' => htmlspecialchars($this->input->post('sk_izin', true)),
        'tgl_sk_izin' => htmlspecialchars($this->input->post('tgl_sk_izin', true)),
      ];
      // var_dump($data_sekolah);
      // die;

      if ($this->Sekolah_model->upadateSekolahById($id_sekolah, $data_sekolah)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Sekolah</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Sekolah</div>'
        );
      }
    }
  }

  public function tambahGuru()
  {
    // Input data guru
    //  dapat otomatis menambah user baru dengan nip guru dan password default
    $data['tittle'] = 'tambah guru';
    $data['subtittle'] = 'Tambah Guru Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['mapel'] = $this->Mapel_model->getAllMapel();
    // var_dump($data['mapel']);
    // die;

    $akun = $this->input->post('akun', true);
    $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    if ($akun == 1) {
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
        'valid_email' => 'email tidak cocok',
        'is_unique' => 'email sudah digunakan'
      ]);
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
        'min_length' => 'password terlalu pendek!',
        'matches' => 'password tidak sama!'
      ]);
      $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahGuru');
      $this->load->view('templates/admin_footer');
    } else {
      $data_guru = [
        'nm_guru' => htmlspecialchars($this->input->post('nm_guru', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
      ];
      $data_akunGuru = [
        'username' => htmlspecialchars($this->input->post('nm_guru', true)),
        'status' => htmlspecialchars($this->input->post('status', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => htmlspecialchars($this->input->post('password', true)),
      ];
      if ($this->db->insert('tb_akun', $data_akunGuru)) {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menginputkan Data Akun Guru</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Akun Guru</div>'
        );
      }
      if ($this->db->insert('tb_guru', $data_guru)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menginputkan Data Guru</div>'
        );
        redirect('admin/tambahGuru');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Guru</div>'
        );
        redirect('admin/tambahGuru');
      }
    }
  }

  public function daftarSiswa()
  {
    // Input data siswa
    $data['tittle'] = 'Daftar Siswa';
    $data['subtittle'] = 'Daftar Siswa Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['siswa'] = $this->Siswa_model->getAllSiswa();
    $data['kelas'] = $this->Kelas_model->getAllKelas();

    $this->form_validation->set_rules('nm_siswa', 'Nama Siswa', 'required|trim');
    $this->form_validation->set_rules('nis', 'Nomor Induk Siswa', 'required|trim');
    // $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarSiswa');
      $this->load->view('templates/admin_footer', $data);
    } else {
      $data_siswa = [
        'nm_siswa' => htmlspecialchars($this->input->post('nm_siswa', true)),
        'nis' => htmlspecialchars($this->input->post('nis', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
      ];
      // var_dump($data_siswa);
      // die;
      if ($this->db->insert('tb_siswa', $data_siswa)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Mengubah Data Kelas</div>'
        );
        redirect('admin/daftarSiswa');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Mengubah Data Kelas</div>'
        );
        redirect('admin/daftarSiswa');
      }
    }
  }

  public function tambahKelas()
  {
    // Input data Kelas
    $data['tittle'] = 'Tambah Kelas';
    $data['subtittle'] = 'Tambah Kelas Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['guru'] = $this->Guru_model->getAllGuru();

    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('nomor_kelas', 'Nomor Kelas', 'required|trim');
    $this->form_validation->set_rules('id_guru', 'Wali Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_siswa', 'Jumlah Siswa', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahKelas');
      $this->load->view('templates/admin_footer');
    } else {
      $data_kelas = [
        'kelas' => htmlspecialchars($this->input->post('kelas', true)),
        'bidang' => htmlspecialchars($this->input->post('bidang', true)),
        'nomor_kelas' => htmlspecialchars($this->input->post('nomor_kelas', true)),
        'id_guru' => htmlspecialchars($this->input->post('id_guru', true)),
        'jml_siswa' => htmlspecialchars($this->input->post('jml_siswa', true)),
      ];
      if ($this->db->insert('tb_kelas', $data_kelas)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Kelas</div>'
        );
        redirect('admin/tambahKelas');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Kelas</div>'
        );
        redirect('admin/tambahKelas');
      }
    }
  }

  public function tambahMapel()
  {
    // Input data mata pelajaran
    $data['tittle'] = 'Tambah Mata Pelajaran';
    $data['subtittle'] = 'Tambah Mata Pelajaran Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);

    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahMapel');
      $this->load->view('templates/admin_footer');
    } else {
      $data_mapel = [
        'mapel' => htmlspecialchars($this->input->post('mapel', true))
      ];
      if ($this->db->insert('tb_mapel', $data_mapel)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Mata Pelajaran</div>'
        );
        redirect('admin/tambahMapel');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Mata Pelajaran</div>'
        );
        redirect('admin/tambahMapel');
      }
    }
  }

  // fungsi untuk ajax
  public function ajax()
  {
    $ajax_menu = $this->input->post('ajax_menu', true);


    // ajax edit SISWA
    if ($ajax_menu == 'get_siswa') {
      $id_siswa = $this->input->post('id_siswa', true);
      $data['siswa'] = $this->Siswa_model->getSiswaByType('id_siswa', $id_siswa);
      $data['kelas'] = $this->Kelas_model->getAllKelas();
      $this->load->view('admin/ajax/ajax_editSiswa', $data);
    }

    // ajax edit GURU
    if ($ajax_menu == 'get_guru') {
      $id_guru = $this->input->post('id_guru', true);
      $data['guru'] = $this->Guru_model->getGuruByType('id_guru', $id_guru);
      $data['mapel'] = $this->Mapel_model->getAllMapel();
      $this->load->view('admin/ajax/ajax_editGuru', $data);
    }

    // ajax edit Soal
    if ($ajax_menu == 'get_soal') {
      $id_soal = $this->input->post('id_soal', true);
      $data['soal'] = $this->Soal_model->getSoalByType('id_soal', $id_soal);
      $data['mapel'] = $this->Mapel_model->getAllMapel();
      $data['kelas'] = $this->Kelas_model->getAllKelas();
      $this->load->view('admin/ajax/ajax_editSoal', $data);
    }

    // ajax edit kelas
    if ($ajax_menu == 'get_kelas') {
      $id_kelas = $this->input->post('id_kelas', true);
      $data['kelas'] = $this->Kelas_model->getKelasByType('id_kelas', $id_kelas);
      $data['guru'] = $this->Guru_model->getAllGuru();
      $this->load->view('admin/ajax/ajax_editKelas', $data);
    }
  }
}
