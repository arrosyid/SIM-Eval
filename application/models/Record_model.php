<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{
  // mengambil semua Record
  public function getAllRecord()
  {
    $this->db->select('tb_record_login.*, tb_user.*')
      ->from('tb_record_login')
      ->join('tb_user', 'tb_user.id_user = tb_record_login.id_user');
    return $this->db->get()->result_array();
  }
  public function getAllRecordLimit()
  {
    $this->db->select('tb_record_login.*, tb_user.*')
      ->from('tb_record_login')
      ->join('tb_user', 'tb_user.id_user = tb_record_login.id_user');
    return $this->db->get(6)->result_array();
  }

  // mengambil data Record berdasarkan tipe id
  public function getRecordByType($type, $id)
  {
    // berdasarkan id
    if ($type == 'id_record') {
      $this->db->select('tb_record_login.*, tb_user.*')
        ->from('tb_record_login')
        ->where(['id_record' => $id])
        ->join('tb_user', 'tb_user.id_user = tb_record_login.id_user');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_user
    if ($type == 'id_user') {
      $this->db->select('tb_record_login.*, tb_user.*')
        ->from('tb_record_login')
        ->where(['id_user' => $id])
        ->join('tb_user', 'tb_user.id_user = tb_record_login.id_user');
      return $this->db->get()->row_array();
    }
  }

  // update Record dari id
  public function upadateRecordById($id, $data)
  {
    return $this->db->update('tb_record_login', $data, ['id_record' => $id]);
  }

  // delete Record
  public function deleteRecordByType($type, $id)
  {
    // berdasarkan id Record
    if ($type == 'id_record')
      return $this->db->delete('tb_record_login', ['id_record' => $id]);

    // berdasarkan id user
    if ($type == 'id_user')
      return $this->db->delete('tb_record_login', ['id_user' => $id]);
  }
}
