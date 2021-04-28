<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 2) {
      (new Ionauth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
  }

  public function index()
  {
    // dashboard
    $data['tittle'] = 'Dashboard';
    echo 'selamat datang guru';
  }
  public function analisis()
  {
    // read data analisis
    $data['tittle'] = 'Hasil Analisis';
  }
  public function guruSiswa()
  {
    // Read Data Guru dan Siswa
    $data['tittle'] = 'Daftar Guru dan Siswa';
  }
  public function mapel()
  {
    // Read Data Mapel
    $data['tittle'] = 'Daftar Mata Pelajaran';
  }
  public function kelas()
  {
    // Read Data Kelas
    $data['tittle'] = 'Daftar Kelas';
  }
  public function soal()
  {
    // Read & Input data soal
    $data['tittle'] = 'Daftar Soal';
  }
  public function nilai()
  {
    // Read & Input Nilai per ujian siwa
  }
  public function skor()
  {
    // Input skor soal Uraian
  }
  public function jawaban()
  {
    // Read & Input distribusi jawaban siswa dan kunci jawaban
    $data['tittle'] = 'Distribusi Jawaban';
  }
  public function myProfile()
  {
    // read profile guru
    $data['tittle'] = 'Profile Anda';
  }
  public function profileSekolah()
  {
    // read profile sekolah
    $data['tittle'] = 'Profile Sekolah';
  }
  public function editProfile()
  {
    // edit profile guru
    $data['tittle'] = 'Edit Profile Anda';
  }
}
