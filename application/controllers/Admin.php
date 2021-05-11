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
  public function editSekolah($id_sekolah = 1)
  {
    // edit & Input data sekolah
    $data['tittle'] = 'Edit Profile';
    $data['subtittle'] = 'Edit Profile Sekolah';
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid($id_sekolah);
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);

    $this->form_validation->set_rules('nm_sekolah', 'Nama Sekolah', 'required|trim');
    $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim');
    $this->form_validation->set_rules('nm_kepsek', 'Nama Kepala Sekolah', 'required|trim');
    $this->form_validation->set_rules('nm_admin', 'Nama Admin Sekolah', 'required|trim');
    $this->form_validation->set_rules('telfon', 'Nomor Telfon', 'required|trim');
    $this->form_validation->set_rules('website', 'Website', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
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
        'nm_sekolah' => htmlspecialchars($this->input->post('nm_sekolah')),
        'npsn' => htmlspecialchars($this->input->post('npsn')),
        'nm_kepsek' => htmlspecialchars($this->input->post('nm_kepsek')),
        'nm_admin' => htmlspecialchars($this->input->post('nm_admin')),
        'telfon' => htmlspecialchars($this->input->post('telfon')),
        'website' => htmlspecialchars($this->input->post('website')),
        'email' => htmlspecialchars($this->input->post('email')),
        'akreditasi' => htmlspecialchars($this->input->post('akreditasi')),
        'kurikulum' => htmlspecialchars($this->input->post('kurikulum')),
        'alamat' => htmlspecialchars($this->input->post('alamat')),
        'bentuk_pendidikan' => htmlspecialchars($this->input->post('bentuk_pendidikan')),
        'sk_pendirian' => htmlspecialchars($this->input->post('sk_pendirian')),
        'tgl_sk_pendirian' => htmlspecialchars($this->input->post('tgl_sk_pendirian')),
        'sk_izin' => htmlspecialchars($this->input->post('sk_izin')),
        'tgl_sk_izin' => htmlspecialchars($this->input->post('tgl_sk_izin')),
      ];
      // var_dump($data_sekolah);
      // die;

      if ($this->Sekolah_model->upadateSekolahById($id_sekolah, $data_sekolah)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengedit Data Sekolah</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengedit Data Sekolah</div>'
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
  public function daftarSiswa()
  {
    // Input data siswa
    $data['tittle'] = 'Tambah Siswa';
    $data['subtittle'] = 'Tambah Siswa Baru';
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
      $this->load->view('templates/admin_footer');
    } else {
      $data_siswa = [
        'nm_siswa' => htmlspecialchars($this->input->post('nm_siswa')),
        'nis' => htmlspecialchars($this->input->post('nis')),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
      ];
      // var_dump($data_siswa);
      // die;
      if ($this->db->insert('tb_siswa', $data_siswa)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil menginputkan data Kelas</div>'
        );
        redirect('admin/daftarSiswa');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal menginputkan data Kelas</div>'
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
    $this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
    $this->form_validation->set_rules('nomor_kelas', 'Nomor Kelas', 'required|trim');
    $this->form_validation->set_rules('id_guru', 'Wali Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_siswa', 'Jumlah Siswa', 'required|trim');
    $this->form_validation->set_rules('jml_mapel', 'Jumlah Mata Pelajaran', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahKelas');
      $this->load->view('templates/admin_footer');
    } else {
      $data_kelas = [
        'kelas' => htmlspecialchars($this->input->post('kelas')),
        'bidang' => htmlspecialchars($this->input->post('bidang')),
        'nomor_kelas' => htmlspecialchars($this->input->post('nomor_kelas')),
        'id_guru' => htmlspecialchars($this->input->post('id_guru')),
        'jml_siswa' => htmlspecialchars($this->input->post('jml_siswa')),
        'jml_mapel' => htmlspecialchars($this->input->post('jml_mapel'))
      ];
      if ($this->db->insert('tb_kelas', $data_kelas)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil menginputkan data Kelas</div>'
        );
        redirect('admin/tambahKelas');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal menginputkan data Kelas</div>'
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
  // fungsi untuk ajax
  public function ajax()
  {
    $ajax_menu = $this->input->post('ajax_menu');

    // ajax edit SISWA
    if ($ajax_menu == 'get_siswa') {
      $id_siswa = $this->input->post('id_siswa');
      $data['siswa'] = $this->Siswa_model->getSiswaByType($id_siswa, 'id_siswa');
      $data['kelas'] = $this->Kelas_model->getKelasByType($data['siswa']['id_kelas'], 'id_kelas');
      $this->load->view('admin/ajax/ajax_editSiswa', $data);
    }

    // // ajax edit SISWA
    // if ($ajax_menu == 'get_siswa') {
    //   $id_siswa = $this->input->post('id_siswa');
    //   $data['editSiswa'] = $this->Pemodalan_model->getPemodalanById('id_modal', $id_siswa);
    //   $this->load->view('admin/ajax/ajax_editSiswa', $data);
    // }
  }
}
