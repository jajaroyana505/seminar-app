<?php

use Google\Service\DisplayVideo\ThirdPartyUrl;

class Model_pembayaran extends CI_Model
{
   public function __construct()
   {
      $this->load->model('model_htm');
      parent::__construct();
      // Set your Merchant Server Key
      \Midtrans\Config::$serverKey = 'SB-Mid-server-ZtkJDZbJTLs-rhd_vadnbh4O';
      // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
      \Midtrans\Config::$isProduction = false;
      // Set sanitization on (default)
      \Midtrans\Config::$isSanitized = true;
      // Set 3DS transaction for credit card to true
      \Midtrans\Config::$is3ds = true;
   }




   public function save()
   {
      $htm = new Model_htm;
      $data_pen = $this->db->get_where('pendaftaran', ['user_id' => ($this->session->userdata('user_data'))->user_id])->row_array();
      $data = array(
         "user_id" => ($this->session->userdata('user_data'))->user_id,
         "no_invoice" => time(),
         "nominal" => $htm->get_htm($data_pen['id_seminar'])

      );
      $data["token_snap"] = $this->buat_token_snap($data);
      $this->db->insert('pembayaran', $data);
   }
   public function update_status($id, $data)
   {
      $this->db->where('no_invoice', $id);
      $this->db->update('pembayaran', $data);
   }


   public function buat_token_snap($data)
   {
      $data_peserta = $this->db->get_where('peserta', ['user_id' => $data['user_id']])->row_array();
      $params = array(
         "transaction_details" => array(
            "order_id"     => $data['no_invoice'],
            "gross_amount" => $data['nominal']
         ),
         "detail_item" => array(),
         "customer_details" => array(
            "first_name" => $data_peserta['nama'],
         ),
         "shopeepay" => array(
            "callback_url" => "http://shopeepay.com"
         ),
         "gopay" => array(
            "enable_callback" => true,
            "callback_url" => "http://gopay.com"
         ),
         "callbacks" => array(
            "finish" => "https://demo.midtrans.com"
         ),
         "expiry" => array(
            "unit"     => "minutes",
            "duration" => 5
         )
      );

      $snapToken = \Midtrans\Snap::getSnapToken($params);
      return $snapToken;
   }

   public function getByUserId($id)
   {
      return $this->db->get_where('pembayaran', ['user_id' => $id])->row_object();
   }

   public function cek_data($data)
   {
      $result = $this->db->get_where('pembayaran', $data)->num_rows();
      if ($result == 0) {
         return false;
      } else {
         return true;
      }
   }

   public function delete($id)
   {
      $data_pem = $this->db->get_where('pembayaran', ['no_invoice' => $id])->row_object();
      $this->db->delete('pendaftaran', array('user_id' => $data_pem->user_id));
      $this->db->delete('peserta', array('user_id' => $data_pem->user_id));
      $this->db->delete('pembayaran', array('no_invoice' => $id));
   }
}
