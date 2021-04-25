<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    return $this->db->get('tb_siswa');
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($id, $type)
  {
    // berdasarkan idSiswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['id_siswa' => $id])
        ->join('tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['id_kelas' => $id])
        ->join('tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get();
    }
  }

  // update soal dari id
  public function upadateSoalById($idSiswa, $data)
  {
    return $this->db->update('tb_siswa', $data, ['id_siswa' => $idSiswa]);
  }

  // delete soal
  public function deleteSoalByType($id, $type)
  {
    // berdasarkan id soal
    if ($type == 'id_siswa')
      return $this->db->delete('tb_siswa', ['id_siswa' => $id]);


    if ($type == 'id_kelas')
      return $this->db->delete('tb_siswa', ['id_kelas' => $id]);
  }
}
