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
      $this->db->insert('pendaftaran', $data);
   }
}
