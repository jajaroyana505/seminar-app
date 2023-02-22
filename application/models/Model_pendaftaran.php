<?php

class Model_pendaftaran extends CI_Model
{
   public function save($data)
   {
      $this->db->insert('pendaftaran', $data);
   }
}
