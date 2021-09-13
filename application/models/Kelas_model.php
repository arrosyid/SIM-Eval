
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
  // mengambil semua Kelas
  public function getAllKelas()
  {
    $this->db->select('tb_kelas.*, tb_guru.*')
      ->from('tb_kelas')
      ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
    return $this->db->get()->result_array();
  }

  // mengambil data Kelas berdasarkan tipe id
  public function getKelasByType($type, $id)
  {
    // berdasarkan id Kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_kelas.*, tb_guru.*')
        ->from('tb_kelas')
        ->where(['tb_kelas.id_kelas' => $id])
        ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
      return $this->db->get()->row_array();
    }

    // berdasarkan id guru
    if ($type == 'id_guru') {
      $this->db->select('tb_kelas.*, tb_guru.*')
        ->from('tb_kelas')
        ->where(['tb_kelas.id_guru' => $id])
        ->join('tb_guru', 'tb_kelas.id_guru = tb_guru.id_guru');
      return $this->db->get()->result_array();
    }
  }

  // update Kelas dari id
  public function upadateKelasById($idKelas, $data)
  {
    return $this->db->update('tb_kelas', $data, ['id_kelas' => $idKelas]);
  }

  // delete Kelas
  public function deleteKelasById($id)
  {
    $this->db->trans_start();
    $ujian = $this->db->get_where('tb_ujian', ['id_kelas' => $id])->row_array();
    // data dari r_pelajaran
    $this->db->delete('tb_analis_soalpg', ['id_ujian' => $ujian['id_ujian']]);
    $this->db->delete('tb_analis_soaluo', ['id_ujian' => $ujian['id_ujian']]);
    $this->db->delete('tb_skor', ['id_ujian' => $ujian['id_ujian']]);
    $this->db->delete('tb_soal', ['id_ujian' => $ujian['id_ujian']]);
    $this->db->delete('tb_dist_jwb', ['id_ujian' => $ujian['id_ujian']]);
    $this->db->delete('tb_dist_nilai', ['id_ujian' => $ujian['id_ujian']]);

    $this->db->delete('r_pelajaran', ['id_kelas' => $id]);
    $this->db->delete('tb_siswa', ['id_kelas' => $id]);
    $this->db->delete('tb_kelas', ['id_kelas' => $id]);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
}
