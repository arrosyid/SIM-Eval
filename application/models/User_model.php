<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  // mengambil user berdasarkan email
  public function getUserByUsername($username)
  {
    return $this->db->get_where('tb_user', ['username' => $username])->row_array();
  }
  // mengambil user berdasarkan email
  public function getUserByEmail($email)
  {
    return $this->db->get_where('tb_user', ['email' => $email])->row_array();
  }
  // mengambil user berdasarkan id
  public function getUserById($id)
  {
    return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
  }
  // mengambil user berdasarkan guru
  public function getAllUser()
  {
    $this->db->select('user.*, tb_guru.nm_guru');
    $this->db->from('tb_user');
    $this->db->join('tb_guru', 'user.id_guru = tb_guru.id_guru');
    return $this->db->get()->result_array();
  }

  // untuk merubah status aktiv user
  public function setUserActiveStatus($email, $status)
  {
    return $this->db->update('tb_user', ['is_active' => $status], ['email' => $email]);
  }
  // untuk delete user by email
  public function deleteUserByEmail($email)
  {
    return $this->db->delete('tb_user', ['email' => $email]);
  }
  // delete kooperasi by parameter
  public function deleteUserById($type = 'id_user', $param = null)
  {
    if ($type == 'id_user') {
      return $this->db->delete('tb_user', ['id_user' => $param]);
    }

    if ($type == 'id_guru') {
      return $this->db->delete('tb_user', ['id_guru' => $param]);
    }
  }

  // update user by email
  public function updateUserByEmail($email, $data)
  {
    return $this->db->update('tb_user', $data, ['email' => $email]);
  }
  public function updateUserById($data, $id)
  {
    return $this->db->update('tb_user', $data, ['id_user' => $id]);
  }
}
