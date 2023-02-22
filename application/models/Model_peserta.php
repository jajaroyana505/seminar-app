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
   public function save($data)
   {
      $this->db->insert('peserta', $data);
   }
   public function get_user($data)
   {
      return $this->db->get_where('user', $data)->row_object();
   }
}
