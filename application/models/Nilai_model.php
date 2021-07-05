<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
  // mengambil semua Nilai
  public function getAllNilai()
  {
    $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
      ->from('tb_dist_nilai')
      ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
      ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
    return $this->db->get()->result_array();
  }

  // mengambil data Nilai berdasarkan tipe id
  public function getNilaiByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_skor' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_ujian') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_ujian' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_siswa') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_siswa' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
  }

  // update Skor dari id
  public function upadateNilaiById($idSkor, $data)
  {
    return $this->db->update('tb_dist_nilai', $data, ['id_skor' => $idSkor]);
  }

  // delete Skor
  public function deleteNilaiByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_dist_nilai', ['id_skor' => $id]);

    // berdasarkan id ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_dist_nilai', ['id_ujian' => $id]);

    // berdasarkan id siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_dist_nilai', ['id_siswa' => $id]);
  }
}
