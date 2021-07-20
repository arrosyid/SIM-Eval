<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
  // mengambil semua Nilai
  public function getAllNilai()
  {
    $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
      ->from('tb_dist_nilai')
      ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
      ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
    return $this->db->get()->result_array();
  }

  // mengambil data Nilai berdasarkan tipe id
  public function getNilaiByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_skor' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_ujian') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_ujian' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
    if ($type == 'id_siswa') {
      $this->db->select('tb_dist_nilai.*, tb_ujian.*, tb_siswa.*')
        ->from('tb_dist_nilai')
        ->where(['tb_dist_nilai.id_siswa' => $id])
        ->join('tb_ujian', 'tb_dist_nilai.id_ujian = tb_ujian.id_ujian')
        ->join('tb_siswa', 'tb_dist_nilai.id_siswa = tb_siswa.id_siswa');
      return $this->db->get()->row_array();
    }
  }

  // update Skor dari id
  public function upadateNilaiById($idSkor, $data)
  {
    return $this->db->update('tb_dist_nilai', $data, ['id_skor' => $idSkor]);
  }

  // delete Skor
  public function deleteNilaiByType($type, $id)
  {
    // berdasarkan id Skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_dist_nilai', ['id_skor' => $id]);

    // berdasarkan id ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_dist_nilai', ['id_ujian' => $id]);

    // berdasarkan id siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_dist_nilai', ['id_siswa' => $id]);
  }

  // akb 1
  // pg + uraian = skor 
  // skor/skormax*100 = nilai
  // if (nilai>kkm) = tuntas belajar; else tidak tuntas belajar
  public function analisisHasilBelajar($id_ujian)
  {

    $data_ujian = $this->db->get_where('tb_ujian', ['id_ujian' => $id_ujian])->row_array();
    $pg = $this->db->get_where('tb_soal', ['id_ujian' => $id_ujian] && ['jenis_soal' => 'PILIHAN GANDA'])->result_array();
    $uraian = $this->db->get_where('tb_soal', ['id_ujian' => $id_ujian] && ['jenis_soal' => 'URAIAN'])->result_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_ujian['id_kelas']])->row_array();

    // $pg = [
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 1],
    //   ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 2],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 3],
    //   ['kelompok' => 'ATS', 'jml_skor' => 6, 'nilai' => 60, 'id_siswa' => 4],
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 5],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 6],
    //   ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 7],
    //   ['kelompok' => 'ATS', 'jml_skor' => 5, 'nilai' => 50, 'id_siswa' => 8],
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 9],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 10],
    // ];
    // $uraian = [
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 1],
    //   ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 2],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 3],
    //   ['kelompok' => 'ATS', 'jml_skor' => 6, 'nilai' => 60, 'id_siswa' => 4],
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 5],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 6],
    //   ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 7],
    //   ['kelompok' => 'ATS', 'jml_skor' => 5, 'nilai' => 50, 'id_siswa' => 8],
    //   ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 9],
    //   ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 10],
    // ];
    // $data_kelas = [
    //   'jml_siswa' => 10,
    //   'jml_kelAtsBwh' => 0,
    //   'jml_kelTgh' => 0,
    // ];
    // $data_kelas['jml_kelAtsBwh'] = (int) round((30 / 100) * $data_kelas['jml_siswa']);
    // $data_kelas['jml_kelTengah'] = $data_kelas['jml_siswa'] - ($data_kelas['jml_kelAtsBwh'] * 2);

    // $data_ujian = [
    //   'skor_max' => 20,
    //   'skor_max_pg' => 10,
    //   'skor_max_uraian' => 10,
    //   'kkm' => 75,
    // ];

    for ($i = 0; $i < $data_kelas['jml_siswa']; $i++) {
      $analisis = [
        'id_siswa' => $pg[$i]['id_siswa'],
        'id_ujian' => $pg[$i]['id_ujian'],
        'jml_skor_ujian' => 0,
        'nilai_ujian' => 0,
        'tuntas_belajar' => 0,
        'tindak_lanjut' => null,
        'jenis_tugas' => null,
        'jenis_tindak_lanjut' => null,
        'kelompok' => null,
        'ranking' => 0,
      ];
      $analisis['jml_skor_ujian'] = $pg[$i]['jml_skor'] + $uraian[$i]['jml_skor'];
      $analisis['nilai_ujian'] = (int) round(($analisis['jml_skor_ujian'] / $data_ujian['skor_max']) * 100);
      // ketuntasan belajar
      if ($analisis['nilai_ujian'] > $data_ujian['kkm']) {
        // tuntas belajar
        $analisis['tuntas_belajar'] = 1;
      } else {
        // tidak tuntas belajar
        $analisis['tuntas_belajar'] = 0;
      }
      // Program pengayaan dan perbaikan
      if ($analisis['nilai_ujian'] >= 91) {
        $analisis['tindak_lanjut'] = 'PK1';
      } elseif ($analisis['nilai_ujian'] >= 80) {
        $analisis['tindak_lanjut'] = 'PK2';
      } elseif ($analisis['nilai_ujian'] >= 65) {
        $analisis['tindak_lanjut'] = 'PK3';
      } elseif ($analisis['nilai_ujian'] >= 55) {
        $analisis['tindak_lanjut'] = 'PB1';
      } elseif ($analisis['nilai_ujian'] >= 40) {
        $analisis['tindak_lanjut'] = 'PB2';
      } elseif ($analisis['nilai_ujian'] < 40) {
        $analisis['tindak_lanjut'] = 'PB3';
      }
      // Jenis penugasan
      if ($analisis['nilai_ujian'] > 96) {
        $analisis['jenis_tugas'] = 'MAKSIMAL';
      } elseif ($analisis['nilai_ujian'] > 86) {
        $analisis['jenis_tugas'] = 'OPTIMAL';
      } elseif ($analisis['nilai_ujian'] > 76) {
        $analisis['jenis_tugas'] = 'MINIMAL';
      } elseif ($analisis['nilai_ujian'] > 70) {
        $analisis['jenis_tugas'] = 'TIDAK TUNTAS I';
      } elseif ($analisis['nilai_ujian'] > 0) {
        $analisis['jenis_tugas'] = 'TIDAK TUNTAS II';
      }
      // Jenis tindak lanjut
      if ($analisis['nilai_ujian'] > 95) {
        $analisis['jenis_tindak_lanjut'] = 'tutor teman sebaya';
      } elseif ($analisis['nilai_ujian'] > 85) {
        $analisis['jenis_tindak_lanjut'] = 'PR mengerjakan soal dengan tingkat kesukaran tinggi';
      } elseif ($analisis['nilai_ujian'] > 75) {
        $analisis['jenis_tindak_lanjut'] = 'mengerjakan tugas-tugas khusus';
      } elseif ($analisis['nilai_ujian'] > 40) {
        $analisis['jenis_tindak_lanjut'] = 'mengerjakan soal yang belum dijawab dengan benar';
      } elseif ($analisis['nilai_ujian'] > 0) {
        $analisis['jenis_tindak_lanjut'] = 'membuat rangkuman dan mengerjakan soal yang belum dijawab dengan benar';
      }
      $hasil[$i] = $analisis;
    }
    // ditambah pengurutan menurut nama
    foreach ($hasil as $h => $value) {
      $nilai[$h] = $value['nilai_ujian'];
    }
    array_multisort($nilai, SORT_DESC, $hasil);
    // perankingan dan penentuan kelompok atas bawah
    for ($l = 0; $l < $data_kelas['jml_siswa']; $l++) {
      $hasil[$l]['ranking'] = $l + 1;
      for ($j = 0; $j < $data_kelas['jml_kelAtsBwh']; $j++) {
        $hasil[$j]['kelompok'] = 'ATS';
      }
      for ($k = ($data_kelas['jml_siswa'] - 1); $k > $data_kelas['jml_kelTengah']; $k--) {
        $hasil[$k]['kelompok'] = 'BWH';
      }
      if ($hasil[$l]['kelompok'] == null) {
        $hasil[$l]['kelompok'] = 'TGH';
      }
    }
    // return $hasil;
    // cek lagi returnnya ke database
    return $this->db->update_batch('tb_dist_nilai', $hasil, 'id_skor');
  }

  public function daftarTuntas($id_ujian)
  {
    $data_ujian = $this->db->get_where('tb_ujian', ['id_ujian' => $id_ujian])->row_array();
    $tidak_tuntas = $this->db->get_where('tb_dist_nilai', ['id_ujian' => $id_ujian] && ['tuntas_belajar' => 'TIDAK TUNTAS'])->result_array();
    $tuntas = $this->db->get_where('tb_dist_nilai', ['id_ujian' => $id_ujian] && ['tuntas_belajar' => 'TUNTAS'])->result_array();
    $persen = [
      'tuntas' => 0,
      'tidak_tuntas' => 0,
    ];
    $persen['tidak_tuntas'] = ($data_ujian['jml_siswa'] / array_sum($tidak_tuntas)) * 100;
    $$persen['tuntas'] = ($data_ujian['jml_siswa'] / array_sum($tuntas)) * 100;

    array_push($tidak_tuntas, ['persen' => $persen]);
    return $tidak_tuntas;
  }
  // akb 2
  // echo nama siswa tidak tuntas
  // jml_siswa/jml_tuntas*100  = persentase siswa tuntas
  // jml_siswa/jml_tidakTuntas*100  = persentase siswa tidak tuntas
}
