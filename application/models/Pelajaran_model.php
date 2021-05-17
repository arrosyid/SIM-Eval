<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran_model extends CI_Model
{
  // mengambil semua Pelajaran
  public function getAllPelajaran()
  {
    $this->db->select('r_pelajaran.*, tb_mapel.mapel, tb_sekolah.*, tb_kelas.*')
      ->from('r_pelajaran')
      ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
      ->join('tb_sekolah', 'tb_sekolah.id_sekolah = r_pelajaran.id_sekolah')
      ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
    return $this->db->get()->result_array();
  }

  // mengambil data Pelajaran berdasarkan tipe id
  public function getPelajaranByType($id, $type)
  {
    // berdasarkan idMapel
    if ($type == 'id_mapel') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_sekolah.*, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['id_mapel' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_sekolah', 'tb_sekolah.id_sekolah = r_pelajaran.id_sekolah')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_sekolah
    if ($type == 'id_sekolah') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_sekolah.*, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['id_sekolah' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_sekolah', 'tb_sekolah.id_sekolah = r_pelajaran.id_sekolah')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_sekolah.*, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['id_kelas' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_sekolah', 'tb_sekolah.id_sekolah = r_pelajaran.id_sekolah')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->row_array();
    }
  }

  // update Pelajaran dari id
  public function upadatePelajaranById($idMapel, $data)
  {
    return $this->db->update('r_pelajaran', $data, ['id_mapel' => $idMapel]);
  }

  // delete Pelajaran
  public function deletePelajaranByType($id, $type)
  {
    // berdasarkan id Mapel
    if ($type == 'id_mapel')
      return $this->db->delete('r_pelajaran', ['id_mapel' => $id]);

    // berdasarkan id sekolah
    if ($type == 'id_sekolah')
      return $this->db->delete('r_pelajaran', ['id_sekolah' => $id]);

    // berdasarkan id kelas
    if ($type == 'id_kelas')
      return $this->db->delete('r_pelajaran', ['id_kelas' => $id]);
  }
}
