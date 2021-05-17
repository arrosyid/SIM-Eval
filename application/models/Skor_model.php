<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor_model extends CI_Model
{
  // mengambil semua Skor
  public function getAllSkor()
  {
    return $this->db->get('tb_dist_nilai')->result_array();
  }

  // mengambil data Skor berdasarkan tipe id
  public function getSkorByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor') {
      $this->db->select('tb_dist_nilai.*, tb_dist_jwbpg.*, tb_dist_jwbuo.*, tb_mapel.*, tb_siswa')
        ->from('tb_dist_nilai')
        ->where(['id_skor' => $id])
        ->join('tb_dist_nilai.id_pg = tb_dist_jwbpg.id_pg, tb_dist_nilai.id_uraian = tb_dist_jwbuo.id_uraian, tb_dist_nilai.id_mapel = tb_mapel.id_mapel, tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_pg') {
      $this->db->select('tb_dist_nilai.*, tb_dist_jwbpg.*, tb_dist_jwbuo.*, tb_mapel.*, tb_siswa')
        ->from('tb_dist_nilai')
        ->where(['id_pg' => $id])
        ->join('tb_dist_nilai.id_pg = tb_dist_jwbpg.id_pg, tb_dist_nilai.id_uraian = tb_dist_jwbuo.id_uraian, tb_dist_nilai.id_mapel = tb_mapel.id_mapel, tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_uraian') {
      $this->db->select('tb_dist_nilai.*, tb_dist_jwbpg.*, tb_dist_jwbuo.*, tb_mapel.*, tb_siswa')
        ->from('tb_dist_nilai')
        ->where(['id_uraian' => $id])
        ->join('tb_dist_nilai.id_pg = tb_dist_jwbpg.id_pg, tb_dist_nilai.id_uraian = tb_dist_jwbuo.id_uraian, tb_dist_nilai.id_mapel = tb_mapel.id_mapel, tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_mapel') {
      $this->db->select('tb_dist_nilai.*, tb_dist_jwbpg.*, tb_dist_jwbuo.*, tb_mapel.*, tb_siswa')
        ->from('tb_dist_nilai')
        ->where(['id_mapel' => $id])
        ->join('tb_dist_nilai.id_pg = tb_dist_jwbpg.id_pg, tb_dist_nilai.id_uraian = tb_dist_jwbuo.id_uraian, tb_dist_nilai.id_mapel = tb_mapel.id_mapel, tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_siswa') {
      $this->db->select('tb_dist_nilai.*, tb_dist_jwbpg.*, tb_dist_jwbuo.*, tb_mapel.*, tb_siswa')
        ->from('tb_dist_nilai')
        ->where(['id_siswa' => $id])
        ->join('tb_dist_nilai.id_pg = tb_dist_jwbpg.id_pg, tb_dist_nilai.id_uraian = tb_dist_jwbuo.id_uraian, tb_dist_nilai.id_mapel = tb_mapel.id_mapel, tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
  }

  // update Skor dari id
  public function upadateSkorById($idSkor, $data)
  {
    return $this->db->update('tb_dist_nilai', $data, ['id_skor' => $idSkor]);
  }

  // delete Skor
  public function deleteSkorByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_dist_nilai', ['id_skor' => $id]);

    // berdasarkan id pilihan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_dist_nilai', ['id_pg' => $id]);

    // berdasarkan id uraian
    if ($type == 'id_uraian')
      return $this->db->delete('tb_dist_nilai', ['id_uraian' => $id]);

    // berdasarkan id mapel
    if ($type == 'id_mapel')
      return $this->db->delete('tb_dist_nilai', ['id_mapel' => $id]);

    // berdasarkan id siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_dist_nilai', ['id_siswa' => $id]);
  }
}
