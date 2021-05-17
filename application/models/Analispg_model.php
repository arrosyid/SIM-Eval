<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analispg_model extends CI_Model
{
  // mengambil semua Analispg
  public function getAllAnalispg()
  {
    return $this->db->get('tb_analis_soalpg')->result_array();
  }

  // mengambil data Analispg berdasarkan tipe id
  public function getAnalispgByType($type, $id)
  {
    // berdasarkan idAnalispg
    if ($type == 'id_analispg') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_analispg' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_pg
    if ($type == 'id_pg') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_pg' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }
    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_soal' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }
  }

  // update Analispg dari id
  public function upadateAnalispgById($idAnalispg, $data)
  {
    return $this->db->update('tb_analis_soalpg', $data, ['id_analispg' => $idAnalispg]);
  }

  // delete Analispg
  public function deleteAnalispgByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_analispg')
      return $this->db->delete('tb_analis_soalpg', ['id_analispg' => $id]);

    // bersasarkan id pilihan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_analis_soalpg', ['id_pg' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_analis_soalpg', ['id_soal' => $id]);
  }
}
