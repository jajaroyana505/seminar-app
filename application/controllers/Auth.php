<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   private $google;
   public function __construct()
   {
      parent::__construct();

      $this->load->model('Model_login_google');
      $this->google = new Model_login_google;
   }


   public function index()
   {
      // cek session user_data
      if (!$this->session->userdata('user_data')) {
         $this->login(); //jika tidak ada  panggil fungsi login
      } else {
         redirect(base_url('user')); // jika ada panggil fungsi redirect
      }
   }

   public function login()
   {
      // set data yang akan dikirimkan ke view login
      $data['url_auth_google'] = $this->google->getUrl(); //mengambil url dari google service

      // memanggil view login
      $this->load->view('login', $data);
   }

   // method yang akan diakses oleh google service
   public function login_google()
   {
      $result = $this->google->fetch($_GET['code']);
      $this->session->set_userdata('user_data', $result);
      redirect(base_url('auth'));
   }


   public function logout()
   {
      $this->session->unset_userdata('user_data');

      echo "Logout berhasil";
      redirect('auth');
   }
}
