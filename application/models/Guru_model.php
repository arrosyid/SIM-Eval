<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
  // mengambil semua Guru
  public function getAllGuru()
  {
    $this->db->select('tb_guru.*, tb_mapel.*')
      ->from('tb_guru')
      ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
    return $this->db->get()->result_array();
  }

  // mengambil data Guru berdasarkan tipe id
  public function getGuruByType($type, $id)
  {
    // berdasarkan id Guru
    if ($type == 'id_guru') {
      $this->db->select('tb_guru.*, tb_mapel.*')
        ->from('tb_guru')
        ->where(['id_guru' => $id])
        ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      return $this->db->get()->row_array();
    }

    // berdasarkan id mapel
    if ($type == 'id_mapel') {
      $this->db->select('tb_guru.*, tb_mapel.*')
        ->from('tb_guru')
        ->where(['id_mapel' => $id])
        ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      return $this->db->get()->row_array();
    }
  }

  // update Guru dari id
  public function upadateGuruById($idGuru, $data)
  {
    return $this->db->update('tb_guru', $data, ['id_guru' => $idGuru]);
  }

  // delete Guru
  public function deleteGuruByType($id, $type)
  {
    // berdasarkan id Guru
    if ($type == 'id_guru')
      return $this->db->delete('tb_guru', ['id_guru' => $id]);

    // berdasarkan id mapel
    if ($type == 'id_mapel')
      return $this->db->delete('tb_guru', ['id_mapel' => $id]);
  }
}
