<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
      (new Ionauth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
  }

  public function index()
  {
    // dashboard
    echo 'selamat datang admin';
    echo '<a href="' . base_url('auth/logout') . '"> keluar </a>';
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
    // Read data soal
    $data['tittle'] = 'Daftar Soal';
  }
  public function nilai()
  {
    // Read Nilai per ujian siwa
  }
  public function skor()
  {
    // Input skor soal Uraian
  }
  public function jawaban()
  {
    // Read distribusi jawaban siswa dan kunci jawaban
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
  public function editSekolah()
  {
    // edit & Input data sekolah
  }
  public function tambahGuru()
  {
    // Input data guru
    //  dapat otomatis menambah user baru dengan nip guru dan password default
  }
  public function tambahSiswa()
  {
    // Input data siswa
  }
  public function tambahKelas()
  {
    // Input data Kelas
  }
  public function tambahMapel()
  {
    // Input data mata pelajaran
  }
}
