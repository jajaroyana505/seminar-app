<?php
class Model_pembayaran extends CI_Model
{
   public function __construct()
   {
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
      $data = array(
         "user_id" => ($this->session->userdata('user_data'))->user_id,
         "nominal" => $htm->get_htm($this->input->post('id_seminar')),
         "no_invoice" => time(),

      );
      $data["token_snap"] = $this->buat_token_snap($data);
      $this->db->insert('pembayaran', $data);
   }


   public function buat_token_snap($data)
   {

      $params = array(
         "transaction_details" => array(
            "order_id"     => $data['no_invoice'],
            "gross_amount" => $data['nominal'],
         ),
         "detail_item" => array(),
         "customer_details" => array(
            "first_name" => $this->input->post('nama'),
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
}
