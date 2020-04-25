<?php

class Peoples extends CI_Controller{

  // inti dari pagination = membatasi query yang kita minta dari database (LIMIT)


  public function index(){

    $data['judul'] = 'List of Peoples';
    $this->load->model('Peoples_model', 'peoples'); // peoples disini sebagai alias untuk panggil model di bawah

    // pagination
    $this->load->library('pagination');


    // ambil data keyword
    if($this->input->post('submit')){
      // echo $this->input->post('keyword');  cek inputan
      $data['keyword'] = $this->input->post('keyword'); // data ini hanya ada ketika kita klik tombol search pertama kali
      // agar data keyword tetap ada, kita simpan ke dalam session
      $this->session->set_userdata('keyword', $data['keyword']);
    }else{
      $data['keyword'] = $this->session->userdata('keyword');
    }

    // config 
    // $config['total_rows'] = $this->peoples->countAllPeoples(); // dalam pencarian, kita tidak pake method ini

    // query pencarion
    $this->db->like('name', $data['keyword']);
    $this->db->or_like('email', $data['keyword']);
    $this->db->from('peoples');
    // ==========================
    $config['total_rows'] = $this->db->count_all_results(); // kita bisa manfaatkan ini untuk menghitung jumlah hasil pencarion dengan $data['total_rows']
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 8;

    // inisialisasi
    $this->pagination->initialize($config);

    // var_dump($config['total_rows']);die;  cek total data

    

    // ! tentang uri segment
    // http://localhost/belajarCodeigniter/ci_app/peoples/index/8
    // * pada start di $data['start'] = kita ambil segment uri ke 3

    $data['start'] = $this->uri->segment(3);
    $data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);
  

    $this->load->view('templates/header', $data);
    $this->load->view('peoples/index', $data);
    $this->load->view('templates/footer');
  }

}