<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uraian_model extends CI_Model
{
  // mengambil semua Uraian
  public function getAllUraian()
  {
    $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
      ->from('tb_dist_jwbuo')
      ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
    return $this->db->get('tb_dist_jwbuo')->result_array();
  }

  // mengambil data Uraian berdasarkan tipe id
  public function getUraianByType($type, $id)
  {
    // berdasarkan idUraian
    if ($type == 'id_uraian') {
      $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
        ->from('tb_dist_jwbuo')
        ->where(['id_uraian' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_soal
    if ($type == 'id_soal') {
      $this->db->select('tb_dist_jwbuo.*, tb_soal.*')
        ->from('tb_dist_jwbuo')
        ->where(['tb_soal.id_soal' => $id])
        ->join('tb_soal', 'tb_soal.id_soal = tb_dist_jwbuo.id_soal');
      return $this->db->get()->result_array();
    }
  }

  // update Uraian dari id
  public function upadateUraianById($idUraian, $data)
  {
    return $this->db->update('tb_dist_jwbuo', $data, ['id_uraian' => $idUraian]);
  }

  // delete Uraian
  public function deleteUraianByType($type, $id)
  {
    // berdasarkan id pilhan ganda
    if ($type == 'id_uraian')
      return $this->db->delete('tb_dist_jwbuo', ['id_uraian' => $id]);

    // bersasarkan id soal
    if ($type == 'id_soal')
      return $this->db->delete('tb_dist_jwbuo', ['id_soal' => $id]);
  }

  // fungsi Sudah dapat dipakai
  public function scoreSoalUO($id_soal)
  {
    $uraian = $this->db->get_where('tb_dist_jwbou', ['id_soal' => $id_soal] && ['kunci' => 0])->result_array();
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal]);
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_soal['id_kelas']])->row_array();

    for ($i = 0; $i < $data_kelas['jml_siswa']; $i++) {
      $nilai = [
        'jml_skor' => 0,
        'nilai' => 0,
        'id_uraian' => $uraian[$i]['id_uraian'],
        'id_siswa' => $uraian[$i]['id_siswa']
      ];
      // $uraian[$i]['jml_skor'] = 0;
      for ($j = 0; $j < $data_soal['jml_soal']; $j++) {
        $nilai['jml_skor'] += $uraian[$i][$j];
      }
      $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_soal['skor_max']) * 100);
      $skor[$i] = $nilai;
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

  // fungsi dapat dipakai
  // menentukan kelompok atas, bawah dan tengah
  public function updateKelompok($id_soal)
  {
    // yang diambil => id_pg, id_score, data
    $uraian = $this->db->get_where('tb_dist_jwbuo', ['id_soal' => $id_soal])->result_array();
    $data_soal = $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_soal['id_kelas']])->row_array();

    // diurutkan berdasarkan hasil nilai
    array_multisort(array_column($uraian, 'nilai'), SORT_DESC, $uraian);

    for ($i = 0; $i < $data_soal['jml_siswa']; $i++) {
      $uraian[$i]['kelompok'] = null;
      for ($j = 0; $j < $data_kelas['jml_kelAtsBwh']; $j++) {
        $uraian[$j]['kelompok'] = 'ATS';
      }
      for ($k = $data_soal['jml_siswa']; $k > $data_kelas['jml_kelTengah']; $k--) {
        $uraian[$k]['kelompok'] = 'BWH';
      }
      if ($uraian[$i]['kelompok'] == null) {
        $uraian[$i]['kelompok'] = 'TGH';
      }
    }
    return $uraian; // dihapus
    // cek lagi returnnya ke database
    // return $this->db->update('tb_dist_nilai', $uraian, ['id_siswa' => $uraian['id_siswa']]);
  }

  // // data subtesting
  // public function nilai()
  // {
  //   $uraian = [
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 5, 5, 10, 5, 10
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       5, 10, 5, 5, 10, 5, 5, 0
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 10, 10, 10, 5, 10
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 5, 5, 10, 5, 10
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       5, 10, 5, 5, 10, 5, 5, 0
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 10, 10, 10, 5, 10
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 5, 5, 10, 5, 10
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       5, 10, 5, 5, 10, 5, 5, 0
  //     ],
  //     [
  //       'id_uraian' => 1,
  //       'id_siswa' => 2,
  //       'id_soal' => 1,
  //       'kelompok' => 'BWH',
  //       10, 5, 10, 10, 10, 10, 5, 10
  //     ],
  //   ];
  // }

}
