<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar extends CI_Controller
{
   private $seminar;
   public function __construct()
   {
      parent::__construct();
      $this->load->model('model_seminar');

      $this->seminar = new Model_seminar;
   }

   public function index()
   {
      $data = array(
         "data_seminar" => $this->seminar->getAll()
      );
      $this->load->view('template/header');
      $this->load->view('template/navbar');
      $this->load->view('seminar/index', $data);
      $this->load->view('template/footer');
   }
   public function daftar()
   {
      if (!$this->session->userdata('user_data')) {
         redirect('auth');
      }




      echo "halaman daftar";
   }
}
