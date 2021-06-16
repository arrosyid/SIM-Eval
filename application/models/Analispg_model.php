<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analispg_model extends CI_Model
{
  // mengambil semua Analispg
  public function getAllAnalispg()
  {
    return $this->db->get('tb_analis_soalpg')->result_array();
  }

  // mengambil data Analispg berdasarkan tipe id
  public function getAnalispgByType($type, $id)
  {
    // berdasarkan idAnalispg
    if ($type == 'id_analispg') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_analispg' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_pg
    if ($type == 'id_pg') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_pg' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }
    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_analis_soalpg.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soalpg')
        ->where(['id_soal' => $id])
        ->join('tb_soal.id_soal = tb_analis_soalpg.id_soal, tb_analis_soalpg.id_pg = tb_dist_jwbpg.id_pg');
      return $this->db->get()->row_array();
    }
  }

  // update Analispg dari id
  public function upadateAnalispgById($idAnalispg, $data)
  {
    return $this->db->update('tb_analis_soalpg', $data, ['id_analispg' => $idAnalispg]);
  }

  // delete Analispg
  public function deleteAnalispgByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_analispg')
      return $this->db->delete('tb_analis_soalpg', ['id_analispg' => $id]);

    // bersasarkan id pilihan ganda
    if ($type == 'id_pg')
      return $this->db->delete('tb_analis_soalpg', ['id_pg' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_analis_soalpg', ['id_soal' => $id]);
  }

  public function analisButirSoalPg($id_soal)
  {
    // yang diambil => id_soal, id kelas
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    $data_jwb = $this->db->get_where('tb_dist_jwbpg', ['id_soal' => $id_soal] && ['kunci' => 0])->result_array();
    $kunci = $this->db->get_where('tb_dist_jwbpg', ['id_soal' => $id_soal] && ['kunci' => 1])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_soal['id_kelas']])->row_array();

    // fungsi for sudah berhasil dan menampilkan jumlah jawaban persoal
    for ($j = 1; $j <= $data_soal['jml_soal']; $j++) {
      $data_jmlJwb = [
        'jml_jwbBenar' => 0,
        'jml_jwbA' => 0,
        'jml_jwbB' => 0,
        'jml_jwbC' => 0,
        'jml_jwbD' => 0,
        'jml_jwbE' => 0,
        'jml_BenarAts' => 0,
        'jml_BenarBwh' => 0,
      ];
      for ($i = 0; $i < $data_kelas['jml_siswa']; $i++) {
        for ($k = 'A'; $k <= 'E'; $k++) {
          if ($data_jwb[$i][$j] == $k) {
            if ($kunci[$j] == "$k") {
              $data_jmlJwb['jml_jwbBenar'] += 1;
              if ($data_jwb['kelompok'] == 'ATS') {
                $data_jmlJwb['jml_BenarAts'] += 1;
              } else if ($data_jwb['kelompok'] == 'BWH') {
                $data_jmlJwb['jml_BenarBwh'] += 1;
              }
            }
            $data_jmlJwb["jml_jwb$k"] += 1;
          }
        }
        $distract = [
          'pengecoh_a' => round(($data_jmlJwb['jml_jwbA'] * 100 / $data_kelas['jml_siswa']), 2),
          'pengecoh_b' => round(($data_jmlJwb['jml_jwbB'] * 100 / $data_kelas['jml_siswa']), 2),
          'pengecoh_c' => round(($data_jmlJwb['jml_jwbC'] * 100 / $data_kelas['jml_siswa']), 2),
          'pengecoh_d' => round(($data_jmlJwb['jml_jwbD'] * 100 / $data_kelas['jml_siswa']), 2),
          'pengecoh_e' => round(($data_jmlJwb['jml_jwbE'] * 100 / $data_kelas['jml_siswa']), 2)
        ];
      }
      $t_sukar = round(($data_jmlJwb['jml_BenarAts'] + $data_jmlJwb['jml_BenarBwh']) / $data_kelas['jml_siswa'], 2);
      $d_beda = round(($data_jmlJwb['jml_BenarAts'] - $data_jmlJwb['jml_BenarBwh']) / $data_kelas['jml_siswa'], 2);

      if ($t_sukar <= 0.3) {
        $kriteriaTK = 'Sangat Sulit';
      } else if ($t_sukar <= 0.45) {
        $kriteriaTK = 'Sulit';
      } else if ($t_sukar <= 0.75) {
        $kriteriaTK = 'Sedang';
      } else if ($t_sukar <= 0.9) {
        $kriteriaTK = 'Mudah';
      } else if ($t_sukar <= 1) {
        $kriteriaTK = 'Sangat Mudah';
      }
      if ($d_beda >= 0.41) {
        $kriteriaDP = 'Baik';
      } else if ($d_beda >= 0.31) {
        $kriteriaDP = 'Diterima dan Diperbaiki';
      } else if ($d_beda >= 0.21) {
        $kriteriaDP = 'Diperbaiki';
      } else if ($d_beda < 0.21) {
        $kriteriaDP = 'Ditolak';
      }
      // array_push($data_jmlJwb, [
      //   'kriteria' => "$kriteriaTK, $kriteriaDP",
      //   'tingkat_kesukaran' => $t_sukar,
      //   'daya_pembeda' => $d_beda
      // ]);
      // array_push($data_jmlJwb, $distract);
      // array_push($data_jwb, ["no_$j" => $data_jmlJwb]);
      // $data_jmlJwb['tingkat_kesukaran'] = $t_sukar;
      // $data_jmlJwb['daya_pembeda'] = $d_beda;
      $kriteria =  [
        'id_soal' => $id_soal,
        'id_pg' => $data_jwb['id_pg'],
        'ket_soal' => "$kriteriaTK, $kriteriaDP",
        'tingkat_kesukaran' => $t_sukar,
        'daya_pembeda' => $d_beda,
        'no_soal' => "no_$j"
      ];
      $hasil[$j] = $data_jmlJwb + $distract + $kriteria;
    }
    return $hasil; // hapus
    // tambahkan id_soal pada kriteria
    // cek lagi returnnya
    // return $this->db->insert('tb_analis_soalpg', $hasil);
  }
}
