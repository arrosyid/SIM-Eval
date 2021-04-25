<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
  // mengambil semua Mapel
  public function getAllMapel()
  {
    return $this->db->get('tb_mapel');
  }

  // mengambil data Mapel berdasarkan tipe id
  public function getMapelByType($id, $type)
  {
    // berdasarkan idMapel
    if ($type == 'id_mapel') {
      $this->db->select('tb_mapel.*, tb_sekolah.*, tb_kelas.*')
        ->from('tb_mapel')
        ->where(['id_mapel' => $id])
        ->join('tb_sekolah.id_sekolah = tb_mapel.id_sekolah, tb_kelas.id_kelas = tb_mapel.id_kelas');
      return $this->db->get();
    }

    // berdasarkan id_sekolah
    if ($type == 'id_sekolah') {
      $this->db->select('tb_mapel.*, tb_sekolah.*, tb_kelas.*')
        ->from('tb_mapel')
        ->where(['id_sekolah' => $id])
        ->join('tb_sekolah.id_sekolah = tb_mapel.id_sekolah, tb_kelas.id_kelas = tb_mapel.id_kelas');
      return $this->db->get();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_mapel.*, tb_sekolah.*, tb_kelas.*')
        ->from('tb_mapel')
        ->where(['id_kelas' => $id])
        ->join('tb_sekolah.id_sekolah = tb_mapel.id_sekolah, tb_kelas.id_kelas = tb_mapel.id_kelas');
      return $this->db->get();
    }
  }

  // update Mapel dari id
  public function upadateMapelById($idMapel, $data)
  {
    return $this->db->update('tb_mapel', $data, ['id_mapel' => $idMapel]);
  }

  // delete Mapel
  public function deleteMapelByType($id, $type)
  {
    // berdasarkan id Mapel
    if ($type == 'id_mapel')
      return $this->db->delete('tb_mapel', ['id_mapel' => $id]);

    // berdasarkan id sekolah
    if ($type == 'id_sekolah')
      return $this->db->delete('tb_mapel', ['id_sekolah' => $id]);

    // berdasarkan id kelas
    if ($type == 'id_kelas')
      return $this->db->delete('tb_mapel', ['id_kelas' => $id]);
  }
}
