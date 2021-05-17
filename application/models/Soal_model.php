<?php
defined('BASEPATH') or exit('No direct script access allowed');

class soal_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {

    $this->db->select('tb_soal.*, tb_mapel.*, tb_kelas.*')
      ->from('tb_soal')
      ->join('tb_mapel', 'tb_mapel.id_mapel = tb_soal.id_mapel')
      ->join('tb_kelas', 'tb_kelas.id_kelas = tb_soal.id_kelas');
    return $this->db->get()->result_array();
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($type, $id)
  {
    // berdasarkan idsoal
    if ($type == 'id_soal') {
      $this->db->select('tb_soal.*, tb_mapel.*, tb_kelas.*')
        ->from('tb_soal')
        ->where(['id_soal' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = tb_soal.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_soal.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_mapel
    if ($type == 'id_mapel') {
      $this->db->select('tb_soal.*, tb_mapel.*, tb_kelas.*')
        ->from('tb_soal')
        ->where(['id_mapel' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = tb_soal.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_soal.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_soal.*, tb_mapel.*, tb_kelas.*')
        ->from('tb_soal')
        ->where(['id_kelas' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = tb_soal.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_soal.id_kelas');
      return $this->db->get()->row_array();
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

    // berdasarkan id_mapel
    if ($type == 'id_mapel')
      return $this->db->delete('tb_soal', ['id_mapel' => $id]);

    if ($type == 'id_kelas')
      return $this->db->delete('tb_soal', ['id_kelas' => $id]);
  }
}
