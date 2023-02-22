<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_google extends CI_Controller
{

   public $google_service;
   public $user_data;
   public function index()
   {
      // include_once APPPATH . "../vendor/autoload.php";
      $google_client = new Google_Client();
      $google_client->setClientId('670681546793-p72cjm8pckrdap0303msokdrnpa9hbkc.apps.googleusercontent.com'); //masukkan ClientID anda 
      $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
      $google_client->setRedirectUri('http://localhost/seminar_app/login_google/'); //Masukkan Redirect Uri anda
      $google_client->addScope('email');
      $google_client->addScope('profile');


      if (isset($_GET["code"])) {
         $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

         if (!isset($token["error"])) {

            $google_client->setAccessToken($token['access_token']);
            $this->session->set_userdata('access_token', $token['access_token']);
            $this->google_service = new Google_Service_Oauth2($google_client);
            $data = $this->google_service->userinfo->get();
            $current_datetime = date('Y-m-d H:i:s');
            $this->user_data = array(
               'first_name' => $data->given_name,
               'last_name'  => $data->family_name,
               'gender' => $data->gender,
               'email_address' => $data->email,
               'profile_picture' => $data->picture,
               'updated_at' => $current_datetime
            );

            $this->session->set_userdata('user_data', $this->user_data);
         }
      }
      $login_button = '';
      if (!$this->session->userdata('access_token')) {

         $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
         $data['login_login'] = $login_button;
         $this->load->view('google_login', $data);
      } else {
         // uncomentar kode dibawah untuk melihat data session email
         // echo json_encode($this->session->userdata('access_token'));
         echo json_encode($this->session->userdata('user_data'));
         // var_dump($this->session->userdata('user_data'));
         echo "Login success";
         // echo "<br>";
         // var_dump($this->user_data);
         // var_dump($this->google_service->userinfo->get()->familyName);
      }
   }
   public function logout()
   {
      $this->session->unset_userdata('access_token');
      $this->session->unset_userdata('user_data');
      // $this->session->destroy
      echo "Logout berhasil";
   }
}
