<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
  // mengambil semua Siswa
  public function getAllSiswa()
  {
    $this->db->select('tb_siswa.*, tb_kelas.*')
      ->from('tb_siswa')
      ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
    return $this->db->get()->result_array();
  }

  // mengambil data Siswa berdasarkan tipe id
  public function getSiswaByType($type, $id)
  {
    // berdasarkan idSiswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['tb_siswa.id_kelas' => $id])
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_user
    if ($type == 'id_user') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['tb_siswa.id_user' => $id])
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get()->result_array();
    }
  }

  // update Siswa dari id
  public function upadateSiswaById($idSiswa, $data)
  {
    return $this->db->update('tb_siswa', $data, ['id_siswa' => $idSiswa]);
  }

  // insert Siswa dari id
  public function insertSiswa($data1, $data2)
  {
    // kemungkinan error
    $this->db->trans_start();
    $this->db->insert('tb_user', $data1);
    $id = $this->db->get_where('tb_user', ['email' => $data1['email']])->row_array();
    $data2['id_user'] = $id['id_user'];
    $this->db->insert('tb_siswa', $data2);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  // delete Siswa
  public function deleteSiswaByType($type, $id)
  {
    // berdasarkan id Siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_siswa', ['id_siswa' => $id]);


    if ($type == 'id_kelas')
      return $this->db->delete('tb_siswa', ['id_kelas' => $id]);
  }
}
