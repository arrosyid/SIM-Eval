<?php
defined('BASEPATH') or exit('No direct script access allowed');

class soal_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
      ->from('tb_soal')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
      ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($type, $id)
  {
    // berdasarkan idsoal
    if ($type == 'id_soal') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['id_soal' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_jawab
    if ($type == 'id_jawab') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_dist_jawab.id_jawab' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_soal.*, tb_siswa.*, tb_jawab.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_soal.id_siswa')
        ->join('tb_jawab', 'tb_dist_jawab.id_jawab = tb_soal.id_jawab')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->result_array();
    }
  }

  // update soal dari id
  public function upadateSoalById($idSoal, $data)
  {
    return $this->db->update('tb_soal', $data, ['id_soal' => $idSoal]);
  }

  // delete soal
  public function deleteSoalByType($type, $id)
  {
    // berdasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_soal', ['id_soal' => $id]);

    // berdasarkan id_siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_soal', ['id_siswa' => $id]);

    // berdasarkan id_jawab
    if ($type == 'id_jawab')
      return $this->db->delete('tb_soal', ['id_jawab' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_soal', ['id_ujian' => $id]);
  }

  public function skor($tipe_soal, $id_ujian)
  {
    $data_ujian = $this->db->get_where('tb_ujian', ['id_ujian' => $id_ujian])->row_array();
    $kunci = $this->db->get_where('tb_dist_jwb', ['id_ujian' => $id_ujian] && ['kunci' => 1])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_ujian['id_kelas']])->row_array();
    // untuk pilihan ganda
    if ($tipe_soal == 'PILIHAN GANDA') {
      $data_jwb = $this->db->select('tb_soal.*, tb_dist_jwb.*')
        ->from('tb_soal')
        ->where(['id_ujian' => $id_ujian] && ['jenis_soal' => 'PILIHAN GANDA'])
        ->join('tb_dist_jwb', 'tb_dist_jwb.id_jawab = tb_soal.id_ujian')->get()->result_array();
      for ($j = 0; $j < $data_kelas['jml_siswa']; $j++) {
        // diganti, data/nilai skor dimasukkan kedalam tabel masing2
        $nilai = [
          'jml_skor' => 0,
          'nilai' => 0,
          'kelompok' => null,
          'id_soal' => $data_jwb[$j]['id_soal'],
        ];
        for ($i = 0; $i < $data_ujian['jml_soalpg']; $i++) {
          if ($data_jwb[$j][$i] == $kunci[$i]) {
            $data_jwb["no_$i"] = 3;
            $nilai['jml_skor'] += 3;
          } else {
            $data_jwb["no_$i"] = 0;
          }
        }
        $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_ujian['skor_maxpg']) * 100);
        $skor[$j] = $nilai;
      }
      // return $skor; // hapus
      // cek lagi returnnya ke database
      return $this->db->update_batch('tb_soal', $skor, 'id_soal');

      // untuk uraian
    } elseif ($tipe_soal == 'URAIAN') {
      $data_jwb = $this->db->select('tb_soal.*, tb_dist_jwb.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id_ujian] && ['tb_soal.jenis_soal' => 'URAIAN'])
        ->join('tb_dist_jwb', 'tb_dist_jwb.id_jawab = tb_soal.id_ujian')->get()->result_array();
      for ($j = 0; $j < $data_kelas['jml_siswa']; $j++) {
        // diganti, data/nilai skor dimasukkan kedalam tabel masing2
        $nilai = [
          'jml_skor' => 0,
          'nilai' => 0,
          'kelompok' => null,
          'id_soal' => $data_jwb[$j]['id_soal'],
        ];
        for ($i = 0; $i < $data_ujian['jml_soaluo']; $i++) {
          // $nilai['jml_skor'] += $uraian[$i][$j];
          $nilai['jml_skor'] += $data_jwb[$i][$j];
        }
        $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_ujian['skor_maxuo']) * 100);
        $skor[$j] = $nilai;
      }
      return $skor; // hapus
      // cek lagi returnnya ke database
      return $this->db->update_batch('tb_soal', $skor, 'id_soal');
    }
  }

  // fungsi sudah dapat dipakai
  // menentukan jumlah kelompok atas dan bawah
  public function kelAtasBawah($id_kelas)
  {
    $kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();
    // $kelas['jml_siswa'] = 47;
    $AtasBwh['jml_kelAtsBwh'] = (int) round((30 / 100) * $kelas['jml_siswa']);
    $AtasBwh['jml_kelTengah'] = $kelas['jml_siswa'] - ($AtasBwh['jml_kelAtsBwh'] * 2);
    // return $AtasBwh; // hapus
    // cek lagi returnnya
    return $this->db->update('tb_kelas', $AtasBwh, ['id_kelas' => $id_kelas]);
  }
}
