<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
  // mengambil semua Mapel
  public function getAllMapel()
  {
    return $this->db->get('tb_mapel')->result_array();
  }

  // mengambil data Mapel berdasarkan tipe id
  public function getMapelById($id)
  {
    return $this->db->get_where('tb_mapel', [$id => 'id_mapel'])->row_array();
  }

  // update Mapel dari id
  public function upadateMapelById($idMapel, $data)
  {
    return $this->db->update('tb_mapel', $data, ['id_mapel' => $idMapel]);
  }

  // delete Mapel
  public function deleteMapelById($id)
  {
    return $this->db->delete('tb_mapel', ['id_mapel' => $id]);
  }
}
