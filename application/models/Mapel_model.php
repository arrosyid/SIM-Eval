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
    // $this->db->trans_start();
    $pelajaran = $this->db->get_where('r_pelajaran', ['id_mapel' => $id])->result_array();
    $guru = $this->db->get_where('tb_guru', ['id_mapel' => $id])->result_array();
    if ($pelajaran != null) {
      foreach ($pelajaran as $P => $pel) {
        $siswa[$P] = $this->db->get_where('tb_siswa', ['id_kelas' => $pel['id_kelas']])->result_array();
        $ujian[$P] = $this->db->get_where('tb_ujian', ['id_pelajaran' => $pel['id_pelajaran']])->result_array();
      }
    }
    if (isset($ujian)) {
      foreach ($ujian as $U => $val) {
        if (is_array($val)) {
          foreach ($val as $V => $va) {
            // untuk hapus data ujian
            $this->db->delete('tb_analis_soalpg', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_analis_soaluo', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_skor', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_soal', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_dist_jwb', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_dist_nilai', ['id_ujian' => $va['id_ujian']]);
            $this->db->delete('tb_ujian', ['id_ujian' => $va['id_ujian']]);
          }
        }
      }
    }
    if (isset($siswa)) {
      foreach ($siswa as $S => $sis) {
        if (is_array($sis)) {
          foreach ($sis as $I => $si) {
            // untuk hapus akun Siswa
            $this->db->delete('tb_siswa', ['id_siswa' => $si['id_siswa']]);
            $this->db->delete('tb_user', ['id_user' => $si['id_user']]);
          }
        }
      }
    }
    if ($pelajaran != null) {
      foreach ($pelajaran as $P => $pel) {
        // hapus yg berhubungan r pelajaran
        $this->db->delete('r_pelajaran', ['id_pelajaran' => $pel['id_pelajaran']]);
        $this->db->delete('tb_kelas', ['id_kelas' => $pel['id_kelas']]);
      }
    }
    if ($guru != null) {
      foreach ($guru as $G => $gu) {
        // untuk hapus akun guru
        $this->db->delete('tb_guru', ['id_guru' => $gu['id_guru']]);
        $this->db->delete('tb_user', ['id_user' => $gu['id_user']]);
      }
    }
    // hapus yg berhubungan tb guru
    $this->db->delete('tb_mapel', ['id_mapel' => $id]);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
}
