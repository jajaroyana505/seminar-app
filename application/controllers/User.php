<?php

use Google\Service\CloudSearch\History;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $peserta;
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('model_peserta');
		$this->load->model('model_pendaftaran');
		$this->load->model('model_htm');
		$this->load->model('model_pembayaran');

		$this->peserta = new Model_peserta;
	}

	public function index()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$this->load->view('profile', $data);
	}

	public function daftar_seminar()
	{
		$rules = $this->peserta->rules();
		$this->form_validation->set_rules($rules);
		if (!$this->form_validation->run()) {
			$this->load->view('template/header');
			$this->load->view('seminar/daftar');
			$this->load->view('template/footer');
		} else {
			$pendaftaran = new Model_pendaftaran;
			$pembayaran = new Model_pembayaran;
			$peserta = new Model_peserta;
			$pendaftaran->save();
			$pembayaran->save();
			$peserta->save();


			redirect(base_url('user/bayar'));
		}
	}

	public function bayar()
	{
		echo ($this->session->userdata('user_data'))->user_id;
		$pembayaran = new Model_pembayaran;
		$data = array(
			"pembayaran" => $pembayaran->getByUserId(($this->session->userdata('user_data'))->user_id)
		);
		var_dump($data);

		$this->load->view('seminar/bayar', $data);
	}
}
