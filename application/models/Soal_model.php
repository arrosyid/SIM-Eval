<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{
  // mengambil semua soal
  public function getAllSoal()
  {
    $this->db->select('tb_soal.*, tb_ujian.*')
      ->from('tb_soal')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data soal berdasarkan tipe id
  public function getSoalByType($type, $id)
  {
    // berdasarkan idsoal
    if ($type == 'id_soal') {
      $this->db->select('tb_soal.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['id_soal' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_soal.*, tb_ujian.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian')->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian dan soal pilihan ganda
    if ($type == 'id_ujian_pg') {
      $this->db->select('tb_soal.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->where(['tb_soal.jenis_soal' => 'PILIHAN GANDA'])
        ->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian dan soal uraian
    if ($type == 'id_ujian_uo') {
      $this->db->select('tb_soal.*')
        ->from('tb_soal')
        ->where(['tb_soal.id_ujian' => $id])
        ->where(['tb_soal.jenis_soal' => 'URAIAN'])
        ->order_by('nomor_soal', 'ASC');
      return $this->db->get()->result_array();
    }
  }

  // update soal dari id
  public function upadateSoalById($idSoal, $data)
  {
    return $this->db->update('tb_soal', $data, ['id_soal' => $idSoal]);
  }

  // delete soal
  public function deleteSoalById($id)
  {
    return $this->db->delete('tb_soal', ['id_soal' => $id]);
  }
}

// // data subtesting
// public function coba()
// {
//     $pg = [
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 1],
//       ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 2],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 3],
//       ['kelompok' => 'ATS', 'jml_skor' => 6, 'nilai' => 60, 'id_siswa' => 4],
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 5],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 6],
//       ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 7],
//       ['kelompok' => 'ATS', 'jml_skor' => 5, 'nilai' => 50, 'id_siswa' => 8],
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 9],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 10],
//     ];
//     $uraian = [
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 1],
//       ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 2],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 3],
//       ['kelompok' => 'ATS', 'jml_skor' => 6, 'nilai' => 60, 'id_siswa' => 4],
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 5],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 6],
//       ['kelompok' => 'BWH', 'jml_skor' => 1, 'nilai' => 10, 'id_siswa' => 7],
//       ['kelompok' => 'ATS', 'jml_skor' => 5, 'nilai' => 50, 'id_siswa' => 8],
//       ['kelompok' => 'BWH', 'jml_skor' => 3, 'nilai' => 30, 'id_siswa' => 9],
//       ['kelompok' => 'BWH', 'jml_skor' => 2, 'nilai' => 20, 'id_siswa' => 10],
//     ];
//     $data_kelas = [
//       'jml_siswa' => 10,
//       'jml_kelAtsBwh' => 0,
//       'jml_kelTgh' => 0,
//     ];
//     $data_kelas['jml_kelAtsBwh'] = (int) round((30 / 100) * $data_kelas['jml_siswa']);
//     $data_kelas['jml_kelTengah'] = $data_kelas['jml_siswa'] - ($data_kelas['jml_kelAtsBwh'] * 2);

//     $data_ujian = [
//       'skor_max' => 20,
//       'skor_max_pg' => 10,
//       'skor_max_uraian' => 10,
//       'kkm' => 75,
//     ];
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

    // $tipe_soal = 'URAIAN';
    // $data_kelas = [
    //   'jml_siswa' => 10,
    //   'jml_kelAtsBwh' => 0,
    //   'jml_kelTgh' => 0,
    // ];
    // $data_kelas['jml_kelAtsBwh'] = (int) round((30 / 100) * $data_kelas['jml_siswa']);
    // $data_kelas['jml_kelTengah'] = $data_kelas['jml_siswa'] - ($data_kelas['jml_kelAtsBwh'] * 2);

    // $data_ujian = [
    //   'id_ujian' => 1,
    //   'id_kelas' => 1,
    //   'id_pelajaran' => 1,
    //   'jenis_ujian' => 'PAS',
    //   'jml_soal_ujian' => 10,
    //   'jml_soalpg' => 9,
    //   'jml_soaluo' => 5,
    //   'skor_max' => 20,
    //   'skor_maxpg' => 10,
    //   'skor_maxuo' => 10,
    //   'kkm' => 75,
    //   'kd' => '3.2',
    // ];

    // $data_jwb = [
    //   // [
    //   //   'id_jawab' => 1,
    //   //   'id_siswa' => 1,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A',
    //   // ],
    //   // [
    //   //   'id_jawab' => 2,
    //   //   'id_siswa' => 2,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'D', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 3,
    //   //   'id_siswa' => 3,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 4,
    //   //   'id_siswa' => 4,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A',
    //   // ],
    //   // [
    //   //   'id_jawab' => 5,
    //   //   'id_siswa' => 5,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'D', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 6,
    //   //   'id_siswa' => 6,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 7,
    //   //   'id_siswa' => 7,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A',
    //   // ],
    //   // [
    //   //   'id_jawab' => 8,
    //   //   'id_siswa' => 8,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'D', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 9,
    //   //   'id_siswa' => 9,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'C', 'D', 'A', 'C', 'B', 'C', 'A', 'C', 'B',
    //   // ],
    //   // [
    //   //   'id_jawab' => 10,
    //   //   'id_siswa' => 10,
    //   //   'id_ujian' => 1,
    //   //   'jenis_soal' => 'PILIHAN GANDA',
    //   //   'A', 'B', 'C', 'D', 'C', 'A', 'B', 'A', 'A',
    //   // ],

    //   // ini bukan kayak gini 
    //   // susunannya beda jadi 
    //   // harus manual dari guru
    //   [
    //     'id_jawab' => 1,
    //     'id_siswa' => 1,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 5, 5, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 2,
    //     'id_siswa' => 2,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     5, 10, 5, 5, 10, 5, 5, 0
    //   ],
    //   [
    //     'id_jawab' => 3,
    //     'id_siswa' => 3,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 10, 10, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 4,
    //     'id_siswa' => 4,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 5, 5, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 5,
    //     'id_siswa' => 5,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     5, 10, 5, 5, 10, 5, 5, 0
    //   ],
    //   [
    //     'id_jawab' => 6,
    //     'id_siswa' => 6,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 10, 10, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 7,
    //     'id_siswa' => 7,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 5, 5, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 8,
    //     'id_siswa' => 8,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     5, 10, 5, 5, 10, 5, 5, 0
    //   ],
    //   [
    //     'id_jawab' => 9,
    //     'id_siswa' => 9,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 10, 10, 10, 5, 10
    //   ],
    //   [
    //     'id_jawab' => 10,
    //     'id_siswa' => 10,
    //     'id_ujian' => 1,
    //     'jenis_soal' => 'URAIAN',
    //     10, 5, 10, 5, 5, 10, 5, 10
    //   ],
    // ];
    // // tidak seperti ini sebenernya
    // $kunci = [
    //   'A', 'B', 'C', 'C', 'B', 'A', 'B', 'A', 'A'
    // ];
