<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		sudah_login();
		date_default_timezone_set('asia/jakarta');

		$this->load->model('Staff_model');
		$this->load->model('Teknisi_model');
		$this->load->model('Barang_model');
		$this->load->model('Service_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Transaksi_detail_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function staff()
	{
		$data['title'] = 'Staff';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['staff'] = $this->Staff_model->getStaff();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/staff', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_staff()
	{
		$data['title'] = 'Tambah Staff';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username sudah ada']);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/tambah/tambah-staff', $data);
			$this->load->view('templates/footer');
		} else {

			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$no_hp = $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');
			$password = '123';

			$data_staff = [

				'username' => htmlspecialchars($username),
				'nama' => htmlspecialchars($nama),
				'jenis_kelamin' => htmlspecialchars($jenis_kelamin),
				'no_hp' => htmlspecialchars($no_hp),
				'alamat' => htmlspecialchars($alamat),
				'image' => 'default.jpg'
			];

			$data_user = [

				'username' => htmlspecialchars($username),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'id_role' => 2,
			];

			$this->db->insert('user', $data_user);
			$this->db->insert('staff', $data_staff);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Staff baru berhasil ditambahkan</div>');
			redirect('admin/staff');
		}
	}

	public function edit_staff($id_staff)
	{
		$data['title'] = 'Edit Staff';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['staff'] = $this->Staff_model->getStaffById($id_staff);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit/edit-staff', $data);
			$this->load->view('templates/footer');
		} else {

			$nama = $this->input->post('nama');
			$no_hp = $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$id_staff = $this->input->post('id_staff');


			//Cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] = 'jpg|png';
				$config['upload_path'] = './assets/img/profile/staff/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['staff']['image'];

					if ($old_image != 'default.jpg') {

						unlink(FCPATH . 'assets/img/profile/staff/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('no_hp', $no_hp);
			$this->db->set('alamat', $alamat);
			$this->db->set('jenis_kelamin', $jenis_kelamin);
			$this->db->where('id', $id_staff);
			$this->db->update('staff');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Staff berhasil diedit</div>');
			redirect('admin/staff');
		}
	}

	public function hapus_staff($id_staff)
	{
		$staff = $this->Staff_model->getStaffById($id_staff);

		$old_image = $staff['image'];

		if ($old_image != 'default.jpg') {

			unlink(FCPATH . 'assets/img/profile/staff/' . $old_image);
		}

		$this->db->delete('user', ['username' => $staff['username']]);
		$this->db->delete('staff', ['username' => $staff['username']]);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Staff berhasil dihapus</div>');
		redirect('admin/staff');
	}

	public function data_barang()
	{
		$data['title'] = 'Data Barang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->Barang_model->getBarang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data-barang', $data);
		$this->load->view('templates/footer');
	}

	public function data_service($waktu = "semua", $angka = 0)
	{
		$data['title'] = 'Data Service';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		if ($waktu == 'semua') {

			$data['service'] = $this->Service_model->getService();
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'hari') {

			$data['service'] = $this->Service_model->getServicePer($waktu, $angka);
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'bulan') {

			$data['service'] = $this->Service_model->getServicePer($waktu, $angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}
		if ($waktu == 'tahun') {

			$data['service'] = $this->Service_model->getServicePer($waktu, $angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data-service', $data);
		$this->load->view('templates/footer');
	}

	public function data_penjualan($waktu = "semua", $angka = 0)
	{
		$data['title'] = 'Data Penjualan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		if ($waktu == 'semua') {

			$data['penjualan'] = $this->Penjualan_model->getPenjualan();
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'hari') {

			$data['penjualan'] = $this->Penjualan_model->getPenjualanPerHari();
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'bulan') {

			$data['penjualan'] = $this->Penjualan_model->getPenjualanPerBulan($angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}
		if ($waktu == 'tahun') {

			$data['penjualan'] = $this->Penjualan_model->getPenjualanPerTahun($angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data-penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function jenis_service()
	{
		$data['title'] = 'Jenis Service';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['jenis_service'] = $this->db->get('jenis_service')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/jenis-service', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_jenis_service()
	{
		$data['title'] = 'Tambah Jenis Service';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('service', 'Service', 'required|trim');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/tambah/tambah-jenis-service', $data);
			$this->load->view('templates/footer');
		} else {

			$service = $this->input->post('service');
			$biaya = $this->input->post('biaya');

			$data = [

				'service' => htmlspecialchars($service),
				'biaya' => htmlspecialchars($biaya),
			];

			$this->db->insert('jenis_service', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Service baru berhasil ditambahkan</div>');
			redirect('admin/jenis_service');
		}
	}

	public function edit_jenis_service($id_jenis_service)
	{
		$data['title'] = 'Edit Jenis Service';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['jenis_service'] = $this->db->get_where('jenis_service', ['id' => $id_jenis_service])->row_array();

		$this->form_validation->set_rules('service', 'Jenis service', 'required|trim');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit/edit-jenis-service', $data);
			$this->load->view('templates/footer');
		} else {

			$service = $this->input->post('service');
			$biaya = $this->input->post('biaya');
			$id_jenis_service = $this->input->post('id_jenis_service');

			$this->db->set('service', $service);
			$this->db->set('biaya', $biaya);
			$this->db->where('id', $id_jenis_service);
			$this->db->update('jenis_service');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Service berhasil diedit</div>');
			redirect('admin/jenis_service');
		}
	}

	public function hapus_jenis_service($id_jenis_service)
	{
		$this->db->delete('jenis_service', ['id' => $id_jenis_service]);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Service berhasil dihapus</div>');
		redirect('admin/jenis_service');
	}

	public function jurnal($waktu = 'semua', $angka = 0)
	{
		$data['title'] = "Jurnal";
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		if ($waktu == 'semua') {

			$data['transaksi_detail'] = $this->Transaksi_detail_model->get_transaksi_detail();
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'hari') {

			$data['transaksi_detail'] = $this->Transaksi_detail_model->get_transaksi_detail_perhari();
			$data['waktu'] = $waktu;
		}
		if ($waktu == 'bulan') {

			$data['transaksi_detail'] = $this->Transaksi_detail_model->get_transaksi_detail_perbulan($angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}
		if ($waktu == 'tahun') {

			$data['transaksi_detail'] = $this->Transaksi_detail_model->get_transaksi_detail_pertahun($angka);
			$data['waktu'] = $waktu;
			$data['angka'] = $angka;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/jurnal', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		session_destroy();
		redirect(site_url('auth/login'));
	}
}
