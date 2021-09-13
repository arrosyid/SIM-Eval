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
  public function guru($id)
  {
    if ($this->Guru_model->deleteGuruById($id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Guru dan data lain yang terkait</div>'
      );
      redirect($this->redirect('daftarGuru'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Guru dan data lain yang terkait</div>'
      );
      redirect($this->redirect('daftarGuru'));
    }
  }

  public function mapel($id)
  {
    if ($this->Mapel_model->deleteMapelById($id)) {
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
    if ($this->Pelajaran_model->deletePelajaranById($id)) {
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
    if ($this->Kelas_model->deleteKelasById($id)) {
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
    if ($this->Siswa_model->deleteSiswaById($id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Siswa</div>'
      );
      redirect($this->redirect('daftarSiswa'));
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Siswa</div>'
      );
      redirect($this->redirect('daftarSiswa'));
    }
  }

  public function soal($id)
  {
    if ($this->Soal_model->deleteSoalById($id)) {
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
    if ($this->Ujian_model->deleteUjianById($id)) {
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
      if ($this->Analisispg_model->deleteAnalispgById($id)) {
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
      if ($this->Analisisuo_model->deleteAnalisuoByid($id)) {
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
    if ($this->Jawaban_model->deleteJawabanById($id)) {
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
    if ($this->Nilai_model->deleteNilaiById($id)) {
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
    if ($this->Skor_model->deleteSkorById($id)) {
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
