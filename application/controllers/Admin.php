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
  public function guruSiswa()
  {
    // Read Data Guru dan Siswa
    $data['tittle'] = 'Daftar Guru dan Siswa';
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
  public function soal()
  {
    // Read data soal
    $data['tittle'] = 'Daftar Soal';
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
  public function myProfile()
  {
    // read profile guru
    $data['tittle'] = 'Profile Anda';
  }
  public function profileSekolah()
  {
    // read profile sekolah
    $data['tittle'] = 'Profile Sekolah';
  }
  public function editProfile()
  {
    // edit profile guru
    $data['tittle'] = 'Edit Profile Anda';
  }
  public function editSekolah()
  {
    // edit & Input data sekolah
  }
  public function tambahGuru()
  {
    // Input data guru
    //  dapat otomatis menambah user baru dengan nip guru dan password default
    $data['tittle'] = 'tambah guru';
    $data['subtittle'] = 'Tambah Guru Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['mapel'] = $this->Mapel_model->getAllMapel();

    $akun = $this->input->post('akun', true);
    $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    if ($akun == 1) {
      $this->form_validation->set_rules('email', 'Email', 'required|trim');
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
        'nm_guru' => htmlspecialchars($this->input->post('nm_guru')),
        'nip' => htmlspecialchars($this->input->post('nip')),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel'))
      ];
      $data_akunGuru = [
        'username' => htmlspecialchars($this->input->post('nm_guru')),
        'status' => htmlspecialchars($this->input->post('status')),
        'email' => htmlspecialchars($this->input->post('email')),
        'password' => htmlspecialchars($this->input->post('password')),
      ];
      if ($this->db->insert('tb_akun', $data_akunGuru)) {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data akun guru</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data akun guru</div>'
        );
      }
      if ($this->db->insert('tb_guru', $data_guru)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data guru</div>'
        );
        redirect('admin/tambahGuru');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data guru</div>'
        );
        redirect('admin/tambahGuru');
      }
    }
  }
  public function tambahSiswa()
  {
    // Input data siswa
  }
  public function tambahKelas()
  {
    // Input data Kelas
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
        'mapel' => htmlspecialchars($this->input->post('mapel'))
      ];
      if ($this->db->insert('tb_mapel', $data_mapel)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil menginputkan data Mata Pelajaran</div>'
        );
        redirect('admin/tambahMapel');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal menginputkan data Mata Pelajaran</div>'
        );
        redirect('admin/tambahMapel');
      }
    }
  }
}
