<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian_model extends CI_Model
{
  // mengambil semua ujian
  public function getAllUjian()
  {
    $this->db->select('tb_ujian.*, r_pelajaran.*, tb_kelas.*, tb_mapel.mapel')
      ->from('tb_ujian')
      ->join('r_pelajaran', 'tb_ujian.id_pelajaran = r_pelajaran.id_pelajaran')
      ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
      ->join('tb_kelas', 'tb_ujian.id_kelas = tb_kelas.id_kelas');
    return $this->db->get()->result_array();
  }

  // mengambil data ujian berdasarkan tipe id
  public function getUjianByType($type, $id)
  {
    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_ujian.*, r_pelajaran.*, tb_kelas.*, tb_mapel.mapel')
        ->from('tb_ujian')
        ->where(['id_ujian' => $id])
        ->join('r_pelajaran', 'tb_ujian.id_pelajaran = r_pelajaran.id_pelajaran')
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_ujian.id_kelas = tb_kelas.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_ujian.*, r_pelajaran.*, tb_kelas.*, tb_mapel.mapel')
        ->from('tb_ujian')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('r_pelajaran', 'tb_ujian.id_pelajaran = r_pelajaran.id_pelajaran')
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_ujian.id_kelas = tb_kelas.id_kelas');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_jawab
    if ($type == 'id_jawab') {
      $this->db->select('tb_ujian.*, r_pelajaran.*, tb_kelas.*, tb_mapel.mapel')
        ->from('tb_ujian')
        ->where(['tb_dist_jawab.id_jawab' => $id])
        ->join('r_pelajaran', 'tb_ujian.id_pelajaran = r_pelajaran.id_pelajaran')
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_ujian.id_kelas = tb_kelas.id_kelas');
      return $this->db->get()->result_array();
    }
  }

  // update ujian dari id
  public function upadateUjianById($idujian, $data)
  {
    return $this->db->update('tb_ujian', $data, ['id_ujian' => $idujian]);
  }

  // delete ujian
  public function deleteUjianByType($type, $id)
  {
    // berdasarkan id ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_ujian', ['id_ujian' => $id]);

    // berdasarkan id_pelajaran
    if ($type == 'id_pelajaran')
      return $this->db->delete('tb_ujian', ['id_pelajaran' => $id]);

    // berdasarkan id_kelas
    if ($type == 'id_kelas')
      return $this->db->delete('tb_ujian', ['id_kelas' => $id]);
  }
}
