<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pg_model extends CI_Model
{
  // mengambil semua Pg
  public function getAllPg()
  {
    $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
      ->from('tb_dist_jwbpg')
      ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
    return $this->db->get()->result_array();
  }

  // mengambil data Pg berdasarkan tipe id
  public function getPgByType($type, $id)
  {
    // berdasarkan idPg
    if ($type == 'id_pg') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['id_pg' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_dist_jwbpg.*, tb_soal.*')
        ->from('tb_dist_jwbpg')
        ->where(['tb_soal.id_soal' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbpg.id_soal');
      return $this->db->get()->result_array();
    }
  }

  // update Pg dari id
  public function upadatePgById($idPg, $data)
  {
    return $this->db->update('tb_dist_jwbpg', $data, ['id_pg' => $idPg]);
  }

  // delete Pg
  public function deletePgByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_dist_jwbpg', ['id_pg' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_dist_jwbpg', ['id_soal' => $id]);
  }

  // fungsi Sudah dapat dipakai
  public function scoreSoalPG($id_soal)
  {
    $pg = $this->db->get_where('tb_dist_jwbpg', ['id_soal' => $id_soal] && ['kunci' => 0])->result_array();
    $kunci = $this->db->get_where('tb_dist_jwbpg', ['id_soal' => $id_soal] && ['kunci' => 1])->row_array();
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal]);
    $count = count($pg);
    for ($j = 0; $j < $count; $j++) {
      // diganti, data/nilai skor dimasukkan kedalam tabel masing2
      $nilai = [
        'jml_skor' => 0,
        'nilai' => 0
      ];
      for ($i = 0; $i < $data_soal['jml_soal']; $i++) {
        if ($pg[$j][$i] == $kunci[$i]) {
          $pg["no_$i"] = 3;
          $nilai['jml_skor'] += 3;
        } else {
          $pg["no_$i"] = 0;
        }
      }
      $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_soal['skor_max']) * 100);
      $id = [
        'id_pg' => $pg[$j]['id_pg'],
        'id_siswa' => $pg[$j]['id_siswa']
      ];
      $skor[$j] = $nilai + $id;
    }
    return $skor; // hapus
    // cek lagi returnnya
    // return $this->db->update('tb_dist_nilai', $skor, ['id_soal' => $id_soal] && ['id_siswa' => $id['id_siswa']]);
  }

  // fungsi sudah dapat dipakai
  // menentukan jumlah kelompok atas dan bawah
  public function kelAtasBawah($id_kelas)
  {
    $kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();
    // $kelas['jml_siswa'] = 47;
    $AtasBwh['jml_kelAtsBwh'] = (int) round((30 / 100) * $kelas['jml_siswa']);
    $AtasBwh['jml_kelTengah'] = $kelas['jml_siswa'] - ($AtasBwh['jml_kelAtsBwh'] * 2);
    return $AtasBwh; // hapus
    // cek lagi returnnya
    // return $this->db->update('tb_kelas', $AtasBwh, ['id_kelas' => $id_kelas]);
  }

  // menentukan kelompok atas, bawah dan tengah
  // fungsi selesai tinggal dimasukkan kedalam database
  public function updateKelompok($id_soal)
  {
    // yang diambil => id_pg, id_score, data
    $pg = $this->db->get_where('tb_dist_jwbpg', ['id_soal' => $id_soal])->result_array();
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_soal['id_kelas']])->row_array();

    array_multisort(array_column($pg, 'nilai'), SORT_DESC, $pg);

    for ($i = 0; $i < $data_soal['jml_siswa']; $i++) {
      $pg[$i]['kelompok'] = null;
      for ($j = 0; $j < $data_kelas['jml_kelAtsBwh']; $j++) {
        $pg[$j]['kelompok'] = 'ATS';
      }
      for ($k = $data_soal['jml_siswa']; $k > $data_kelas['jml_kelTengah']; $k--) {
        $pg[$k]['kelompok'] = 'BWH';
      }
      if ($pg[$i]['kelompok'] == null) {
        $pg[$i]['kelompok'] = 'TGH';
      }
    }
    return $pg; // dihapus
    // cek lagi returnnya ke database
    // return $this->db->update('tb_dist_nilai', $pg, ['id_siswa' => $pg['id_siswa']]);
  }

  // // data subtesting
  // public function coba()
  // {
  //   $kunci = [
  //     'id_pg' => 2,
  //     'id_soal' => 2,
  //     'id_siswa' => 14,
  //     'kelompok' => '',
  //     'kunci' => 1,
  //     'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A'
  //   ];
  //   $pg = [
  //     [
  //       'id_pg' => 2,
  //       'id_soal' => 2,
  //       'id_siswa' => 14,
  //       'kelompok' => 'ATS',
  //       'kunci' => 0,
  //       'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A'
  //     ],
  //     [
  //       'id_pg' => 1,
  //       'id_soal' => 2,
  //       'id_siswa' => 14,
  //       'kelompok' => 'ATS',
  //       'kunci' => 0,
  //       'D', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'B'
  //     ],
  //     [
  //       'id_pg' => 1,
  //       'id_soal' => 2,
  //       'id_siswa' => 14,
  //       'kelompok' => 'TGH',
  //       'kunci' => 0,
  //       'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B'
  //     ],
  //     [
  //       'id_pg' => 5,
  //       'id_soal' => 2,
  //       'id_siswa' => 14,
  //       'kelompok' => 'BWH',
  //       'kunci' => 1,
  //       'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A'
  //     ],
  //     [
  //       'id_pg' => 3,
  //       'id_soal' => 2, 
  //       'id_siswa' => 14,
  //       'kelompok' => 'BWH',
  //       'kunci' => 0,
  //       'D', 'C', 'A', 'B', 'B', 'A', 'D', 'C', 'B'
  //     ],
  //   ];
  //   $skor = ['jml_soal' => 9, 'skor_max' => 27];
  //   $count = count($pg);
  // $pg = [
  //   ['nilai' => 30, 'id_siswa' => 1],
  //   ['nilai' => 10, 'id_siswa' => 2],
  //   ['nilai' => 20, 'id_siswa' => 3],
  //   ['nilai' => 60, 'id_siswa' => 4],
  //   ['nilai' => 30, 'id_siswa' => 5],
  //   ['nilai' => 20, 'id_siswa' => 6],
  //   ['nilai' => 10, 'id_siswa' => 7],
  //   ['nilai' => 50, 'id_siswa' => 8],
  //   ['nilai' => 30, 'id_siswa' => 9],
  //   ['nilai' => 20, 'id_siswa' => 10],
  // ];
  // }
}
