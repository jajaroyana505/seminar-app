<?php
class Model_seminar extends CI_Model
{
   public function getAll()
   {
      return $this->db->get("seminar")->result_object();
   }

   public function seminar_user($user_id)
   {
      $this->db->select('*');
      $this->db->from('pendaftaran');
      $this->db->where(['pendaftaran.user_id' => $user_id, 'token_qr !=' => null]);
      $this->db->join('peserta', 'peserta.user_id = pendaftaran.user_id');
      $this->db->join('seminar', 'seminar.id = pendaftaran.id_seminar');
      return $this->db->get()->result_object();
   }
}
