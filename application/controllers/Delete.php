<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
    $this->load->model('Analispg_model');
    $this->load->model('Analisuo_model');
    $this->load->model('Nilai_model');
    $this->load->model('Skor_model');
  }

  private function redirect($type)
  {
    if ($this->session->userdata('level') == 1) {
      return "admin/$type";
    } elseif ($this->session->userdata('level') == 2) {
      return "guru/$type";
    } elseif ($this->session->userdata('level') == 3) {
      return "siswa/$type";
    }
  }

  public function user($id)
  {
    if ($this->User_model->deleteUserByType('id_user', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data User Guru</div>'
      );
      redirect($this->redirect('daftarUser'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data User Guru</div>'
      );
      redirect($this->redirect('daftarUser'));
    }
  }

  public function guru($id)
  {
    // tabel yang terkait -> kelas
    $guru = $this->Guru_model->getGuruByType('id_guru', $id);
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
    if ($this->User_model->deleteUserByType('id_user', $guru['id_user'])) {
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data User Guru</div>'
      );
      redirect($this->redirect('daftarGuru'));
    } else {
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data User Guru</div>'
      );
      redirect($this->redirect('daftarGuru'));
    }
  }

  public function mapel($id)
  {
    // tabel yang terkait -> guru, pelajaran, eval, pg/uraian, analisis pg/uraian, soal, skor
    if ($this->Mapel_model->deleteMapelById($id)) {
      // $this->Guru_model->deleteGuruByType('id_mapel', $id);
      // $this->Pelajaran_model->deletePelajaranByType('id_mapel', $id);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Semua Data terkait.</div>'
      );
      redirect($this->redirect('daftarMapel'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Semua Data terkait.</div>'
      );
      redirect($this->redirect('daftarMapel'));
    }
  }

  public function pelajaran($id)
  {
    if ($this->Pelajaran_model->deletePelajaranByType('id_pelajaran', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Pelajaran</div>'
      );
      redirect($this->redirect('daftarPelajaran'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Pelajaran</div>'
      );
      redirect($this->redirect('daftarPelajaran'));
    }
  }

  public function kelas($id)
  {
    // tabel yg terkait -> pelajaran dan siswa
    if ($this->Kelas_model->deleteKelasByType('id_kelas', $id)) {
      // $this->Pelajaran_model->deletePelajaranByType('id_kelas', $id);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Kelas</div>'
      );
      redirect($this->redirect('daftarKelas'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Kelas</div>'
      );
      redirect($this->redirect('daftarKelas'));
    }
  }

  public function siswa($id)
  {
    // tabel terkait -> skor, pg/uraian, eval, analisis pg/uraian
    // gmna kalo di buat transaksi?
    $siswa = $this->Siswa_model->getSiswaByType('id_siswa', $id);
    // var_dump($siswa);
    // die;
    if ($this->Siswa_model->deleteSiswaByType('id_siswa', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Siswa</div>'
      );
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Siswa</div>'
      );
    }
    if ($this->User_model->deleteUserByType('id_user', $siswa['id_user'])) {
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data User Siswa</div>'
      );
      redirect($this->redirect('daftarSiswa'));
    } else {
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data User Siswa</div>'
      );
      redirect($this->redirect('daftarSiswa'));
    }
  }

  public function soal($id)
  {
    // tabel terkait -> jawaban, analisis pg/uraian
    if ($this->Soal_model->deleteSoalByType('id_soal', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Soal</div>'
      );
      redirect($this->redirect('daftarSoal'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Soal</div>'
      );
      redirect($this->redirect('daftarSoal'));
    }
  }

  public function ujian($id)
  {
    // tabel terkait -> Soal, jawaban, nilai, analisis pg/uraian
    if ($this->Ujian_model->deleteUjianByType('id_ujian', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Ujian</div>'
      );
      redirect($this->redirect('daftarUjian'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Ujian</div>'
      );
      redirect($this->redirect('daftarUjian'));
    }
  }

  public function analisisSoal($type, $id)
  {
    if ($type == 'pg') {
      if ($this->Analisispg_model->deleteAnalisispgByType('id_analisispg', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Ujian</div>'
        );
        redirect($this->redirect('daftarUjian'));
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Ujian</div>'
        );
        redirect($this->redirect('daftarUjian'));
      }
    } elseif ($type == 'uraian') {
      if ($this->Analisisuo_model->deleteAnalisisuoByType('id_analisisuo', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Ujian</div>'
        );
        redirect($this->redirect('daftarUjian'));
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Ujian</div>'
        );
        redirect($this->redirect('daftarUjian'));
      }
    }
  }

  public function jawaban($id)
  {
    if ($this->Jawaban_model->deleteJawabByType('id_jawaban', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Jawaban</div>'
      );
      redirect($this->redirect('distJawaban'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Jawaban</div>'
      );
      redirect($this->redirect('distJawaban'));
    }
  }

  public function nilai($id)
  {
    if ($this->Nilai_model->deleteNilaiByType('id_nilai', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Nilai Siswa</div>'
      );
      redirect($this->redirect('nilai'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Nilai Siswa</div>'
      );
      redirect($this->redirect('nilai'));
    }
  }

  public function skor($id)
  {
    if ($this->Skor_model->deleteSkorByType('id_skor', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Skor Siswa</div>'
      );
      redirect($this->redirect('skor'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Skor Siswa</div>'
      );
      redirect($this->redirect('skor'));
    }
  }
}
