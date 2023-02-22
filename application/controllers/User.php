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

			$data_pendaftaran = array(
				"id_seminar" => $this->input->post('id_seminar'),
				"user_id" => ($this->session->userdata('user_data'))->user_id,
				"tanggal_pendaftaran" => date('d-m-Y')
			);

			$data_peserta = array(
				"user_id" => ($this->session->userdata('user_data'))->user_id,
				"nama" => $this->input->post('nama'),
				"nim" => $this->input->post('nim'),
				"semester" => $this->input->post('semester'),
				"prodi" => $this->input->post('prodi'),
				"kampus" => $this->input->post('kampus'),
				"email" => $this->input->post('email'),
				"no_tlp" => $this->input->post('no_tlp'),
			);

			$pendaftaran = new Model_pendaftaran;
			$peserta = new Model_peserta;

			$pendaftaran->save($data_pendaftaran);
			$peserta->save($data_peserta);
			var_dump($data_pendaftaran);
			echo "<br>";
			var_dump($data_peserta);
		}
	}
}
