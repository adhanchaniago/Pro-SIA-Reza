<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('asia/jakarta');

		// sudah_login();

		$this->load->helper('download');
		$this->load->model('Barang_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Service_model');
		$this->load->model('Transaksi_temp_model');
		$this->load->model('Transaksi_detail_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staff/index', $data);
		$this->load->view('templates/footer');
	}

	public function data_barang()
	{
		$data['title'] = 'Data Barang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->Barang_model->getBarang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staff/data-barang', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_barang()
	{
		$data['title'] = 'Tambah Data Barang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama barang', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah barang', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga barang', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staff/tambah/tambah-barang', $data);
			$this->load->view('templates/footer');
		} else {

			$data = [

				'nama' => htmlspecialchars($this->input->post('nama')),
				'jumlah' => htmlspecialchars($this->input->post('jumlah')),
				'harga' => htmlspecialchars($this->input->post('harga')),
				'foto' => 'default.jpg'
			];
			$this->db->insert('barang', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang baru berhasil ditambah</div>');
			redirect('staff/data_barang');
		}
	}

	public function edit_barang($id_barang)
	{
		$data['title'] = 'Edit Data Barang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->Barang_model->getBarangId($id_barang);

		$this->form_validation->set_rules('nama', 'Nama barang', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah barang', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga barang', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staff/edit/edit-barang', $data);
			$this->load->view('templates/footer');
		} else {

			//Cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] = 'jpg|png';
				$config['upload_path'] = './assets/img/barang/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['barang']['foto'];

					if ($old_image != 'default.jpg') {

						unlink(FCPATH . 'assets/img/barang/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', htmlspecialchars($this->input->post('nama')));
			$this->db->set('jumlah', htmlspecialchars($this->input->post('jumlah')));
			$this->db->set('harga', htmlspecialchars($this->input->post('harga')));
			$this->db->where('id', $this->input->post('id_barang'));
			$this->db->update('barang');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil diedit</div>');
			redirect('staff/data_barang');
		}
	}

	public function hapus_barang($id_barang)
	{
		$barang = $this->db->get_where('barang', ['id' => $id_barang])->row_array();

		$old_image = $barang['foto'];

		if ($old_image != 'default.jpg') {

			unlink(FCPATH . 'assets/img/barang/' . $old_image);
		}

		$this->db->delete('barang', ['id' => $id_barang]);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil dihapus</div>');
		redirect('staff/data_barang');
	}

	public function data_penjualan($waktu = "semua", $angka = 0)
	{
		$data['title'] = 'Data Penjualan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();

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
		$this->load->view('staff/data-penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function Penjualan()
	{
		$data['title'] = 'Penjualan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->Barang_model->getBarang();
		$data['penjualan_temp'] = $this->db->get('penjualan_temp');
		$data['penjualan'] = $this->db->get('penjualan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staff/penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function Penjualan_temp()
	{
		$id_barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');
		$total = $this->input->post('total');
		$harga = $this->input->post('harga');

		$data = [

			'id_barang' => $id_barang,
			'jumlah' => $jumlah,
			'total' => $total,
			'harga' => $harga
		];

		$this->db->insert('penjualan_temp', $data);

		redirect('staff/penjualan');
	}

	public function penjualan_act()
	{
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		$max = $this->db->query('SELECT max(nomor_penjualan) FROM penjualan')->row_array();

		if ($max['max(nomor_penjualan)'] == NULL) {

			$nomor_penjualan = 1;
		} else {

			$nomor_penjualan = (int)$max['max(nomor_penjualan)'] + 1;
		}

		$tot = $this->db->query('SELECT sum(total) FROM penjualan_temp')->row_array();

		$tunai = $this->input->post('tunai');
		$total = $tot['sum(total)'];
		$kembali = $tunai - $total;
		$staff = $data['data']['id'];
		$jam = date('H:i', time());
		$tanggal = date('d', time());
		$bulan = date('m', time());
		$tahun = date('Y', time());

		$result = $this->db->get('penjualan_temp')->result_array();

		foreach ($result as $rs) {

			$data_penjualan = [

				'nomor_penjualan' => $nomor_penjualan,
				'id_staff' => $staff,
				'jam' => $jam,
				'tanggal' => $tanggal,
				'bulan' => $bulan,
				'tahun' => $tahun,
				'id_barang' => $rs['id_barang'],
				'jumlah' => $rs['jumlah'],
				'total' => $rs['total']
			];

			$barang_lama = $this->db->get_where('barang', ['id' => $rs['id_barang']])->row_array();

			$this->db->set('jumlah', (int)$barang_lama['jumlah'] - (int)$rs['jumlah']);
			$this->db->where('id', $rs['id_barang']);
			$this->db->update('barang');

			$this->db->insert('penjualan', $data_penjualan);
		}

		$data_pembayaran = [

			'nomor_penjualan' => $nomor_penjualan,
			'total' => $total,
			'tunai' => $tunai,
			'kembali' => $kembali
		];

		$this->db->insert('pembayaran', $data_pembayaran);

		$this->db->query('DELETE FROM penjualan_temp');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penjualan berhasil ditambah</div>');
		redirect('staff/penjualan');
	}

	public function data_service($waktu = "semua", $angka = 0)
	{
		$data['title'] = 'Data Service';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();

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
		$this->load->view('staff/data-service', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_penjualan()
	{
		$data['penjualan'] = $this->Penjualan_model->getPenjualanLast();
		$data['barang'] = $this->db->get('barang')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('staff/cetak-penjualan', $data);
		$this->load->view('templates/footer-cetak');
	}

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();
		$data['akun'] = $this->db->get('akun')->result();
		$data['transaksi_temp'] = $this->Transaksi_temp_model->get_transaksi_temp();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staff/transaksi', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_akun()
	{
		$akun = $this->input->post('akun');

		$this->db->set('akun', $akun);
		$this->db->insert('akun');

		redirect('staff/transaksi');
	}

	public function tambah_transaksi()
	{
		$data = array(

			'id_akun' => $this->input->post('id_akun'),
			'debit' => $this->input->post('debit'),
			'kredit' => $this->input->post('kredit')
		);

		$this->db->insert('transaksi_temp', $data);
	}

	public function selesai_transaksi()
	{
		$this->db->select('sum(debit)');
		$debit = $this->db->get('transaksi_temp')->result_array();

		$this->db->select('sum(kredit)');
		$kredit = $this->db->get('transaksi_temp')->result_array();

		if ($debit[0]['sum(debit)'] != $kredit[0]['sum(kredit)']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Saldo tidak seimbang!</div>');
			redirect('staff/transaksi');
		}

		if ($this->input->post('tanggal_transaksi') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Masukkan Tanggal Transaksi!</div>');
			redirect('staff/transaksi');
		}

		$tanggal = explode('-', $this->input->post('tanggal_transaksi'));

		$this->db->set('tanggal', $tanggal[2]);
		$this->db->set('bulan', $tanggal[1]);
		$this->db->set('tahun', $tanggal[0]);
		$this->db->set('total', $kredit[0]['sum(kredit)']);
		$this->db->insert('transaksi');

		$this->db->select('max(id)');
		$transaksi = $this->db->get('transaksi')->result_array();

		$transaksi_temp = $this->db->get('transaksi_temp')->result();

		foreach ($transaksi_temp as $tt) {
			$this->db->set('id_transaksi', $transaksi[0]['max(id)']);
			$this->db->set('id_akun', $tt->id_akun);
			$this->db->set('debit', $tt->debit);
			$this->db->set('kredit', $tt->kredit);
			$this->db->insert('transaksi_detail');
		}

		$this->db->query('DELETE FROM transaksi_temp');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Berhasil Disimpan</div>');
		redirect('staff/transaksi');
	}

	public function jurnal($waktu = 'semua', $angka = 0)
	{
		$data['title'] = "Jurnal";
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username'), 'id_role' => $this->session->userdata('id_role')])->row_array();
		$data['data'] = $this->db->get_where('staff', ['username' => $this->session->userdata('username')])->row_array();

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
		$this->load->view('staff/jurnal', $data);
		$this->load->view('templates/footer');
	}
	public function logout()
	{
		session_destroy();
		redirect(site_url('auth/login'));
	}
}
