<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 2) {
      (new IonAuth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
  }

  public function index()
  {
    // dashboard
    $data['tittle'] = 'Dashboard';
    echo 'selamat datang guru';
    echo '<a href="' . base_url('auth/logout') . '"> keluar </a>';
  }
  public function analisis()
  {
    // read data analisis
    $data['tittle'] = 'Hasil Analisis';
  }

  public function mapel()
  {
    // Read Data Mapel
    $data['tittle'] = 'Daftar Mata Pelajaran';
  }
  public function kelas()
  {
    // Read Data Kelas
    $data['tittle'] = 'Daftar Kelas';
  }
  public function nilai()
  {
    // Read & Input Nilai per ujian siwa
  }
  public function skor()
  {
    // Input skor soal Uraian
  }
  public function jawaban()
  {
    // Read & Input distribusi jawaban siswa dan kunci jawaban
    $data['tittle'] = 'Distribusi Jawaban';
  }

  public function daftarKelas()
  {
    // Read Data Kelas
    $data['tittle'] = 'Daftar Kelas';
    $data['subtittle'] = 'Daftar Semua Kelas';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();

    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('nomor_kelas', 'Nomor Kelas', 'required|trim');
    $this->form_validation->set_rules('id_guru', 'Wali Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_siswa', 'Jumlah Siswa', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('guru/DaftarKelas');
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
        redirect('guru/daftarKelas');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Kelas</div>'
        );
        redirect('guru/daftarKelas');
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

    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required|trim');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_soal', 'Jumlah Soal', 'required|trim');
    $this->form_validation->set_rules('kd', 'Kopempetensi Dasar', 'required|trim');
    $this->form_validation->set_rules('kkm', 'KKM', 'required|trim');
    $this->form_validation->set_rules('skor_max', 'Nilai Maksimal', 'required|trim');
    $this->form_validation->set_rules('tgl_ujian', 'Tanggal Ujian', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('guru/DaftarSoal');
      $this->load->view('templates/admin_footer');
    } else {
      $data_soal = [
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
        'jenis_soal' => htmlspecialchars($this->input->post('jenis_soal', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
        'jml_soal' => htmlspecialchars($this->input->post('jml_soal', true)),
        'kd' => htmlspecialchars($this->input->post('kd', true)),
        'kkm' => htmlspecialchars($this->input->post('kkm', true)),
        'skor_max' => htmlspecialchars($this->input->post('skor_max', true)),
        'tgl_ujian' => htmlspecialchars($this->input->post('tgl_ujian', true))
      ];
      if ($this->db->insert('tb_soal', $data_soal)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menginputkan Data Soal</div>'
        );
        redirect('guru/tambahSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Soal</div>'
        );
        redirect('guru/tambahSoal');
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
      $this->load->view('guru/DaftarSiswa');
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
        redirect('guru/daftarSiswa');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Mengubah Data Kelas</div>'
        );
        redirect('guru/daftarSiswa');
      }
    }
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
      $this->load->view('guru/DaftarGuru');
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
        redirect('guru/daftarGuru');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Guru</div>'
        );
        redirect('guru/daftarGuru');
      }
    }
  }

  public function myProfile()
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
      $this->load->view('guru/ProfileGuru');
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

  public function tambahSoal()
  {
    // Input data Soal
    $data['tittle'] = 'Tambah Soal';
    $data['subtittle'] = 'Tambah Soal Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();
    $data['mapel'] = $this->Mapel_model->getAllMapel();

    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required|trim');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_soal', 'Jumlah Soal', 'required|trim');
    $this->form_validation->set_rules('kd', 'Kopempetensi Dasar', 'required|trim');
    $this->form_validation->set_rules('kkm', 'KKM', 'required|trim');
    $this->form_validation->set_rules('skor_max', 'Nilai Maksimal', 'required|trim');
    $this->form_validation->set_rules('tgl_ujian', 'Tanggal Ujian', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('guru/TambahSoal');
      $this->load->view('templates/admin_footer');
    } else {
      $data_soal = [
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
        'jenis_soal' => htmlspecialchars($this->input->post('jenis_soal', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
        'jml_soal' => htmlspecialchars($this->input->post('jml_soal', true)),
        'kd' => htmlspecialchars($this->input->post('kd', true)),
        'kkm' => htmlspecialchars($this->input->post('kkm', true)),
        'skor_max' => htmlspecialchars($this->input->post('skor_max', true)),
        'tgl_ujian' => htmlspecialchars($this->input->post('tgl_ujian', true)),
      ];
      if ($this->db->insert('tb_soal', $data_soal)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Soal</div>'
        );
        redirect('guru/tambahSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Soal</div>'
        );
        redirect('guru/tambahSoal');
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
    $this->load->view('guru/ProfileSekolah');
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
      $this->load->view('guru/EditProfile');
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
        redirect('guru/profileAdmin');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Anda</div>'
        );
        redirect('guru/profileAdmin');
      }
    }
  }
  public function delete($type, $id)
  {
    if ($type == 'siswa') {
      // tabel terkait -> skor, pg/uraian, eval, analisis pg/uraian
      if ($this->siswa_model->deleteSiswaByType('id_siswa', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Siswa</div>'
        );
        redirect('guru/daftarSiswa');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Siswa</div>'
        );
        redirect('guru/daftarSiswa');
      }
    }
    if ($type == 'soal') {
      // tabel terkait -> pg/uraian, eval, analisis pg/uraian
      if ($this->Soal_model->deleteSoalByType('id_soal', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Soal</div>'
        );
        redirect('guru/daftarSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Soal</div>'
        );
        redirect('guru/daftarSoal');
      }
    }
    if ($type == 'pelajaran') {
      if ($this->pelajaran_model->deletePelajaranByType('id_pelajaran', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Pelajaran</div>'
        );
        redirect('guru/daftarSkor');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Pelajaran</div>'
        );
        redirect('guru/daftarSkor');
      }
    }
  }
}
