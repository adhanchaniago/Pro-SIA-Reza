<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		sudah_login();
	}

	public function index()
	{
		redirect('profile/my_profile');

	}

	public function my_profile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		if($this->session->userdata('id_role') == 1){

			$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}

		if($this->session->userdata('id_role') == 2){

			$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		}

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('profile/my-profile', $data);
		$this->load->view('templates/footer');
	}

	public function edit_profile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		if($this->session->userdata('id_role') == 1){

			$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}

		if($this->session->userdata('id_role') == 2){

			$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('profile/edit/edit-profile', $data);
			$this->load->view('templates/footer');
		} else {

			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');

			//Cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image) {

				$config['allowed_types'] = 'gif|jpg|png';

				if($this->session->userdata('id_role') == 1) {

					$config['upload_path'] = './assets/img/profile/admin/';
				}

				if($this->session->userdata('id_role') == 2) {

					$config['upload_path'] = './assets/img/profile/staff/';
				}			

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {

					if($this->session->userdata('id_role') == 1) {

						$old_image = $data['data']['image'];

						if($old_image != 'default.jpg'){

							unlink(FCPATH . 'assets/img/profile/admin/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
						$this->db->where('username', $username);
						$this->db->update('admin');
					}

					if($this->session->userdata('id_role') == 2) {

						$old_image = $data['data']['image'];

						if($old_image != 'default.jpg'){

							unlink(FCPATH . 'assets/img/profile/staff/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
						$this->db->where('username', $username);
						$this->db->update('staff');
					}

				} else {
					echo $this->upload->display_errors();
				}

			}

			if($this->session->userdata('id_role') == 1) {

				$this->db->set('nama', $nama);
				$this->db->set('alamat', $alamat);
				$this->db->set('jenis_kelamin', $jenis_kelamin);
				$this->db->set('no_hp', $no_hp);
				$this->db->where('username', $username);
				$this->db->update('admin');
			}

			if($this->session->userdata('id_role') == 2) {

				$this->db->set('nama', $nama);
				$this->db->set('alamat', $alamat);
				$this->db->set('jenis_kelamin', $jenis_kelamin);
				$this->db->set('no_hp', $no_hp);
				$this->db->where('username', $username);
				$this->db->update('staff');
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat. Profile telah diedit!</div>');
			redirect('profile/my_profile');
		}
			
	}

	public function ubah_password()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		if($this->session->userdata('id_role') == 1){

			$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}

		if($this->session->userdata('id_role') == 2){

			$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		}

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[3]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password baru', 'required|trim|min_length[3]|matches[password_baru1]');

		if( $this->form_validation->run() == false ){

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('profile/ubah-password', $data);
			$this->load->view('templates/footer');
		} else {

			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');

			if(!password_verify($password_lama, $data['user']['password'])) {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
				redirect('profile/ubah_password');
			} else {

				if( $password_lama == $password_baru ) {

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
					redirect('profile/ubah_password');
				} else {

					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $data['user']['username']);
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
					redirect('profile/my_profile');
				}
			}
		}
		
	}

}