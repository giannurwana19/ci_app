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
    // var_dump(base_url());
    // echo "<br>";
    // var_dump(site_url());
    $data['judul'] = 'Daftar Mahasiswa';
    // ambil data lewat model
    $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa(); // panggil model Mahasiswa_model yang method nya getAllMahasiswa

    // tombol pencarian
    if($this->input->post('keyword')){
      $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
    }

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
      $this->Mahasiswa_model->tambahDataMahasiswa(); // ambil datanya, kita akan jalankan fungsi pada model
      $this->session->set_flashdata('flash', 'Ditambahkan');  // set session / flash data (pesan sukses)
      redirect('mahasiswa');
    }
  }

  public function hapus($id){
    $this->Mahasiswa_model->hapusDataMahasiswa($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('mahasiswa');
  }

  public function detail($id){
    $data['judul'] = 'Detail Data Mahasiswa';
    $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('mahasiswa/detail', $data);
    $this->load->view('templates/footer');
  }

  public function ubah($id){

    $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
    $data['judul'] = 'Form Ubah data mahasiswa';
    $data['jurusan'] = ['Sistem Informasi','Teknik Informatika','Kimia Murni', 'Teknik Keuangan', 'Teknik Transportasi Darat', 'Teknik Mesin', 'Teknik Elektro'];
    
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('mahasiswa/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      // echo "berhasil";
      $this->Mahasiswa_model->ubahDataMahasiswa(); // ambil datanya, kita akan jalankan fungsi pada model
      $this->session->set_flashdata('flash', 'Diubah'); // set session / flash data (pesan sukses)
      redirect('mahasiswa');
    }
  }

}