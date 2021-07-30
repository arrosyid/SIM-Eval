<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jawaban_model extends CI_Model
{
  // mengambil semua jawab
  public function getAllJawab()
  {
    $this->db->select('tb_dis_jwb.*, tb_siswa.*, tb_ujian.*')
      ->from('tb_dis_jwb')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dis_jwb.id_siswa')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dis_jwb.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data jawab berdasarkan tipe id
  public function getJawabByType($type, $id)
  {
    // berdasarkan idjawab
    if ($type == 'id_jawab') {
      $this->db->select('tb_dis_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dis_jwb')
        ->where(['id_jawab' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dis_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dis_jwb.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_dis_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dis_jwb')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dis_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dis_jwb.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_dis_jwb.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_dis_jwb')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_dis_jwb.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_dis_jwb.id_ujian');
      return $this->db->get()->result_array();
    }
  }

  // update jawab dari id
  public function upadateJawabById($id, $data)
  {
    return $this->db->update('tb_dis_jwb', $data, ['id_jawab' => $id]);
  }

  // delete jawab
  public function deleteJawabByType($type, $id)
  {
    // berdasarkan id jawab
    if ($type == 'id_jawab')
      return $this->db->delete('tb_dis_jwb', ['id_jawab' => $id]);

    // berdasarkan id_siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_dis_jwb', ['id_siswa' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_dis_jwb', ['id_ujian' => $id]);
  }
}
