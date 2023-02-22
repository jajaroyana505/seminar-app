<?php 
class Model_seminar extends CI_Model
{
   public function getAll()
   {
      return $this->db->get("seminar")->result_object();
   }
}
