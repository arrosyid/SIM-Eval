<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
      (new IonAuth)->verified_access(false);
    }
    $this->load->model('Kelas_model');
    $this->load->model('Soal_model');
    $this->load->model('Ujian_model');
    $this->load->model('Analispg_model');
    $this->load->model('Analisuo_model');
    $this->load->model('Nilai_model');
    $this->load->model('Skor_model');
    $this->load->model('Jawaban_model');
  }

  public function index()
  {
    // if ($this->Jawaban_model->upadateJawabanById($data['uo']['id_jawab'], $status)) {
    //   $this->session->set_flashdata(
    //     'message1',
    //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                       Berhasil Menganalisis Hasil siswa</div>'
    //   );
    // } else {
    //   $this->session->set_flashdata(
    //     'message1',
    //     '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                       Gagal Menganalisis Hasil siswa </div>'
    //   );
    // }
  }

  // koreksi otomatis
  public function hitungSkor($tipe_soal, $id_ujian)
  {
    // siswa ngisi soal -> sistem nyimpen jawaban -> sistem koreksi soal(PG) -> disimpan bentuk skor
    $data_ujian = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    // untuk pilihan ganda
    if ($tipe_soal == 'PILIHAN%20GANDA' || $tipe_soal == 'pilihan%20ganda') {
      // menentukan kelompok atas tengah dan bawah
      $skor = $this->Skor_model->getSkorByType('id_ujian_pg', $id_ujian);
      $count = count($skor);
      $atas = (int) round((30 / 100) * $count);
      // menentukan kelompok atas tengah bawah
      array_multisort(array_column($skor, 'nilai'), SORT_DESC, $skor);
      if ($count != null) {
        for ($a = 0; $a < $count; $a++) {
          for ($b = 0; $b < $atas; $b++) {
            $skor[$b]['kelompok'] = 'ATS';
          }
          for ($c = ($count - 1); $c >= ($atas * 2); $c--) {
            $skor[$c]['kelompok'] = 'BWH';
          }
          if ($skor[$a]['kelompok'] == null) {
            $skor[$a]['kelompok'] = 'TGH';
          }
        }
      }
      if ($this->db->update_batch('tb_skor', $skor, 'id_skor')) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Berhasil Menghitung Skor PILIHAN GANDA Siswa</div>'
        );
        redirect('admin/distJawaban');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Gagal Menghitung Skor PILIHAN GANDA Siswa</div>'
        );
        redirect('admin/distJawaban');
      }

      // untuk uraian
    } elseif ($tipe_soal == 'URAIAN' || $tipe_soal == 'uraian') {
      $data_jwb = $this->Jawaban_model->getJawabanByType('id_ujian_uo', $id_ujian);
      $skor = $this->Skor_model->getSkorByType('id_ujian_uo', $id_ujian);
      $count = count($skor);
      $atas = (int) round((30 / 100) * $count);

      if ($count != null) {
        foreach ($skor as $S => $val) {
          $nilai = [
            'id_skor' => $val['id_skor'],
            'id_ujian' => $val['id_ujian'],
            'id_siswa' => $val['id_siswa'],
            'jml_skor' => 0,
            'nilai' => 0,
            'kelompok' => null,
          ];
          for ($i = 0; $i < $data_ujian['jml_soaluo']; $i++) {
            $nilai['jml_skor'] += $val['no_' . $i + 1];
          }
          $nilai['nilai'] = (int) round(($nilai['jml_skor'] / $data_ujian['skor_maxuo']) * 100);
          $skor[$S] = $nilai;
        }
        // menentukan kelompok atas tengah dan bawah
        array_multisort(array_column($skor, 'nilai'), SORT_DESC, $skor);

        // menentukan kelompok atas tengah bawah
        foreach ($skor as $S => $val) {
          for ($b = 0; $b < $atas; $b++) {
            $skor[$b]['kelompok'] = 'ATS';
          }
          for ($c = ($count - 1); $c >= ($atas * 2); $c--) {
            $skor[$c]['kelompok'] = 'BWH';
          }
          if ($skor[$S]['kelompok'] == null) {
            $skor[$S]['kelompok'] = 'TGH';
          }
        }
      }
      if ($this->db->update_batch('tb_skor', $skor, 'id_skor')) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Berhasil Menghitung Skor URAIAN Siswa</div>'
        );
        redirect('admin/distJawaban');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Gagal Menghitung Skor URAIAN Siswa</div>'
        );
        redirect('admin/distJawaban');
      }
    }
  }

  public function analisButirSoalPG($id_ujian)
  {
    $data_ujian = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    $data_jwb = $this->Jawaban_model->getJawabanByType('id_ujian_pg', $id_ujian);
    $data_kelas = $this->Kelas_model->getKelasByType('id_kelas', $data_ujian['id_kelas']);
    $data_soal = $this->Soal_model->getSoalByType('id_ujian_pg', $id_ujian);
    $data_skor = $this->Skor_model->getSkorByType('id_ujian_pg', $id_ujian);
    foreach ($data_soal as $soal => $S) {
      $kunci[$soal] = $S['kunci'];
    }
    $count = count($data_jwb);
    // var_dump($data_skor);
    // die;

    // fungsi for sudah berhasil dan menampilkan jumlah jawaban persoal
    foreach ($data_soal as $soal => $S) {
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
      foreach ($data_jwb as $jwb => $J) {
        for ($k = 'A'; $k <= 'E'; $k++) {
          if ($J['no_' . $jwb + 1] == $k) {
            if ($kunci[$soal] == "$k") {
              $data_jmlJwb['jml_jwbBenar'] += 1;
              if ($data_skor[$jwb]['kelompok'] == 'ATS') {
                $data_jmlJwb['jml_BenarAts'] += 1;
              } else if ($data_skor[$jwb]['kelompok'] == 'BWH') {
                $data_jmlJwb['jml_BenarBwh'] += 1;
              }
            }
            $data_jmlJwb["jml_jwb$k"] += 1;
          }
        }
        $distract = [
          'pengecoh_a' => round(($data_jmlJwb['jml_jwbA'] * 100 / $count), 2),
          'pengecoh_b' => round(($data_jmlJwb['jml_jwbB'] * 100 / $count), 2),
          'pengecoh_c' => round(($data_jmlJwb['jml_jwbC'] * 100 / $count), 2),
          'pengecoh_d' => round(($data_jmlJwb['jml_jwbD'] * 100 / $count), 2),
          'pengecoh_e' => round(($data_jmlJwb['jml_jwbE'] * 100 / $count), 2)
        ];
      }
      $t_sukar = round(($data_jmlJwb['jml_BenarAts'] + $data_jmlJwb['jml_BenarBwh']) / $count, 2);
      $d_beda = round(($data_jmlJwb['jml_BenarAts'] - $data_jmlJwb['jml_BenarBwh']) / $count, 2);

      // penentuan kriteria Tingkat Kesukaran
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
      // penentuan Kriteria Daya Pembeda
      if ($d_beda >= 0.41) {
        $kriteriaDP = 'Baik';
      } else if ($d_beda >= 0.31) {
        $kriteriaDP = 'Diterima dan Diperbaiki';
      } else if ($d_beda >= 0.21) {
        $kriteriaDP = 'Diperbaiki';
      } else if ($d_beda < 0.21) {
        $kriteriaDP = 'Ditolak';
      }
      $kriteria =  [
        'id_ujian' => $id_ujian,
        'ket_soal' => "$kriteriaTK, $kriteriaDP",
        'tingkat_kesukaran' => $t_sukar,
        'daya_pembeda' => $d_beda,
        'no_soal' => $soal + 1,
      ];
      $hasil[$soal] = $data_jmlJwb + $distract + $kriteria;
    }
    // var_dump($hasil);
    // die;

    if ($this->db->insert_batch('tb_analis_soalpg', $hasil)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Berhasil Menganalisis Soal PILIHAN GANDA Ujian</div>'
      );
      redirect('admin/distJawaban');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Gagal Menganalisis Soal PILIHAN GANDA Ujian </div>'
      );
      redirect('admin/distJawaban');
    }
  }

  public function analisButirSoalUO($id_ujian)
  {
    $data_ujian = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    $data_kelas = $this->Kelas_model->getKelasByType('id_kelas', $data_ujian['id_kelas']);
    $data_soal = $this->Soal_model->getSoalByType('id_ujian_uo', $id_ujian);
    $data_skor = $this->Skor_model->getSkorByType('id_ujian_uo', $id_ujian);

    foreach ($data_soal as $soal => $S) {
      $analis_uraian = [
        'id_ujian' => $S['id_ujian'],
        'rerata_skor' => 0,
        'rerata_skorAts' => 0,
        'rerata_skorBwh' => 0,
      ];
      $R = [
        'rerata' => 0,
        'rerataAts' => 0,
        'rerataBwh' => 0,
      ];
      foreach ($data_skor as $skor => $SK) {
        $R['rerata'] += $SK['jml_skor'];
        if ($SK['kelompok'] == 'ATS') {
          $R['rerataAts'] += $SK['jml_skor'];
        } else if ($SK['kelompok'] == 'BWH') {
          $R['rerataBwh'] += $SK['jml_skor'];
        }
      }
      $analis_uraian['rerata_skor'] = round($R['rerata'] / $data_ujian['skor_max_ujian'], 2);
      $analis_uraian['rerata_skorAts'] = round($R['rerataAts'] / $data_ujian['skor_max_ujian'], 2);
      $analis_uraian['rerata_skorBwh'] = round($R['rerataBwh'] / $data_ujian['skor_max_ujian'], 2);

      $t_sukar = round($analis_uraian['rerata_skor'] / $data_kelas['jml_siswa'], 2);
      $d_beda = round(($analis_uraian['rerata_skorAts'] - $analis_uraian['rerata_skorBwh']) / $data_kelas['jml_siswa'], 2);
      // menentukan kriteria Tingkat kesukaran
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
      // menentukan kriteria Daya Pembeda
      if ($d_beda >= 0.41) {
        $kriteriaDP = 'Baik';
      } else if ($d_beda >= 0.31) {
        $kriteriaDP = 'Diterima dan Diperbaiki';
      } else if ($d_beda >= 0.21) {
        $kriteriaDP = 'Diperbaiki';
      } else if ($d_beda < 0.21) {
        $kriteriaDP = 'Ditolak';
      }
      $kriteria =  [
        'ket_soal' => "$kriteriaTK, $kriteriaDP",
        'tingkat_kesukaran' => $t_sukar,
        'daya_pembeda' => $d_beda,
        'no_soal' => $soal + 1,
      ];
      $hasil[$soal] = $analis_uraian + $kriteria;
    }
    if ($this->db->insert_batch('tb_analis_soalpg', $hasil)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Berhasil Menganalisis Soal URAIAN Ujian</div>'
      );
      redirect('admin/distJawaban');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Gagal Menganalisis Soal URAIAN Ujian </div>'
      );
      redirect('admin/distJawaban');
    }
  }
  // akb 1
  // pg + uraian = skor 
  // skor/skormax*100 = nilai
  // if (nilai>kkm) = tuntas belajar; else tidak tuntas belajar
  public function analisisHasilBelajar($id_ujian)
  {
    $data_ujian = $this->Ujian_model->getUjianByType('id_ujian', $id_ujian);
    $pg = $this->Skor_model->getSkorByType('id_ujian_pg', $id_ujian);
    $uraian = $this->Skor_model->getSkorByType('id_ujian_uo', $id_ujian);

    foreach ($pg as $P => $val) {
      $analisis = [
        'id_siswa' => $val['id_siswa'],
        'id_ujian' => $val['id_ujian'],
        'jml_skor_ujian' => 0,
        'nilai_ujian' => 0,
        'tuntas_belajar' => 0,
        'tindak_lanjut' => null,
        'jenis_tugas' => null,
        'jenis_tindak_lanjut' => null,
        'kelompok' => null,
        'ranking' => 0,
      ];
      // jumlah skor pilihan ganda + uraian
      $data_skor[$P]['pg'] = $val;
      foreach ($uraian as $U => $key) {
        if ($val['id_siswa'] == $uraian[$U]['id_siswa']) {
          $data_skor[$P]['uraian'] = $key;
          $analisis['jml_skor_ujian'] = $val['jml_skor'] + $key['jml_skor'];
        }
      }

      $analisis['nilai_ujian'] = (int) round(($analisis['jml_skor_ujian'] / $data_ujian['skor_max_ujian']) * 100);
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
      $hasil[$P] = $analisis;
    }

    array_multisort(array_column($hasil, 'nilai_ujian'), SORT_DESC, $hasil);
    // perankingan dan penentuan kelompok atas bawah
    $count = count($pg);
    $atas = (int) round((30 / 100) * $count);
    foreach ($hasil as $h => $value) {
      $hasil[$h]['ranking'] = $h + 1;
      for ($j = 0; $j < $atas; $j++) {
        $hasil[$j]['kelompok'] = 'ATS';
      }
      for ($k = ($count - 1); $k >= ($atas * 2); $k--) {
        $hasil[$k]['kelompok'] = 'BWH';
      }
      if ($hasil[$h]['kelompok'] == null) {
        $hasil[$h]['kelompok'] = 'TGH';
      }
    }
    if ($this->db->insert_batch('tb_dist_nilai', $hasil)) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Berhasil Menganalisis Soal URAIAN Ujian</div>'
      );
      redirect('admin/nilai');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Gagal Menganalisis Soal URAIAN Ujian </div>'
      );
      redirect('admin/nilai');
    }
  }
}
