<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
  // mengambil semua Sekolah
  public function getAllSekolah()
  {
    return $this->db->get('tb_sekolah')->result_array();
  }

  // mengambil data Sekolah berdasarkan tipe id
  public function getSekolahByid($id)
  {
    // berdasarkan id sekolah
    return $this->db->get_where('tb_sekolah', ['id_sekolah' => $id])->row_array();
  }

  // update Sekolah dari id
  public function upadateSekolahById($id, $data)
  {
    return $this->db->update('tb_sekolah', $data, ['id_sekolah' => $id]);
  }

  // delete Sekolah
  public function deleteSekolahByType($id)
  {
    return $this->db->delete('tb_sekolah', ['id_sekolah' => $id]);
  }
}
