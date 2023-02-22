<?php

// memanggil model User
require 'Model_user.php';
class Model_login_google extends CI_Model
{
   private $google_client;
   private $model_user;
   public function __construct()
   {
      parent::__construct();

      // inisialisai model user
      $this->model_user = new Model_user;

      // inisialisasi librari google client
      $this->google_client = new Google_Client();

      // configurasi google client
      $this->google_client->setClientId('670681546793-p72cjm8pckrdap0303msokdrnpa9hbkc.apps.googleusercontent.com'); //masukkan ClientID anda 
      $this->google_client->setClientSecret('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'); //masukkan Client Secret Key anda
      $this->google_client->setRedirectUri('http://localhost/seminar_app/auth/login_google/'); //Masukkan Redirect Uri anda
      $this->google_client->addScope('email');
      $this->google_client->addScope('profile');
   }


   public function getUrl()
   {
      return $this->google_client->createAuthUrl(); //membuat url authentifikasi google
   }

   public function fetch($token_google)
   {
      $token = $this->google_client->fetchAccessTokenWithAuthCode($token_google);
      if (!isset($token["error"])) {
         $this->google_client->setAccessToken($token['access_token']);
         $google_service = new Google_Service_Oauth2($this->google_client);
         $data = $google_service->userinfo->get();
         $current_datetime = date('Y-m-d H:i:s');
         $user_data = array(
            'first_name' => $data->given_name,
            'last_name'  => $data->family_name,
            'gender' => $data->gender,
            'email' => $data->email,
            'profile_picture' => $data->picture,
            // 'updated_at' => $current_datetime
         );
         $this->save($user_data);
         return $this->model_user->get_user(['email' => $data->email]);
      }
   }

   public function save($user_data)
   {

      $result = $this->model_user->cek_data(['email' => $user_data['email']]);
      if ($result == 0) {
         $this->model_user->save($user_data);
      }
   }
}
