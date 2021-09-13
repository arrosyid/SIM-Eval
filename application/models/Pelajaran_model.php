<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran_model extends CI_Model
{
  // mengambil semua Pelajaran
  public function getAllPelajaran()
  {
    $this->db->select('r_pelajaran.*, tb_mapel.mapel, tb_kelas.*')
      ->from('r_pelajaran')
      ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
      ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
    return $this->db->get()->result_array();
  }

  // mengambil data Pelajaran berdasarkan tipe id
  public function getPelajaranByType($type, $id)
  {
    // berdasarkan idMapel
    if ($type == 'id_mapel') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['r_pelajaran.id_mapel' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_pelajaran
    if ($type == 'id_pelajaran') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['r_pelajaran.id_pelajaran' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('r_pelajaran.*,tb_mapel.mapel, tb_kelas.*')
        ->from('r_pelajaran')
        ->where(['r_pelajaran.id_kelas' => $id])
        ->join('tb_mapel', 'tb_mapel.id_mapel = r_pelajaran.id_mapel')
        ->join('tb_kelas', 'tb_kelas.id_kelas = r_pelajaran.id_kelas');
      return $this->db->get()->result_array();
    }
  }

  // update Pelajaran dari id
  public function upadatePelajaranById($idMapel, $data)
  {
    return $this->db->replace('r_pelajaran', $data);
  }

  // delete Pelajaran
  public function deletePelajaranById($id)
  {
    $this->db->trans_start();
    $ujian = $this->db->get_where('tb_ujian', ['id_pelajaran' => $id])->result_array();
    if ($ujian != null) {
      foreach ($ujian as $U => $val) {
        // data dari tb ujian
        $this->db->delete('tb_analis_soalpg', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_analis_soaluo', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_dist_jwb', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_dist_nilai', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_skor', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_soal', ['id_ujian' => $val['id_ujian']]);
      }
    }

    $this->db->delete('tb_ujian', ['id_pelajaran' => $id]);
    $this->db->delete('r_pelajaran', ['id_pelajaran' => $id]);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
}
