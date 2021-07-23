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
    $this->load->model('Ujian_model');
    $this->load->model('Pelajaran_model');
  }

  public function index()
  {
    // dashboard
    $data['tittle'] = 'dashboard';
    $data['subtittle'] = 'Dashboard';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid(1);
    $data['jml'] = [
      'siswa' => $this->db->count_all('tb_siswa'),
      'kelas' => $this->db->count_all('tb_kelas'),
      'guru' => $this->db->count_all('tb_guru'),
      'mapel' => $this->db->count_all('tb_mapel'),
    ];

    // GRAPH DATA
    $data['kelompokTitle'] = ['Kelompok Atas', 'Kelompok Bawah'];
    $data['kelompokData'] = [87, 13];

    $data['programTitle'] = ['PK1', 'PK2', 'PK3', 'PK4', 'PK5', 'PK6'];
    $data['programData'] = [5, 20, 30, 10, 25, 10];

    $data['grafikTitle'] = ["", "VII", "VIII", "IX"];
    $data['grafikKetuntasanBelajar'] = [0, 60, 75, 59];
    $data['grafikRataRataNilai'] = [0, 55, 75, 89];
    $data['grafikRataRataSkor'] = [0, 75, 99, 79];
    $data['grafikRataRataNilaiAkhir'] = [0, 36, 68, 33];

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/IndexDashboard', $data);
    $this->load->view('templates/admin_footer');
  }

  public function analisis()
  {
    // read data analisis
    $data['tittle'] = 'Hasil Analisis';
    $data['subtittle'] = 'Hasil Analisis';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid(1);

    // $data['ujian'] = $this->ujian_model->getUjianByType('id_ujian', 1);
    // $data['soal'] = 1;
    // $data['kelas'] = 1;
    // $data['siswa'] = 1;
    // $data['dist_jwb'] = 1;
    // $data['dist_nilai'] = 1;
    // $data['analisis_pg'] = 1;
    // $data['analisis_uo'] = 1;

    // GRAPH DATA
    $data['analisisKelompokTitle'] = ['Kelompok Atas', 'Kelompok Bawah', 'Kelompok Tengah'];
    $data['analisisKelompokData'] = [60, 10, 30];

    $data['analisisNilaiTitle'] = ['PK1', 'PK2', 'PK3', 'PK4', 'PK5', 'PK6'];
    $data['analisisNilaiData'] = [5, 20, 30, 10, 25, 10];

    $data['tingkatKesukaranTitle'] = ["", "VII", "VIII", "IX"];
    $data['tingkatKesukaranKetuntasanBelajar'] = [0, 60, 75, 59];
    $data['tingkatKesukaranRataRataNilai'] = [0, 55, 75, 89];
    $data['tingkatKesukaranRataRataSkor'] = [0, 75, 99, 79];
    $data['tingkatKesukaranRataRataNilaiAkhir'] = [0, 36, 68, 33];

    $data['dayaPembedaTitle'] = ["", "VII", "VIII", "IX"];
    $data['dayaPembedaKetuntasanBelajar'] = [0, 60, 75, 59];
    $data['dayaPembedaRataRataNilai'] = [0, 55, 75, 89];
    $data['dayaPembedaRataRataSkor'] = [0, 75, 99, 79];
    $data['dayaPembedaRataRataNilaiAkhir'] = [0, 36, 68, 33];

    // Distribusi
    $data['distribusiKelompokTitle'] = ['Kelompok Atas', 'Kelompok Bawah', 'Kelompok Tengah'];
    $data['distribusiKelompokData'] = [60, 10, 30];

    $data['distribusiNilaiTitle'] = ['PK1', 'PK2', 'PK3', 'PK4', 'PK5', 'PK6'];
    $data['distribusiNilaiData'] = [5, 20, 30, 10, 25, 10];

    $data['distribusiKetuntasanTitle'] = ['PK1', 'PK2', 'PK3', 'PK4', 'PK5', 'PK6'];
    $data['distribusiKetuntasanData'] = [5, 20, 30, 10, 25, 10];

    $data['distribusiTindakLanjutTitle'] = ['PK1', 'PK2', 'PK3', 'PK4', 'PK5', 'PK6'];
    $data['distribusiTindakLanjutData'] = [5, 20, 30, 10, 25, 10];

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/Analisis', $data);
    $this->load->view('templates/admin_footer');
  }

  public function test()
  {
    $this->load->model('Kelas_model');
    var_dump($this->Kelas_model->getAllKelas());
    die;
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

  public function daftarPelajaran($id_kelas = null)
  {
    // Read Data Pelajaran
    $data['tittle'] = 'Daftar Pelajaran';
    $data['subtittle'] = 'Daftar Pelajaan';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data pelajaran?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data pelajaran';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_pelajaran';
    $data['id_ajax'] = 'id_pelajaran';
    $data['html_ajax'] = '#detailPelajaran';
    $data['modal_ajax'] = '#editPelajaran';

    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();
    $data['mapel'] = $this->Mapel_model->getAllMapel();
    $data['pelajaran'] = $this->Pelajaran_model->getAllPelajaran();

    $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
    $this->form_validation->set_rules('thn_pelajaran', 'Jumlah Siswa', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarPelajaran', $data);
      $this->load->view('templates/admin_footer', $data);
    } else {
      $data_pelajaran = [
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
        'semester' => htmlspecialchars($this->input->post('semester', true)),
        'thn_pelajaran' => htmlspecialchars($this->input->post('thn_pelajaran', true)),
      ];
      var_dump($data_pelajaran);
      die;
      if ($this->db->insert('r_pelajaran', $data_pelajaran)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Pelajaran</div>'
        );
        redirect('admin/daftarPelajaran');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Pelajaran</div>'
        );
        redirect('admin/daftarPelajaran');
      }
    }
  }
  public function daftarKelas()
  {
    // Read Data Kelas
    $data['tittle'] = 'Daftar Kelas';
    $data['subtittle'] = 'Daftar Semua Kelas';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data Kelas?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data Kelas, data siswa satu kelas, dan data lain yg terkait dengan siswa';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_kelas';
    $data['id_ajax'] = 'id_kelas';
    $data['html_ajax'] = '#detailKelas';
    $data['modal_ajax'] = '#editKelas';

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
      $this->load->view('templates/admin_footer', $data);
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

  public function daftarMapel()
  {
    // Read Data Mapel
    $data['tittle'] = 'Daftar Mapel';
    $data['subtittle'] = 'Daftar Mata Pelajaran';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data Kelas?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data mata pelajaran, data guru, data soal, data pelajaran, dan data lain yg terkait dengan soal';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['mapel'] = $this->Mapel_model->getAllMapel();

    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarMapel');
      $this->load->view('templates/admin_footer', $data);
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
        redirect('admin/daftarMapel');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Mata Pelajaran</div>'
        );
        redirect('admin/daftarMapel');
      }
    }
  }

  public function daftarUjian()
  {
    // Read data Ujian
    $data['tittle'] = 'Daftar Ujian';
    $data['subtittle'] = 'Daftar Semua Ujian';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data Ujian?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data Ujian, data analisis Ujian dan data lain yg terkait';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_ujian';
    $data['id_ajax'] = 'id_ujian';
    $data['html_ajax'] = '#detailUjian';
    $data['modal_ajax'] = '#editUjian';

    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['ujian'] = $this->Ujian_model->getAllUjian();
    // var_dump($data['ujian']);
    // die;

    // diubah
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
      $this->load->view('admin/DaftarUjian');
      $this->load->view('templates/admin_footer', $data);
    } else {
      // diubah
      $data_ujian = [
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true)),
        'jenis_soal' => htmlspecialchars($this->input->post('jenis_soal', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
        'jml_soal' => htmlspecialchars($this->input->post('jml_soal', true)),
        'kd' => htmlspecialchars($this->input->post('kd', true)),
        'kkm' => htmlspecialchars($this->input->post('kkm', true)),
        'skor_max' => htmlspecialchars($this->input->post('skor_max', true)),
        'tgl_ujian' => htmlspecialchars($this->input->post('tgl_ujian', true))
      ];
      if ($this->db->insert('tb_ujian', $data_ujian)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menginputkan Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      }
    }
  }
  public function daftarSoal()
  {
    // Read data soal
    $data['tittle'] = 'Daftar Soal';
    $data['subtittle'] = 'Daftar Semua Soal';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data soal?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data jawaban';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_soal';
    $data['id_ajax'] = 'id_soal';
    $data['html_ajax'] = '#detailSoal';
    $data['modal_ajax'] = '#editSoal';

    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['soal'] = $this->Soal_model->getAllSoal();
    // var_dump($data['soal']);
    // die;

    // dikasih dropdown menurut id_ujian
    $this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required|trim');
    $this->form_validation->set_rules('id_ujian', 'Ujian', 'required|trim');
    $this->form_validation->set_rules('id_jawab', 'Jawab', 'required|trim');
    $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required|trim');
    $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim');
    $this->form_validation->set_rules('jml_skor', 'Jumlah Skor', 'required|trim');
    $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/DaftarSoal');
      $this->load->view('templates/admin_footer', $data);
    } else {
      $data_soal = [
        'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
        'id_ujian' => htmlspecialchars($this->input->post('id_ujian', true)),
        'id_jawab' => htmlspecialchars($this->input->post('id_jawab', true)),
        'jenis_soal' => htmlspecialchars($this->input->post('jenis_soal', true)),
        'kelompok' => htmlspecialchars($this->input->post('kelompok', true)),
        'jml_skor' => htmlspecialchars($this->input->post('jml_skor', true)),
        'nilai' => htmlspecialchars($this->input->post('skor_max', true)),
      ];
      if ($this->db->insert('tb_soal', $data_soal)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menginputkan Data Soal</div>'
        );
        redirect('admin/daftarSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menginputkan Data Soal</div>'
        );
        redirect('admin/daftarSoal');
      }
    }
  }

  public function daftarGuru()
  {
    // Read Data Guru
    $data['tittle'] = 'Daftar Guru';
    $data['subtittle'] = 'Daftar Guru';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data guru?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data guru dan data akun guru';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_guru';
    $data['id_ajax'] = 'id_guru';
    $data['html_ajax'] = '#detailGuru';
    $data['modal_ajax'] = '#editGuru';

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
    $data['tittle'] = 'Profile Admin';
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
    // edit profile Admin
    // tambahin edit profile guru
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

  public function daftarSiswa()
  {
    // Input data siswa
    $data['tittle'] = 'Daftar Siswa';
    $data['subtittle'] = 'Daftar Siswa Baru';
    $data['tittle_sweets'] = 'Apakah anda yakin menghapus data siswa?';
    $data['text_sweets'] = 'Data yang sudah di hapus tidak bisa di kembalikan lagi, data yg akan terhapus adalah data siswa, data nilai dan data lain yg terkait dengan nilai';

    $data['url_ajax'] = base_url('admin/ajax');
    $data['data_menu_ajax'] = 'get_siswa';
    $data['id_ajax'] = 'id_siswa';
    $data['html_ajax'] = '#detailSiswa';
    $data['modal_ajax'] = '#editSiswa';

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
      $tambahSiswa = $this->input->post('tambahSiswa');
      $editSiswa = $this->input->post('editSiswa');
      if ($tambahSiswa)
        $id_siswa = '';
      else if ($editSiswa)
        $id_siswa = htmlspecialchars($this->input->post('id_siswa', TRUE));

      $data_siswa = [
        'id_siswa' => $id_siswa,
        'nm_siswa' => htmlspecialchars($this->input->post('nm_siswa', true)),
        'nis' => htmlspecialchars($this->input->post('nis', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
      ];
      // var_dump($data_siswa);
      // die;
      if ($tambahSiswa) {
        if ($this->db->insert('tb_siswa', $data_siswa)) {
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Berhasil Menambah Data Kelas</div>'
          );
          redirect('admin/daftarSiswa');
        } else {
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Gagal Menambah Data Kelas</div>'
          );
          redirect('admin/daftarSiswa');
        }
      }
      if ($editSiswa) {
        if ($this->Siswa_model->upadateSiswaById($id_siswa, $data_siswa)) {
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
      // dihapus dan harus diganti dengan password default
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

  public function tambahSoal()
  // public function tambahSoal($id_ujian)
  {
    // Input data Soal
    $data['tittle'] = 'Tambah Soal';
    $data['subtittle'] = 'Tambah Soal Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['siswa'] = $this->Siswa_model->getAllSiswa();
    $data['ujian'] = $this->Ujian_model->getAllUjian();
    // $data['ajax'] = $this->input->post('ajax_menu');
    // var_dump($data['ajax']);

    $this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required|trim');
    $this->form_validation->set_rules('id_ujian', 'Ujian', 'required|trim');
    $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required|trim');
    $jenis_soal = $this->input->post('jenis_soal', true);
    if ($jenis_soal == 'Pilihan Ganda') {
      $this->form_validation->set_rules('kunci', 'Kunci Jawaban', 'required|trim');
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahSoal');
      $this->load->view('templates/admin_footer');
    } else {
      $data_soal = [
        'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
        'id_ujian' => htmlspecialchars($this->input->post('id_ujian', true)),
        'jenis_soal' => htmlspecialchars($jenis_soal),
      ];
      $kunci = htmlspecialchars($this->input->post('kunci', true));
      if ($kunci == 0)
        $kunci = 0;
      elseif ($kunci == 1)
        $kunci = 1;
      $data_jawab = [
        'id_ujian' => $data_soal['id_ujian'],
        'kunci' => $kunci,
      ];
      for ($i = 1; $i <= 40; $i++) {
        if ($data_soal['jenis_soal'] == 'Pilihan Ganda') {
          $data_jawab["no_$i"] = htmlspecialchars($this->input->post("pg-no_$i", true));
        } else if ($data_soal['jenis_soal'] == 'Uraian') {
          $data_jawab["no_$i"] = htmlspecialchars($this->input->post("uraian-no_$i", true));
        }
      }
      // var_dump($data_jawab);
      // die;
      if ($this->db->insert('tb_soal', $data_soal)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Soal</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Soal</div>'
        );
      }
      if ($this->db->insert('tb_dist_jwb', $data_jawab)) {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Jawaban</div>'
        );
        redirect('admin/tambahSoal');
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Jawaban</div>'
        );
        redirect('admin/tambahSoal');
      }
    }
  }
  public function tambahUjian()
  {
    // Input data Ujian
    $data['tittle'] = 'Tambah Ujian';
    $data['subtittle'] = 'Tambah Ujian Baru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();
    $data['pelajaran'] = $this->Pelajaran_model->getAllPelajaran();

    $this->form_validation->set_rules('id_pelajaran', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('jenis_ujian', 'Jenis Ujian', 'required|trim');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('jml_soal_ujian', 'Jumlah Soal Ujian', 'required|trim');
    $this->form_validation->set_rules('jml_soalpg', 'Jumlah Soal Pilihan Ganda', 'required|trim');
    $this->form_validation->set_rules('jml_soaluo', 'Jumlah Soal Uraian', 'required|trim');
    $this->form_validation->set_rules('skor_max_ujian', 'Skor Maksimal Ujian', 'required|trim');
    $this->form_validation->set_rules('skor_maxpg', 'Skor Maksimal Pilihan Ganda', 'required|trim');
    $this->form_validation->set_rules('skor_maxuo', 'Skor Maksimal Uraian', 'required|trim');
    $this->form_validation->set_rules('kd', 'Kopempetensi Dasar', 'required|trim');
    $this->form_validation->set_rules('kkm', 'KKM', 'required|trim');
    $this->form_validation->set_rules('tgl_ujian', 'Tanggal Ujian', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/TambahUjian');
      $this->load->view('templates/admin_footer');
    } else {
      $data_ujian = [
        'id_pelajaran' => htmlspecialchars($this->input->post('id_pelajaran', true)),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
        'jenis_ujian' => htmlspecialchars($this->input->post('jenis_ujian', true)),
        'jml_soal_ujian' => htmlspecialchars($this->input->post('jml_soal_ujian', true)),
        'jml_soalpg' => htmlspecialchars($this->input->post('jml_soalpg', true)),
        'jml_soaluo' => htmlspecialchars($this->input->post('jml_soaluo', true)),
        'skor_max_ujian' => htmlspecialchars($this->input->post('skor_max_ujian', true)),
        'skor_maxpg' => htmlspecialchars($this->input->post('skor_maxpg', true)),
        'skor_maxuo' => htmlspecialchars($this->input->post('skor_maxuo', true)),
        'kd' => htmlspecialchars($this->input->post('kd', true)),
        'kkm' => htmlspecialchars($this->input->post('kkm', true)),
        'tgl_ujian' => strtotime(htmlspecialchars($this->input->post('tgl_ujian', true))),
      ];
      if ($this->db->insert('tb_ujian', $data_ujian)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menginputkan Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menginputkan Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
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

  public function delete($type, $id)
  {
    if ($type == 'user') {
      if ($this->User_model->deleteUserById($id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data User Guru</div>'
        );
        redirect('admin/daftarUser');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data User Guru</div>'
        );
        redirect('admin/daftarUser');
      }
    }
    if ($type == 'guru') {
      // tabel yang terkait -> kelas
      if ($this->Guru_model->deleteGuruByType('id_guru', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Guru</div>'
        );
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Guru</div>'
        );
      }
      if ($this->User_model->deleteUserById($id)) {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data User Guru</div>'
        );
        redirect('admin/daftarGuru');
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data User Guru</div>'
        );
        redirect('admin/daftarGuru');
      }
    }
    if ($type == 'mapel') {
      // tabel yang terkait -> guru, pelajaran, eval, pg/uraian, analisis pg/uraian, soal, skor
      if ($this->Mapel_model->deleteMapelById($id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Mata Pelajaran</div>'
        );
        redirect('admin/daftarMapel');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Mata Pelajaran</div>'
        );
        redirect('admin/daftarMapel');
      }
    }
    if ($type == 'kelas') {
      // tabel yg terkait -> pelajaran dan siswa
      if ($this->Kelas_model->deleteKelasByType('id_kelas', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Kelas</div>'
        );
        redirect('admin/daftarKelas');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Kelas</div>'
        );
        redirect('admin/daftarKelas');
      }
    }
    if ($type == 'siswa') {
      // tabel terkait -> skor, pg/uraian, eval, analisis pg/uraian
      if ($this->siswa_model->deleteSiswaByType('id_siswa', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Siswa</div>'
        );
        redirect('admin/daftarSiswa');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Siswa</div>'
        );
        redirect('admin/daftarSiswa');
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
        redirect('admin/daftarSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Soal</div>'
        );
        redirect('admin/daftarSoal');
      }
    }
    if ($type == 'pelajaran') {
      if ($this->pelajaran_model->deletePelajaranByType('id_pelajaran', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Pelajaran</div>'
        );
        redirect('admin/daftarSkor');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Pelajaran</div>'
        );
        redirect('admin/daftarSkor');
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

    // ajax edit Pelajaran
    if ($ajax_menu == 'get_pelajaran') {
      $id_pelajaran = $this->input->post('id_pelajaran', true);
      $data['pelajaran'] = $this->Pelajaran_model->getPelajaranByType('id_pelajaran', $id_pelajaran);
      $data['mapel'] = $this->Mapel_model->getAllMapel();
      $data['kelasAll'] = $this->Kelas_model->getAllKelas();
      $this->load->view('admin/ajax/ajax_editPelajaran', $data);
    }
    // ajax view Pelajaran
    if ($ajax_menu == 'get_Allpelajaran') {
      $id_kelas = $this->input->post('id_kelas', true);
      if ($id_kelas == null) {
        $data['pelajaran'] = $this->Pelajaran_model->getAllPelajaran();
      } else {
        $data['pelajaran'] = $this->Pelajaran_model->getPelajaranByType('id_kelas', $id_kelas);
      }
      $this->load->view('admin/ajax/ajax_tablePelajaran', $data);
    }
  }
}
