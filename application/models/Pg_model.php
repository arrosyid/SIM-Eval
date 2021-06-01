<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pg_model extends CI_Model
{
  // mengambil semua Pg
  public function getAllPg()
  {
    $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
      ->from('tb_dist_jwbpg')
      ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
    return $this->db->get()->result_array();
  }

  // mengambil data Pg berdasarkan tipe id
  public function getPgByType($type, $id)
  {
    // berdasarkan idPg
    if ($type == 'id_pg') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['id_pg' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['tb_soal.id_soal' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get()->result_array();
    }
  }

  // update Pg dari id
  public function upadatePgById($idPg, $data)
  {
    return $this->db->update('tb_dist_jwbpg', $data, ['id_pg' => $idPg]);
  }

  // delete Pg
  public function deletePgByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_dist_jwbpg', ['id_pg' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_dist_jwbpg', ['id_soal' => $id]);
  }
}
