<?php
class Test extends CI_Controller
{
   public function index()
   {
      $this->db->select('*');
      $this->db->from('pendaftaran');
      $this->db->where(['pendaftaran.user_id' => 3378264, 'token_qr !=' => null]);
      $this->db->join('peserta', 'peserta.user_id = pendaftaran.user_id');
      $this->db->join('seminar', 'seminar.id = pendaftaran.id_seminar');
      $result = $this->db->get()->result_array();
      var_dump($result);
   }
}
