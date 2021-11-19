<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
      (new IonAuth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Mapel_model');
    $this->load->model('Guru_model');
    $this->load->model('Siswa_model');
    $this->load->model('Kelas_model');
    $this->load->model('Sekolah_model');
    $this->load->model('Soal_model');
    $this->load->model('Ujian_model');
    $this->load->model('Pelajaran_model');
    $this->load->model('Analispg_model');
    $this->load->model('Analisuo_model');
    $this->load->model('Nilai_model');
    $this->load->model('Skor_model');
  }

  // ditambah untuk index dikasih apa
  // ditambah edit profile
  // ditambah edit password

  public function index()
  {
    // dashboard
    $data['tittle'] = 'dashboard';
    $data['subtittle'] = 'Dashboard';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['sekolah'] = $this->Sekolah_model->getSekolahByid(1);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    // $this->load->view('admin/IndexDashboard', $data);
    $this->load->view('templates/admin_footer');
  }

  public function lembarSoal($id_ujian = 1)
  {
    // Read Nilai per ujian siwa
    $data['tittle'] = 'Soal';
    $data['subtittle'] = 'Lembar Soal';

    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['ujian'] = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    $data['pg'] = $this->Soal_model->getSoalByType('id_ujian_pg', $id_ujian);
    $data['uo'] = $this->Soal_model->getSoalByType('id_ujian_uo', $id_ujian);
    $data['siswa'] = $this->Siswa_model->getAllSiswa();
    // $data['siswa'] = $this->Siswa_model->getSiswaByType('id_kelas', $data['ujian']['id_kelas']);

    $countPG = count($data['pg']);
    $countUO = count($data['uo']);
    $soalPG = $data['ujian']['jml_soalpg'] - $countPG;
    $soalUO = $data['ujian']['jml_soaluo'] - $countUO;
    if ($countPG != $data['ujian']['jml_soalpg']) {
      if ($soalPG < 0) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Tidak Bisa mengerjakan Soal karena Jumlah Soal Pilihan Ganda Lebih ' . abs($soalPG) . ' soal</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Tidak Bisa mengerjakan Soal karena Jumlah Soal Pilihan Ganda kurang ' . $soalPG . ' soal</div>'
        );
        redirect('admin/daftarUjian');
      }
    } elseif ($countUO != $data['ujian']['jml_soaluo']) {
      if ($soalUO < 0) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Tidak Bisa mengerjakan Soal karena Jumlah Soal Uraian Lebih ' . abs($soalUO) . ' soal</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Tidak Bisa mengerjakan Soal karena Jumlah Soal Uraian kurang ' . $soalUO . ' soal</div>'
        );
        redirect('admin/daftarUjian');
      }
    }
    // untuk koreksi otomatis
    foreach ($data['pg'] as $K => $value) {
      $kunci[$K] = $value['kunci'];
    }

    for ($i = 1; $i <= $data['ujian']['jml_soalpg']; $i++) {
      $this->form_validation->set_rules("pg_no_$i", 'Jawaban', 'required|trim', [
        'required' => 'silahkan pilih jawaban anda dengan benar'
      ]);
      $jawabpg["no_$i"] = strtoupper(htmlspecialchars($this->input->post("pg_no_$i", true)));
    }
    for ($i = 1; $i <= $data['ujian']['jml_soaluo']; $i++) {
      $this->form_validation->set_rules("uo_no_$i", 'Jawaban', 'required|trim', [
        'required' => 'silahkan isi jawaban anda dengan benar'
      ]);
      $jawabuo["no_$i"] = htmlspecialchars($this->input->post("uo_no_$i", true));
    }

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/LembarSoal');
      $this->load->view('templates/admin_footer');
    } else {
      // koreksi otomatis
      $skorSoal = (int) round($data['ujian']['skor_maxpg'] / $data['ujian']['jml_soalpg']);
      $skor = [
        'id_ujian' => $id_ujian,
        'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
        'jenis_soal' => 'PILIHAN GANDA',
        'jml_skor' => 0,
        'nilai' => 0,
      ];
      for ($j = 1; $j <= $data['ujian']['jml_soalpg']; $j++) {
        if ($jawabpg["no_$j"] == $kunci[$j - 1]) {
          $skor["no_$j"] = $skorSoal;
          $skor['jml_skor'] += $skorSoal;
        } else {
          $skor["no_$j"] = 0;
        }
      }
      $skor['nilai'] = (int) round(($skor['jml_skor'] / $data['ujian']['skor_maxpg']) * 100);
      // data untuk upload
      $data_jawabpg = [
        'id_ujian' => $id_ujian,
        'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
        'status' => 1,
        'jenis_soal' => 'PILIHAN GANDA',
      ];
      $uploadpg = $data_jawabpg + $jawabpg;
      $data_jawabuo = [
        'id_ujian' => $id_ujian,
        'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
        'jenis_soal' => 'URAIAN',
      ];
      $uploaduo = $data_jawabuo + $jawabuo;
      // var_dump($uploadpg);
      // die;
      if (
        $this->db->insert('tb_dist_jwb', $uploadpg) &&
        $this->db->insert('tb_dist_jwb', $uploaduo) &&
        $this->db->insert('tb_skor', $skor)
      ) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Berhasil Menyimpan Data Jawaban</div>'
        );
        redirect('admin/lembarSoal');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          Gagal Menyimpan Data Jawaban</div>'
        );
        redirect('admin/lembarSoal');
      }
    }
  }

  public function reviewJawaban($id_ujian = 1, $id_siswa = 1)
  {
    // Read Nilai per ujian siwa
    $data['tittle'] = 'Review Jawaban';
    $data['subtittle'] = 'Review Jawaban Anda';

    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['ujian'] = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    $data['soal_pg'] = $this->Soal_model->getSoalByType('id_ujian_pg', $id_ujian);
    $data['soal_uo'] = $this->Soal_model->getSoalByType('id_ujian_uo', $id_ujian);
    $data['pg'] = $this->Jawaban_model->getJawabanByType('id_ujian_siswa_pg', $id_ujian, $id_siswa);
    $data['uo'] = $this->Jawaban_model->getJawabanByType('id_ujian_siswa_uo', $id_ujian, $id_siswa);
    // var_dump($data['uo']);
    // die;

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/ReviewJawaban');
    $this->load->view('templates/admin_footer');
  }

  public function daftarGuru()
  {
    // Read Data Guru
    $data['tittle'] = 'Daftar Guru';
    $data['subtittle'] = 'Daftar Guru';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['guru'] = $this->Guru_model->getAllGuru();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('guru/DaftarGuru');
    $this->load->view('templates/admin_footer');
  }

  public function daftarSiswa()
  {
    // Read Data Siswa
    $data['tittle'] = 'Daftar Siswa';
    $data['subtittle'] = 'Daftar Siswa';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $id_siswa = $this->Siswa_model->getSiswaByType('id_user', $data['user']['id_user']);
    // $data['siswa'] = $this->Siswa_model->getAllSiswa();
    $data['siswa'] = $this->Siswa_model->getSiswaByType('id_kelas', $id_siswa['id_kelas']);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('siswa/DaftarSiswa');
    $this->load->view('templates/admin_footer');
  }

  public function daftarUjian()
  {
    // Read data Ujian
    $data['tittle'] = 'Daftar Ujian';
    $data['subtittle'] = 'Daftar Semua Ujian';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['ujian'] = $this->Ujian_model->getAllUjian();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('siswa/DaftarUjian');
    $this->load->view('templates/admin_footer');
  }

  public function profile()
  {
    // read profile siswa
    $data['tittle'] = 'Profile Anda';
    $data['subtittle'] = 'Profile Anda';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['siswa'] = $this->Siswa_model->getSiswaByType('id_user', $data['user']['id_user']);
    // var_dump($data['siswa']);
    // die;
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'min_length' => 'password terlalu pendek!',
      'matches' => 'password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('siswa/ProfileSiswa');
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
        redirect('siswa/profile');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Mengubah Password atau Kata Sandi Anda</div>'
        );
        redirect('siswa/profile');
      }
    }
  }

  public function editProfile()
  {
    // edit profile siswa
    $data['tittle'] = 'Edit Profile Anda';
    $data['subtittle'] = 'Edit Profile Anda';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['siswa'] = $this->Siswa_model->getSiswaByType('id_user', $data['user']['id_user']);
    $data['kelas'] = $this->Kelas_model->getAllKelas();

    $this->form_validation->set_rules('nm_siswa', 'Nama siswa', 'required|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('siswa/EditProfile');
      $this->load->view('templates/admin_footer');
    } else {
      $data_siswa = [
        'nm_siswa' => htmlspecialchars($this->input->post('nm_siswa', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'id_mapel' => htmlspecialchars($this->input->post('id_mapel', true))
      ];
      $data_akunSiswa = [
        'username' => htmlspecialchars($this->input->post('username', true)),
      ];
      if ($this->User_model->updateUserById($data_akunSiswa, $data['user']['id_user'])) {
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
      if ($this->Siswa_model->upadateSiswaById($data['siswa']['id_siswa'], $data_siswa)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Mengubah Data Anda</div>'
        );
        redirect('siswa/profile');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Mengubah Data Anda</div>'
        );
        redirect('siswa/profile');
      }
    }
  }
}
