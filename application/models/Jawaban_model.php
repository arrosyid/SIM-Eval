<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jawaban_model extends CI_Model
{
  // mengambil semua Jawaban
  public function getAllJawaban()
  {
    $this->db->select('tb_dist_jwb.*, tb_siswa.*, tb_ujian.*')
      ->from('tb_dist_jwb')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dist_jwb.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data Jawaban berdasarkan tipe id
  public function getJawabanByType($type, $id, $id_siswa = null)
  {
    // berdasarkan idjawab
    if ($type == 'id_jawab') {
      $this->db->select('tb_dist_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dist_jwb')
        ->where(['id_jawab' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dist_jwb.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_dist_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dist_jwb')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dist_jwb.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_dist_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dist_jwb')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dist_jwb.id_ujian');
      return $this->db->get()->result_array();
    }
    // berdasarkan id_ujian, id_siswa dan pilihan ganda
    if ($type == 'id_ujian_siswa_pg') {
      $this->db->select('tb_dist_jwb.*')
        ->from('tb_dist_jwb')
        ->where(['tb_dist_jwb.id_ujian' => $id])
        ->where(['tb_dist_jwb.id_siswa' => $id_siswa])
        ->where(['tb_dist_jwb.jenis_soal' => 'PILIHAN GANDA']);
      return $this->db->get()->row_array();
    }
    // berdasarkan id_ujian, id_siswa dan URAIAN
    if ($type == 'id_ujian_siswa_uo') {
      $this->db->select('tb_dist_jwb.*')
        ->from('tb_dist_jwb')
        ->where(['tb_dist_jwb.id_ujian' => $id])
        ->where(['tb_dist_jwb.id_siswa' => $id_siswa])
        ->where(['tb_dist_jwb.jenis_soal' => 'URAIAN']);
      return $this->db->get()->row_array();
    }
    // berdasarkan id_ujian dan pilihan ganda
    if ($type == 'id_ujian_pg') {
      $this->db->select('tb_dist_jwb.*, tb_siswa.*')
        ->from('tb_dist_jwb')
        ->where(['tb_dist_jwb.id_ujian' => $id])
        ->where(['tb_dist_jwb.jenis_soal' => 'PILIHAN GANDA'])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa');
      return $this->db->get()->result_array();
    }
    // berdasarkan id_ujian dan URAIAN
    if ($type == 'id_ujian_uo') {
      $this->db->select('tb_dist_jwb.*, tb_siswa.*')
        ->from('tb_dist_jwb')
        ->where(['tb_dist_jwb.id_ujian' => $id])
        ->where(['tb_dist_jwb.jenis_soal' => 'URAIAN'])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dist_jwb.id_siswa');
      return $this->db->get()->result_array();
    }
  }

  // update jawaban dari id
  public function upadateJawabanById($id, $data)
  {
    return $this->db->update('tb_dist_jwb', $data, ['id_jawab' => $id]);
  }

  // delete jawaban
  public function deleteJawabanById($id)
  {
    return $this->db->delete('tb_dist_jwb', ['id_jawab' => $id]);
  }
}
