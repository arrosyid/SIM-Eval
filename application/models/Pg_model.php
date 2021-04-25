<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pg_model extends CI_Model
{
  // mengambil semua Pg
  public function getAllPg()
  {
    return $this->db->get('tb_dist_jwbpg');
  }

  // mengambil data Pg berdasarkan tipe id
  public function getPgByType($id, $type)
  {
    // berdasarkan idPg
    if ($type == 'id_pg') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['id_pg' => $id])
        ->join('tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get();
    }

    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['id_soal' => $id])
        ->join('tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get();
    }
  }

  // update Pg dari id
  public function upadatePgById($idPg, $data)
  {
    return $this->db->update('tb_dist_jwbpg', $data, ['id_pg' => $idPg]);
  }

  // delete Pg
  public function deletePgByType($id, $type)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_dist_jwbpg', ['id_pg' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_dist_jwbpg', ['id_soal' => $id]);
  }
}
