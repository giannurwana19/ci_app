<?php

class Home extends CI_Controller{

  // ? mengirimkan data lewat url, kita beri parameter $nama dengan nilai default kosong (agar tidak error ketika tidak ada argument yang masuk)
  // * data/argument nya ditangkap oleh method, lalu kita gunakan di view nya

  public function index($nama = ''){
    $data['judul'] = 'halaman home';
    $data['nama'] = $nama;
    $this->load->view('templates/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }
}