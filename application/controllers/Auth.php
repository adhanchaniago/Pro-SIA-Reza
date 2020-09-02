<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('username')) {
			redirect('profile');
		}

		$data['title'] = "Login";

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view("templates/auth-header", $data);
			$this->load->view('auth/login');
			$this->load->view("templates/auth-footer");
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {

			if ($password == $user['password']) {

				$data = [
					'username' => $user['username'],
					'id_role' => $user['id_role']
				];

				$this->session->set_userdata($data);

				if ($user['id_role'] == 1) {
					session_start();
					$_SESSION['id_role'] = 1;

					redirect('admin');
				} else if ($user['id_role'] == 2) {
					redirect('staff');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout berhasil</div>');
		redirect('auth/login');
	}
}
