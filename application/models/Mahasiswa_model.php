<?php

class Mahasiswa_model extends CI_Model{
  public function getAllMahasiswa(){
    // $query = $this->db->get('mahasiswa');
    // return $query->result_array();

    return $this->db->get('mahasiswa')->result_array();    // method chaining / method berantai
  }

  public function tambahDataMahasiswa(){
    $data = [
      'nama' => $this->input->post('nama', true),
      'nim' => $this->input->post('nim', true),
      'jurusan' => $this->input->post('jurusan', true),
    ];

    $this->db->insert('mahasiswa', $data);
  }

  public function hapusDataMahasiswa($id){
    // $this->db->where('id', $id);
    // cara lain
    $this->db->delete('mahasiswa', ['id' => $id]);
  }


  public function getMahasiswaById($id){
    return $this->db->get_where('mahasiswa', ['id'=>$id])->row_array();
  }

  public function ubahDataMahasiswa(){
    $data = [
      'nama' => $this->input->post('nama', true),
      'nim' => $this->input->post('nim', true),
      'jurusan' => $this->input->post('jurusan', true),
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('mahasiswa', $data);
  }

  public function cariDataMahasiswa(){
    $keyword = $this->input->post('keyword', true);
    $this->db->like('nama', $keyword); // cari data mahasiswa berdasarkan nama
    $this->db->or_like('nim',$keyword); // atau cari
    $this->db->or_like('email',$keyword);
    $this->db->or_like('jurusan',$keyword);
    return $this->db->get('mahasiswa')->result_array();
  }

}