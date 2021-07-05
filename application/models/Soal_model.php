<?php
defined('BASEPATH') or exit('No direct script access allowed');

class soal_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
      ->from('tb_soal')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
      ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($type, $id)
  {
    // berdasarkan idsoal
    if ($type == 'id_soal') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['id_soal' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_jawab
    if ($type == 'id_jawab') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_dist_jawab.id_jawab' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
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

    // berdasarkan id_siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_soal', ['id_siswa' => $id]);

    // berdasarkan id_jawab
    if ($type == 'id_jawab')
      return $this->db->delete('tb_soal', ['id_jawab' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_soal', ['id_ujian' => $id]);
  }
}
