<?php
class Test extends CI_Controller
{
   public function index()
   {
      $this->load->model('Model_peserta');
      $this->load->model('Model_pembayaran');
      $pembayaran = new Model_pembayaran;
      $peserta = new Model_peserta;
      // $data['user_id'] = 7441392;
      // $data['id_seminar'] = 1;
      // $peserta->generate_token_test($data);
      // $id = 1677413182;
      // $data = $pembayaran->getByOrderId($id);
      // $data2 = $this->db->get_where('peserta', ['user_id' => $data->user_id, 'id_seminar' => $data->id_seminar]);
      // var_dump($data2);
      $peserta->generate_token(1677414983);
   }
}
