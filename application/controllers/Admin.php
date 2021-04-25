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
    $data['title'] = 'Dashboard';
    $data['subtitle'] = 'Dashboard Admin';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    // if ($this->input->post(['search'])) {
    //   $data['resi'] =  $this->Pesanan_model->getPesananByKeyword($this->input->post('keyword'));
    // }

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function sekolah()
  {
    // Input data sekolah
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/sekolah', $data);
    $this->load->view('templates/admin_footer');
  }
  public function guru()
  {
    // Input data guru
    //  dapat otomatis menambah user baru dengan nip guru dan password default
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByusername($this->session->userdata['email']);
  
    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/sekolah', $data);
    $this->load->view('templates/admin_footer');
  }
  public function siswa()
  {
    // Input data siswa
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
  
    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/sekolah', $data);
    $this->load->view('templates/admin_footer');
  }
  public function kelas()
  {
    // Input data kelas
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
  
    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/sekolah', $data);
    $this->load->view('templates/admin_footer');
  }
  public function mataPelajaran()
  {
    // Input data mata pelajaran
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
  
    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/sekolah', $data);
    $this->load->view('templates/admin_footer');
  }
}
