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
  }
  public function soal()
  {
    // Input data soal
  }
  public function nilai()
  {
    // Input Nilai per ujian siwa
  }
  public function skor()
  {
    // Input skor soal
  }
  public function jawaban()
  {
    // Input distribusi jawaban siswa
  }
  public function kunciJawaban()
  {
    // Input Kunci jawaban siswa
  }
}
