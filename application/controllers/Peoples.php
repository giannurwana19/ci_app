<?php

class Peoples extends CI_Controller{

  // inti dari pagination = membatasi query yang kita minta dari database (LIMIT)


  public function index(){

    $data['judul'] = 'List of Peoples';
    $this->load->model('Peoples_model', 'peoples'); // peoples disini sebagai alias untuk panggil model di bawah

    // pagination
    $this->load->library('pagination');
    // 
    $config['base_url'] = "http://localhost/belajarCodeigniter/ci_app/peoples/index";
    $config['total_rows'] = $this->peoples->countAllPeoples();
    $config['per_page'] = 8;
    $config['num_links'] = 3;

    
    // styling
    $config['full_tag_open'] = '<nav><ul class="pagination pagination-sm justify-content-end">'; // pembuka pagination
    $config['full_tag_close'] = ' </ul></nav>'; // akhir pagination
    
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');













    // inisialisasi
    $this->pagination->initialize($config);

    // var_dump($config['total_rows']);die;  cek total data

    

    // ! tentang uri segment
    // http://localhost/belajarCodeigniter/ci_app/peoples/index/8
    // * pada start di $data['start'] = kita ambil segment uri ke 3

    $data['start'] = $this->uri->segment(3);
    $data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start']);
  

    $this->load->view('templates/header', $data);
    $this->load->view('peoples/index', $data);
    $this->load->view('templates/footer');
  }

}