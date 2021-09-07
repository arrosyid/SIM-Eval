<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
  // mengambil semua Guru
  public function getAllGuru()
  {
    $this->db->select('tb_guru.*, tb_mapel.*')
      ->from('tb_guru')
      ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
    return $this->db->get()->result_array();
  }

  // mengambil data Guru berdasarkan tipe id
  public function getGuruByType($type, $id)
  {
    // berdasarkan id Guru
    if ($type == 'id_guru') {
      $this->db->select('tb_guru.*, tb_mapel.*')
        ->from('tb_guru')
        ->where(['tb_guru.id_guru' => $id])
        ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      return $this->db->get()->row_array();
    }

    // berdasarkan id mapel
    if ($type == 'id_mapel') {
      $this->db->select('tb_guru.*, tb_mapel.*')
        ->from('tb_guru')
        ->where(['tb_guru.id_mapel' => $id])
        ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      return $this->db->get()->result_array();
    }

    // berdasarkan id user
    if ($type == 'id_user') {
      $this->db->select('tb_guru.*, tb_mapel.*')
        ->from('tb_guru')
        ->where(['tb_guru.id_user' => $id])
        ->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
      return $this->db->get()->row_array();
    }
  }

  // insert Guru dari id
  public function insertGuru($data1, $data2)
  {
    $this->db->trans_start();
    $this->db->insert('tb_user', $data1);
    $id = $this->db->insert_id();
    $data2['id_user'] = $id;
    // $id = $this->db->get_where('tb_user', ['email' => $data1['email']])->row_array();
    // $data2['id_user'] = $id['id_user'];
    $this->db->insert('tb_guru', $data2);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  // update Guru dari id
  public function upadateGuruById($idGuru, $data)
  {
    return $this->db->update('tb_guru', $data, ['id_guru' => $idGuru]);
  }

  // delete Guru
  public function deleteGuruByType($type, $id)
  {
    // berdasarkan id Guru
    if ($type == 'id_guru')
      return $this->db->delete('tb_guru', ['id_guru' => $id]);

    // berdasarkan id mapel
    if ($type == 'id_mapel')
      return $this->db->delete('tb_guru', ['id_mapel' => $id]);
  }
}
