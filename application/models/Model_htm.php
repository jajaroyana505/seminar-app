<?php
class Model_htm extends CI_Model
{
   public function get_htm($id)
   {
      $result =  $this->db->get_where('htm', ['id_seminar' => $id])->row_object();
      return $result->harga;
   }
}
