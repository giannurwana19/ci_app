<?php

class Mahasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa_model');
    $this->load->library('form_validation');

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

  public function tambah(){
    $data['judul'] = 'Form Tambah data mahasiswa';
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('mahasiswa/tambah');
      $this->load->view('templates/footer');
    }else{
      // echo "berhasil";
      // ambil datanya, kita akan jalankan fungsi pada model
      $this->Mahasiswa_model->tambahDataMahasiswa();
      // set session / flash data (pesan sukses)
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('mahasiswa');
    }
  }

  public function hapus($id){
    $this->Mahasiswa_model->hapusDataMahasiswa($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('mahasiswa');
  }

}