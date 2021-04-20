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
  }
  public function sekolah()
  {
    // Input data sekolah
  }
  public function guru()
  {
    // Input data guru
    //  dapat otomatis menambah user baru dengan nip guru dan password default
  }
  public function siswa()
  {
    // Input data siswa
  }
  public function kelas()
  {
    // Input data kelas
  }
  public function mataPelajaran()
  {
    // Input data mata pelajaran
  }
}
