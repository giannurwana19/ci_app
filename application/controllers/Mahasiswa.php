<?php

class Mahasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa_model');

  }

  // * untuk memanggil function construct konek database
  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->database();
  // }

  public function index(){

    $data['judul'] = 'Daftar Mahasiswa';
    // ambil data lewat model
    // panggil model Mahasiswa_model yang method nya getAllMahasiswa
    $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();

    $this->load->view('templates/header', $data);
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates/footer');
  }

}