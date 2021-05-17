
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
  // mengambil semua Kelas
  public function getAllKelas()
  {
    $this->db->select('tb_kelas.*, tb_guru.*')
      ->from('tb_kelas')
      ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
    return $this->db->get()->result_array();
  }

  // mengambil data Kelas berdasarkan tipe id
  public function getKelasByType($id, $type)
  {
    // berdasarkan id Kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_kelas.*, tb_guru.*')
        ->from('tb_kelas')
        ->where(['id_kelas' => $id])
        ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
      return $this->db->get()->row_array();
    }

    // berdasarkan id guru
    if ($type == 'id_guru') {
      $this->db->select('tb_kelas.*, tb_guru.*')
        ->from('tb_kelas')
        ->where(['id_guru' => $id])
        ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
      return $this->db->get()->row_array();
    }
  }

  // update Kelas dari id
  public function upadateKelasById($idKelas, $data)
  {
    return $this->db->update('tb_kelas', $data, ['id_kelas' => $idKelas]);
  }

  // delete Kelas
  public function deleteKelasByType($id, $type)
  {
    // berdasarkan id Kelas
    if ($type == 'id_kelas')
      return $this->db->delete('tb_kelas', ['id_kelas' => $id]);

    // berdasarkan id guru
    if ($type == 'id_guru')
      return $this->db->delete('tb_kelas', ['id_guru' => $id]);
  }
}
