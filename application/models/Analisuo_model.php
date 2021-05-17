<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisuo_model extends CI_Model
{
  // mengambil semua Analisuo
  public function getAllAnalisuo()
  {
    return $this->db->get('tb_analis_soaluo')->result_array();
  }

  // mengambil data Analisuo berdasarkan tipe id
  public function getAnalisuoByType($type, $id)
  {
    // berdasarkan idAnalisuo
    if ($type == 'id_analisuo') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_analisuo' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_uraian
    if ($type == 'id_uraian') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_uraian' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }
    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_soal' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }
  }

  // update Analisuo dari id
  public function upadateAnalisuoById($idAnalisuo, $data)
  {
    return $this->db->update('tb_analis_soaluo', $data, ['id_analisuo' => $idAnalisuo]);
  }

  // delete Analisuo
  public function deleteAnalisuoByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_analisuo')
      return $this->db->delete('tb_analis_soaluo', ['id_analisuo' => $id]);

    // bersasarkan id uraian
    if ($type == 'id_uraian')
      return $this->db->delete('tb_analis_soaluo', ['id_uraian' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_analis_soaluo', ['id_soal' => $id]);
  }
}
