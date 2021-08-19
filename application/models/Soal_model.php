<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    $this->db->select('tb_soal.*, tb_ujian.*')
      ->from('tb_soal')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($type, $id)
  {
    // berdasarkan idsoal
    if ($type == 'id_soal') {
      $this->db->select('tb_soal.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['id_soal' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_soal.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian')->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian dan soal pilihan ganda
    if ($type == 'id_ujian_pg') {
      $this->db->select('tb_soal.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->where(['tb_soal.jenis_soal' => 'PILIHAN GANDA'])
        ->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian dan soal uraian
    if ($type == 'id_ujian_uo') {
      $this->db->select('tb_soal.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->where(['tb_soal.jenis_soal' => 'URAIAN'])
        ->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }
  }

  // update soal dari id
  public function upadateSoalById($idSoal, $data)
  {
    return $this->db->update('tb_soal', $data, ['id_soal' => $idSoal]);
  }

  // delete soal
  public function deleteSoalByType($type, $id)
  {
    // berdasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_soal', ['id_soal' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_soal', ['id_ujian' => $id]);
  }

  // pindahkan ke controller tambah kelas
  // fungsi sudah dapat dipakai
  // menentukan jumlah kelompok atas dan bawah
  public function kelAtasBawah($id_kelas)
  {
    $kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();
    // $kelas['jml_siswa'] = 47;
    $AtasBwh['jml_kelAtsBwh'] = (int) round((30 / 100) * $kelas['jml_siswa']);
    $AtasBwh['jml_kelTengah'] = $kelas['jml_siswa'] - ($AtasBwh['jml_kelAtsBwh'] * 2);
    // return $AtasBwh; // hapus
    // cek lagi returnnya
    return $this->db->update('tb_kelas', $AtasBwh, ['id_kelas' => $id_kelas]);
  }
}
