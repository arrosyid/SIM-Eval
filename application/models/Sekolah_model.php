<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    return $this->db->get('tb_sekolah');
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByid($id)
  {
    // berdasarkan id sekolah
    return $this->db->get_where('tb_sekolah', ['id_sekolah' => $id]);
  }

  // update soal dari id
  public function upadateSoalById($id, $data)
  {
    return $this->db->update('tb_sekolah', $data, ['id_sekolah' => $id]);
  }

  // delete soal
  public function deleteSoalByType($id)
  {
    return $this->db->delete('tb_sekolah', ['id_sekolah' => $id]);
  }
}
