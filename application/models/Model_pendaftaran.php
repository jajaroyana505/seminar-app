<?php

class Model_pendaftaran extends CI_Model
{
   public function save()
   {
      $data = array(
         "id_seminar" => $this->input->post('id_seminar'),
         "user_id" => ($this->session->userdata('user_data'))->user_id,
         "tanggal_pendaftaran" => date('d-m-Y')
      );
      if (!$this->cek_data(['user_id' => $data['user_id']])) {
         $this->db->insert('pendaftaran', $data);
      }
   }
   public function cek_data($data)
   {
      $result = $this->db->get_where('pendaftaran', $data)->num_rows();
      if ($result == 0) {
         return false;
      } else {
         return true;
      }
   }
   public function getId_seminar()
   {
      $this->db->get_where('pendaftaran', ['id_seminar' => ($this->session->userdata('user_data'))->user_id]);
   }
}
