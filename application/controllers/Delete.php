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
    $this->load->model('Analisispg_model');
    $this->load->model('Analisisuo_model');
    $this->load->model('Nilai_model');
  }
  public function user($id)
  {
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

  public function guru($id)
  {
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
  public function mapel($id)
  {
    // tabel yang terkait -> guru, pelajaran, eval, pg/uraian, analisis pg/uraian, soal, skor
    if ($this->Mapel_model->deleteMapelById($id)) {
      // $this->Guru_model->deleteGuruByType('id_mapel', $id);
      // $this->User_model->deleteUserById('id_guru', $id);
      // $this->Pelajaran_model->deletePelajaranByType('id_mapel', $id);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Semua Data terkait.</div>'
      );
      redirect('admin/daftarMapel');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Semua Data terkait.</div>'
      );
      redirect('admin/daftarMapel');
    }
  }
  public function pelajaran($id)
  {
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
  public function siswa($id)
  {
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
  public function soal($id)
  {
    // tabel terkait -> jawaban, analisis pg/uraian
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
  public function ujian($id)
  {
    // tabel terkait -> Soal, jawaban, nilai, analisis pg/uraian
    if ($this->Ujian_model->deleteUjianByType('id_ujian', $id)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil Menghapus Data Ujian</div>'
      );
      redirect('admin/daftarUjian');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal Menghapus Data Ujian</div>'
      );
      redirect('admin/daftarUjian');
    }
  }
  public function analisisSoal($id, $type)
  {
    if ($type == 'pg') {
      if ($this->Analisispg_model->deleteAnalisispgByType('id_analisispg', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      }
    } elseif ($type == 'uraian') {
      if ($this->Analisisuo_model->deleteAnalisisuoByType('id_analisisuo', $id)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil Menghapus Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Gagal Menghapus Data Ujian</div>'
        );
        redirect('admin/daftarUjian');
      }
    }
  }
  public function jawaban($id)
  {
  }
  public function nilai($id)
  {
  }
}
