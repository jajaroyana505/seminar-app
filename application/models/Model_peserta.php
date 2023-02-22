<?php

class Model_peserta extends CI_Model
{
   public function rules()
   {
      return  [
         [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
         ],
         [
            'field' => 'nim',
            'label' => 'NIM',
            'rules' => 'required|max_length[8]'
         ],
         [
            'field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required'
         ],
         [
            'field' => 'prodi',
            'label' => 'Prodi',
            'rules' => 'required'
         ],
         [
            'field' => 'kampus',
            'label' => 'Kampus',
            'rules' => 'required'
         ],
         [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
         ],
         [
            'field' => 'no_tlp',
            'label' => 'No. Telepon',
            'rules' => 'required'
         ],

      ];
   }
   public function save()
   {
      $data = array(
         "user_id" => ($this->session->userdata('user_data'))->user_id,
         "nama" => $this->input->post('nama'),
         "nim" => $this->input->post('nim'),
         "semester" => $this->input->post('semester'),
         "prodi" => $this->input->post('prodi'),
         "kampus" => $this->input->post('kampus'),
         "email" => $this->input->post('email'),
         "no_tlp" => $this->input->post('no_tlp'),
      );
      $this->db->insert('peserta', $data);
   }
   public function get_user($data)
   {
      return $this->db->get_where('user', $data)->row_object();
   }
}
