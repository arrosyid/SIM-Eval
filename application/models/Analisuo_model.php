<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisuo_model extends CI_Model
{
  // mengambil semua Analisuo
  public function getAllAnalisuo()
  {
    return $this->db->get('tb_analis_soaluo')->result_array();
  }

  // mengambil data Analisuo berdasarkan tipe id
  public function getAnalisuoByType($type, $id)
  {
    // berdasarkan idAnalisuo
    if ($type == 'id_analisuo') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_analisuo' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_uraian
    if ($type == 'id_uraian') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_uraian' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }
    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_analis_soaluo.*, tb_soal.*, tb_dist_jwbpg.*')
        ->from('tb_analis_soaluo')
        ->where(['id_soal' => $id])
        ->join('tb_soal.id_soal = tb_analis_soaluo.id_soal, tb_analis_soaluo.id_uraian = tb_dist_jwbpg.id_uraian');
      return $this->db->get()->row_array();
    }
  }

  // update Analisuo dari id
  public function upadateAnalisuoById($idAnalisuo, $data)
  {
    return $this->db->update('tb_analis_soaluo', $data, ['id_analisuo' => $idAnalisuo]);
  }

  // delete Analisuo
  public function deleteAnalisuoByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_analisuo')
      return $this->db->delete('tb_analis_soaluo', ['id_analisuo' => $id]);

    // bersasarkan id uraian
    if ($type == 'id_uraian')
      return $this->db->delete('tb_analis_soaluo', ['id_uraian' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_analis_soaluo', ['id_soal' => $id]);
  }

  public function analisButirSoalUO($id_soal)
  {
    // yang diambil => id_soal, id kelas
    $uraian = $this->db->get_where('tb_dist_jwbuo', ['id_soal' => $id_soal])->result_array();
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_soal['id_kelas']])->row_array();

    // fungsi for sudah berhasil dan menampilkan jumlah jawaban persoal
    for ($j = 1; $j <= $data_soal['jml_soal']; $j++) {
      // for ($j = 0; $j < $countSoal; $j++) {
      $analis_uraian = [
        'rerata_skor' => 0,
        'rerata_skorAts' => 0,
        'rerata_skorBwh' => 0,
      ];
      $rerata = 0;
      for ($i = 0; $i < $data_kelas['jml_siswa']; $i++) {
        $rerata += $uraian[$i][$j];
      }
      $analis_uraian['rerata_skor'] = round($rerata / $data_soal['skor_max'], 2);
      $t_sukar = round($analis_uraian['rerata_skor'] / $data_kelas['jml_siswa'], 2);
      $d_beda = round(($analis_uraian['rerata_skorAts'] - $analis_uraian['rerata_skorBwh']) / $data_kelas['jml_siswa'], 2);

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
      // array_push($analis_uraian, [
      //   'kriteria' => "$kriteriaTK, $kriteriaDP",
      //   'tingkat_kesukaran' => $t_sukar,
      //   'daya_pembeda' => $d_beda
      // ]);
      // array_push($data_jwb, ["no_$j" => $analis_uraian]);
      // $analis_uraian['tingkat_kesukaran'] = $t_sukar;
      // $analis_uraian['daya_pembeda'] = $d_beda;
      $kriteria =  [
        'ket_soal' => "$kriteriaTK, $kriteriaDP",
        'tingkat_kesukaran' => $t_sukar,
        'daya_pembeda' => $d_beda,
        'no_soal' => "no_$j"
      ];
      $hasil[$j] = $analis_uraian + $kriteria;
    }
    return $hasil; // hapus
    // tambahkan id_soal pada kriteria
    // cek lagi returnnya
    // return $this->db->insert('tb_analis_soaluo', $hasil);
  }
}
