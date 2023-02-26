<?php

class Model_user extends CI_Model
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
   public function get_user($data)
   {
      return $this->db->get_where('user', $data)->row_object();
   }

   public function cek_data($data = [])
   {
      return $this->db->get_where('user', $data)->num_rows();
   }

   public function save($data = [])
   {
      $user_id = rand(100000, 9999999);
      $username = "user$user_id";
      $data['user_id'] = $user_id;
      $data['username'] = $username;
      $this->db->insert('user', $data);
   }
}
