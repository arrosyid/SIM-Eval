<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  // task list:
  // captcha in registrasi

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 2) {
      (new Ionauth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
    $this->load->helper('captcha');
  }
  // edit fungsi untuk daftar koperasi

  public function index()
  {
  }
}
