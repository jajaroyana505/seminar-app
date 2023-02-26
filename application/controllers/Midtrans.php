<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Midtrans extends CI_Controller
{
   private $pembayaran;
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

      $this->load->model('model_pembayaran');
      $this->pembayaran = new Model_pembayaran;
   }
   public function notification()
   {


      try {
         $notif = new \Midtrans\Notification();
      } catch (\Exception $e) {
         exit($e->getMessage());
      }

      $notif = $notif->getResponse();
      $transaction = $notif->transaction_status;
      $type = $notif->payment_type;
      $order_id = $notif->order_id;
      $data['status'] = $transaction;

      if ($transaction == 'settlement') {
         // TODO set payment status in merchant's database to 'Settlement'
         $this->pembayaran->update_status($order_id, $data);
      } else if ($transaction == 'pending') {
         // TODO set payment status in merchant's database to 'Pending'
         $this->pembayaran->update_status($order_id, $data);
      } else if ($transaction == 'expire') {
         // TODO set payment status in merchant's database to 'expire'
         $this->pembayaran->delete($order_id);
      } else if ($transaction == 'cancel') {
         // TODO set payment status in merchant's database to 'Denied'
         echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
      }
   }
}
