<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eval_model extends CI_Model
{
  // mengambil semua Eval
  public function getAllEval()
  {
    return $this->db->get('tb_analis_eval');
  }

  // mengambil data Eval berdasarkan tipe id
  public function getEvalByType($id, $type)
  {
    // berdasarkan idEval
    if ($type == 'id_eval') {
      $this->db->select('tb_analis_eval.*, tb_dist_nilai.*')
        ->from('tb_analis_eval')
        ->where(['id_eval' => $id])
        ->join('tb_dist_nilai.id_skor = tb_analis_eval.id_skor');
      return $this->db->get();
    }

    // berdasarkan id_pg
    if ($type == 'id_pg') {
      $this->db->select('tb_analis_eval.*, tb_dist_nilai.*')
        ->from('tb_analis_eval')
        ->where(['id_pg' => $id])
        ->join('tb_dist_nilai.id_skor = tb_analis_eval.id_skor');
      return $this->db->get();
    }
    // berdasarkan id_skor
    if ($type == 'id_skor') {
      $this->db->select('tb_analis_eval.*, tb_dist_nilai.*')
        ->from('tb_analis_eval')
        ->where(['id_skor' => $id])
        ->join('tb_dist_nilai.id_skor = tb_analis_eval.id_skor');
      return $this->db->get();
    }
  }

  // update Eval dari id
  public function upadateEvalById($idEval, $data)
  {
    return $this->db->update('tb_analis_eval', $data, ['id_eval' => $idEval]);
  }

  // delete Eval
  public function deleteEvalByType($id, $type)
  {
    // berdasarkan id eval
    if ($type == 'id_eval')
      return $this->db->delete('tb_analis_eval', ['id_eval' => $id]);

    // bersasarkan id skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_analis_eval', ['id_skor' => $id]);
  }
}
