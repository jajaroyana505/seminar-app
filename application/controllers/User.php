<?php

use Google\Service\CloudSearch\History;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $peserta;
	private $pendaftaran;
	private $pembayaran;
	private $htm;

	private $user_id;
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
		$this->pendaftaran = new Model_pendaftaran;
		$this->pembayaran = new Model_pembayaran;
		$this->htm = new Model_htm;


		$this->user_id = ($this->session->userdata('user_data'))->user_id;
	}

	public function index()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$data['data_seminar'] = null;
		$this->load->view('template/header');
		$this->load->view('template/navbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('template/footer');
	}

	public function daftar_seminar()
	{
		$id_seminar = $this->uri->segment('3');
		// cek apakan user sudah terdaftar atau belum diseminar tersebut
		if ($this->pendaftaran->cek_data(['user_id' => $this->user_id, 'id_seminar' => $id_seminar])) {
			redirect(base_url('user/bayar'));
		}


		$rules = $this->peserta->rules();
		$this->form_validation->set_rules($rules);
		if (!$this->form_validation->run()) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('seminar/daftar');
			$this->load->view('template/footer');
		} else {
			$this->pendaftaran->save();
			$this->peserta->save();
			redirect(base_url('user/bayar'));
		}
	}

	public function bayar()
	{
		// cek apakan user sudah terdaftar atau belum
		if (!$this->pendaftaran->cek_data(['user_id' => $this->user_id])) {
			redirect(base_url('seminar'));
		}

		if (!$this->pembayaran->cek_data(['user_id' =>  $this->user_id])) {
			$this->pembayaran->save();
		};
		$data = array(
			"pembayaran" => $this->pembayaran->getByUserId($this->user_id)
		);
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('seminar/bayar', $data);
		$this->load->view('template/footer', $data);
	}
}
