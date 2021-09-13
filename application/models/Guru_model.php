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
  public function deleteGuruById($id)
  {
    $this->db->trans_start();
    $guru = $this->db->get_where('tb_guru', ['id_guru' => $id])->row_array();
    $kelas = $this->db->get_where('tb_kelas', ['id_guru' => $id])->row_array();
    if ($kelas != null) {
      $ujian = $this->db->get_where('tb_ujian', ['id_kelas' => $kelas['id_kelas']])->result_array();
      $siswa = $this->db->get_where('tb_siswa', ['id_kelas' => $kelas['id_kelas']])->result_array();
    }

    if ($ujian != null) {
      foreach ($ujian as $U => $val) {
        // data dari tb_kelas
        $this->db->delete('tb_analis_soalpg', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_analis_soaluo', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_skor', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_soal', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_dist_jwb', ['id_ujian' => $val['id_ujian']]);
        $this->db->delete('tb_dist_nilai', ['id_ujian' => $val['id_ujian']]);
      }
    }
    if ($kelas != null) {
      if ($siswa != null) {
        foreach ($siswa as $S => $sis) {
          $this->db->delete('tb_siswa', ['id_siswa' => $sis['id_siswa']]);
          $this->db->delete('tb_user', ['id_user' => $sis['id_user']]);
        }
      }
      $this->db->delete('r_pelajaran', ['id_kelas' => $kelas['id_kelas']]);
      $this->db->delete('tb_kelas', ['id_kelas' => $kelas['id_kelas']]);
    }


    $this->db->delete('tb_guru', ['id_guru' => $id]);
    $this->db->delete('tb_user', ['id_user' => $guru['id_user']]);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
}
