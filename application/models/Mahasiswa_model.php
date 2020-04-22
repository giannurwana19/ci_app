<?php

class Mahasiswa_model extends CI_Model{
  public function getAllMahasiswa(){
    // $query = $this->db->get('mahasiswa');
    // return $query->result_array();
    
    // method chaining / method berantai
    return $this->db->get('mahasiswa')->result_array();
  }
}