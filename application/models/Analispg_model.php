<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analispg_model extends CI_Model
{
  // mengambil semua Analispg
  public function getAllAnalispg()
  {
    $this->db->select('tb_analis_soalpg.*, tb_ujian.*')
      ->from('tb_analis_soalpg')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_analis_soalpg.id_ujian');
    return $this->db->get('tb_analis_soalpg')->result_array();
  }

  // mengambil data Analispg berdasarkan tipe id
  public function getAnalispgByType($type, $id)
  {
    // berdasarkan idAnalispg
    if ($type == 'id_analispg') {
      $this->db->select('tb_analis_soalpg.*, tb_ujian.*')
        ->from('tb_analis_soalpg')
        ->where(['tb_analis_soalpg.id_analispg' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_analis_soalpg.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_analis_soalpg.*, tb_ujian.*')
        ->from('tb_analis_soalpg')
        ->where(['tb_analis_soalpg.id_ujian' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_analis_soalpg.id_ujian');
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

    // bersasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_analis_soalpg', ['id_ujian' => $id]);
  }

  public function analisButirSoalPg($id_ujian)
  {
    // yang diambil => id_soal, id kelas
    $data_ujian = $this->db->get_where('tb_ujian', ['id_ujian' => $id_ujian])->row_array();
    $data_jwb = $this->db->select('tb_soal.*, tb_dist_jwb.*')
      ->from('tb_soal')
      ->where(['id_ujian' => $id_ujian] && ['jenis_soal' => 'PILIHAN GANDA'])
      ->join('tb_dist_jwb', 'tb_dist_jwb.id_jawab = tb_soal.id_ujian')->get()->result_array();
    // $soal = $this->db->get_where('tb_soal', ['id_ujian' => $id_ujian])->result_array();
    // foreach ($soal as $S => $value) {
    //   $data_jwb[$S] = $this->db->get_where('tb_dist_jwb', ['id_jawab' => $value['id_jawab']])->row_array();
    // }
    // $data_jwb = $this->db->get_where('tb_dist_jwb', ['id_ujian' => $id_ujian] && ['kunci' => 0])->result_array();
    $kunci = $this->db->get_where('tb_dist_jwb', ['id_ujian' => $id_ujian] && ['kunci' => 1])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_ujian['id_kelas']])->row_array();

    // [0] => {id_soal, id_siswa, id_jawab, id_ujian, jenis_soal, kelompok, jml_skor, nilai}

    // fungsi for sudah berhasil dan menampilkan jumlah jawaban persoal
    for ($j = 1; $j <= $data_ujian['jml_soalpg']; $j++) {
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
        'id_ujian' => $id_ujian,
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
