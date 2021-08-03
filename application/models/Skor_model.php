<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor_model extends CI_Model
{
  // mengambil semua skor
  public function getAllSkor()
  {
    $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
      ->from('tb_skor')
      ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
      ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
    return $this->db->get()->result_array();
  }

  // mengambil data skor berdasarkan tipe id
  public function getSkorByType($type, $id)
  {
    // berdasarkan idskor
    if ($type == 'id_skor') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['id_skor' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->row_array();
    }

    // berdasarkan id_siswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['tb_siswa.id_siswa' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->result_array();
    }

    // berdasarkan id_ujian
    if ($type == 'id_ujian') {
      $this->db->select('tb_skor.*, tb_siswa.*, tb_ujian.*')
        ->from('tb_skor')
        ->where(['tb_ujian.id_ujian' => $id])
        ->join('tb_siswa', 'tb_siswa.id_siswa = tb_skor.id_siswa')
        ->join('tb_ujian', 'tb_ujian.id_ujian = tb_skor.id_ujian');
      return $this->db->get()->result_array();
    }
  }

  // update skor dari id
  public function upadateSkorById($id, $data)
  {
    return $this->db->update('tb_skor', $data, ['id_skor' => $id]);
  }

  // delete skor
  public function deleteSkorByType($type, $id)
  {
    // berdasarkan id skor
    if ($type == 'id_skor')
      return $this->db->delete('tb_skor', ['id_skor' => $id]);

    // berdasarkan id_siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_skor', ['id_siswa' => $id]);

    // berdasarkan id_ujian
    if ($type == 'id_ujian')
      return $this->db->delete('tb_skor', ['id_ujian' => $id]);
  }

  // koreksi otomatis
  public function koreksi($tipe_soal, $id_ujian)
  {
    $data_ujian = $this->db->get_where('tb_ujian', ['id_ujian' => $id_ujian])->row_array();
    $data_kelas = $this->db->get_where('tb_kelas', ['id_kelas' => $data_ujian['id_kelas']])->row_array();
    $data_jwb = $this->db->select('tb_soal.*, tb_dist_jwb.*')
      ->from('tb_soal')
      ->where(['id_ujian' => $id_ujian] && ['jenis_soal' => $tipe_soal])
      ->join('tb_dist_jwb', 'tb_dist_jwb.id_jawab = tb_soal.id_ujian')->get()->result_array();
    $data_kunci = $this->db->select('kunci, nomor_soal')->from('tb_soal')
      ->where(['id_ujian' => $id_ujian] && ['jenis_soal' => $tipe_soal])->order_by('nomor_soal', 'ASC')->get()->result_array();
    foreach ($data_kunci as $K => $value) { // sudah dapat dijalankan
      $kunci[$K] = $value['kunci'];
    }

    // siswa ngisi soal -> sistem nyimpen jawaban -> sistem koreksi soal(PG) -> disimpan bentuk skor
    // untuk pilihan ganda
    if ($tipe_soal == 'PILIHAN GANDA') {
      $skorSoal = (int) round($data_ujian['skor_maxpg'] / $data_ujian['jml_soalpg']);
      for ($j = 0; $j < $data_kelas['jml_siswa']; $j++) {
        $nilai = [
          'jml_skor' => 0,
          'nilai' => 0,
          'kelompok' => null,
          'id_ujian' => $data_jwb[$j]['id_ujian'],
          'id_siswa' => $data_jwb[$j]['id_siswa'],
        ];
        // for ($i = 1; $i <= $data_ujian['jml_soalpg']; $i++) {
        for ($i = 0; $i < $data_ujian['jml_soalpg']; $i++) {
          $nilai["no_$i"] = 0;
          if ($data_jwb[$j][$i] == $kunci[$i]) {
            $nilai["no_$i"] = $skorSoal;
            $nilai['jml_skor'] += $skorSoal;
          }
        }
        $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_ujian['skor_maxpg']) * 100);
        $skor[$j] = $nilai;
      }
      // menentukan kelompok atas tengah dan bawah
      array_multisort(array_column($skor, 'nilai'), SORT_DESC, $skor);

      for ($a = 0; $a < $data_kelas['jml_siswa']; $a++) {
        for ($b = 0; $b < $data_kelas['jml_kelAtsBwh']; $b++) {
          $skor[$b]['kelompok'] = 'ATS';
        }
        for ($c = ($data_kelas['jml_siswa'] - 1); $c > ($data_kelas['jml_kelAtsBwh'] * 2); $c--) {
          $skor[$c]['kelompok'] = 'BWH';
        }
        if ($skor[$a]['kelompok'] == null) {
          $skor[$a]['kelompok'] = 'TGH';
        }
      }
      return $skor; // hapus
      // cek lagi returnnya ke database
      // return $this->db->update_batch('tb_skor', $skor, 'id_skor');

      // untuk uraian
    } elseif ($tipe_soal == 'URAIAN') {
      for ($j = 0; $j < $data_kelas['jml_siswa']; $j++) {
        // diganti, data/nilai skor dimasukkan kedalam tabel masing2
        $nilai = [
          'id_ujian' => $data_jwb[$j]['id_ujian'],
          'id_siswa' => $data_jwb[$j]['id_siswa'],
          'jml_skor' => 0,
          'nilai' => 0,
          'kelompok' => null,
        ];
        for ($i = 0; $i < $data_ujian['jml_soaluo']; $i++) {
          // $nilai['jml_skor'] += $uraian[$j][$i];
          $nilai['jml_skor'] += (int) $data_jwb[$j][$i];
        }
        $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_ujian['skor_maxuo']) * 100);
        $skor[$j] = $nilai;
      }
      // menentukan kelompok atas tengah dan bawah
      array_multisort(array_column($skor, 'nilai'), SORT_DESC, $skor);

      for ($a = 0; $a < $data_kelas['jml_siswa']; $a++) {
        for ($b = 0; $b < $data_kelas['jml_kelAtsBwh']; $b++) {
          $skor[$b]['kelompok'] = 'ATS';
        }
        for ($c = ($data_kelas['jml_siswa'] - 1); $c > ($data_kelas['jml_kelAtsBwh'] * 2); $c--) {
          $skor[$c]['kelompok'] = 'BWH';
        }
        if ($skor[$a]['kelompok'] == null) {
          $skor[$a]['kelompok'] = 'TGH';
        }
      }
      return $skor; // hapus
      // cek lagi returnnya ke database
      // return $this->db->update_batch('tb_skor', $skor, 'id_skor');
    }
  }
}
