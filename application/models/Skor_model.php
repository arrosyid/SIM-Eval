<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor_model extends CI_Model
{
  // mengambil semua skor
  public function getAllSkor()
  {
    $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
      ->from('tb_skor')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data skor berdasarkan tipe id
  public function getSkorByType($type, $id)
  {
    // berdasarkan idskor
    if ($type == 'id_skor') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['id_skor' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->result_array();
    }
  }

  // update skor dari id
  public function upadateSkorById($id, $data)
  {
    return $this->db->update('tb_skor', $data, ['id_skor' => $id]);
  }

  // delete skor
  public function deleteSkorByType($type, $id)
  {
    // berdasarkan id skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_skor', ['id_skor' => $id]);

    // berdasarkan id_siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_skor', ['id_siswa' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_skor', ['id_ujian' => $id]);
  }
}
