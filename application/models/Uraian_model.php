<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uraian_model extends CI_Model
{
  // mengambil semua Uraian
  public function getAllUraian()
  {
    $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
      ->from('tb_dist_jwbuo')
      ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
    return $this->db->get('tb_dist_jwbuo')->result_array();
  }

  // mengambil data Uraian berdasarkan tipe id
  public function getUraianByType($type, $id)
  {
    // berdasarkan idUraian
    if ($type == 'id_uraian') {
      $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
        ->from('tb_dist_jwbuo')
        ->where(['id_uraian' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
        ->from('tb_dist_jwbuo')
        ->where(['tb_soal.id_soal' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
      return $this->db->get()->result_array();
    }
  }

  // update Uraian dari id
  public function upadateUraianById($idUraian, $data)
  {
    return $this->db->update('tb_dist_jwbuo', $data, ['id_uraian' => $idUraian]);
  }

  // delete Uraian
  public function deleteUraianByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_uraian')
      return $this->db->delete('tb_dist_jwbuo', ['id_uraian' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_dist_jwbuo', ['id_soal' => $id]);
  }
}
