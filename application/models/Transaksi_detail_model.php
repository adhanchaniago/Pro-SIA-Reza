<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_detail_model extends CI_Model 
{
	public function get_transaksi_detail()
	{
		$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi ORDER BY td.id";
		return $this->db->query($query)->result();
	}

	public function get_transaksi_detail_perhari()
	{
		$hari = date('d', time());
		$bulan = date('m', time());
		$tahun = date('Y', time());

		$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi WHERE t.tanggal = '$hari' AND t.bulan = '$bulan' AND t.tahun = '$tahun' ORDER BY td.id";
		return $this->db->query($query)->result();
	}

	public function get_transaksi_detail_perbulan($bulan)
	{
		$tahun = date('Y', time());

		if($bulan == 0)
		{
			$bulan = date('m', time());

			$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi WHERE t.bulan = '$bulan' AND t.tahun = '$tahun' ORDER BY td.id";
			return $this->db->query($query)->result();
		}else{

			$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi WHERE t.bulan = '$bulan' AND t.tahun = '$tahun' ORDER BY td.id";
			return $this->db->query($query)->result();
		}
	}

	public function get_transaksi_detail_pertahun($tahun)
	{
		if($tahun == 0)
		{
			$tahun = date('Y', time());

			$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi WHERE  t.tahun = '$tahun' ORDER BY td.id";
			return $this->db->query($query)->result();
		}else{

			$query = "SELECT td.*, a.akun, t.tanggal, t.bulan, t.tahun FROM transaksi_detail td JOIN akun a ON a.id = td.id_akun JOIN transaksi t ON t.id = td.id_transaksi WHERE  t.tahun = '$tahun' ORDER BY td.id";
			return $this->db->query($query)->result();
		}

	}

	public function laporan_jurnal()
	{
		$this->db->select('t.tanggal, t.bulan, a.akun, td.debit, td.kredit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 'td.id_transaksi = t.id');
		$this->db->join('akun a', 'a.id = td.id_akun');
		$this->db->order_by('td.id');

		return $this->db->get()->result_array();
	}

	public function get_debit($id_akun)
	{
		$this->db->select('t.tanggal, t.bulan, t.tahun, td.debit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 't.id = td.id_transaksi');
		$this->db->where('td.id_akun', $id_akun);
		$this->db->where('td.debit <>', '0');

		return $this->db->get()->result_array();
	}

	public function get_debit_waktu($id_akun, $waktu, $angka)
	{
		$this->db->select('t.tanggal, t.bulan, t.tahun, td.debit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 't.id = td.id_transaksi');
		$this->db->where('td.id_akun', $id_akun);
		$this->db->where('td.debit <>', '0');

		if($waktu == 'hari'){
			$this->db->where('tanggal', date('d', time()));
			$this->db->where('bulan', date('m', time()));
			$this->db->where('tahun', date('Y', time()));
		}elseif($waktu == 'bulan'){
			if($angka != ''){
				$this->db->where('bulan', $angka);
				$this->db->where('tahun', date('Y', time()));
			}else{
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			}
		}elseif($waktu == 'tahun'){
			if($angka != ''){
				$this->db->where('tahun', $angka);
			}else{
				$this->db->where('tahun', date('Y', time()));
			}
		}


		return $this->db->get()->result_array();
	}

	public function get_kredit($id_akun)
	{
		$this->db->select('t.tanggal, t.bulan, t.tahun, td.kredit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 't.id = td.id_transaksi');
		$this->db->where('td.id_akun', $id_akun);
		$this->db->where('td.kredit <>', '0');

		return $this->db->get()->result_array();
	}

	public function get_kredit_waktu($id_akun, $waktu, $angka)
	{
		$this->db->select('t.tanggal, t.bulan, t.tahun, td.kredit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 't.id = td.id_transaksi');
		$this->db->where('td.id_akun', $id_akun);
		$this->db->where('td.kredit <>', '0');

		if($waktu == 'hari'){
			$this->db->where('tanggal', date('d', time()));
			$this->db->where('bulan', date('m', time()));
			$this->db->where('tahun', date('Y', time()));
		}elseif($waktu == 'bulan'){
			if($angka != ''){
				$this->db->where('bulan', $angka);
				$this->db->where('tahun', date('Y', time()));
			}else{
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			}
		}elseif($waktu == 'tahun'){
			if($angka != ''){
				$this->db->where('tahun', $angka);
			}else{
				$this->db->where('tahun', date('Y', time()));
			}
		}

		return $this->db->get()->result_array();
	}

	public function laporan_jurnal_waktu($waktu, $angka)
	{
		
		$this->db->select('t.tanggal, t.bulan, t.tahun, a.akun, td.debit, td.kredit');
		$this->db->from('transaksi t');
		$this->db->join('transaksi_detail td', 'td.id_transaksi = t.id');
		$this->db->join('akun a', 'a.id = td.id_akun');
		$this->db->order_by('td.id');

		if($waktu == 'hari'){
			$this->db->where('tanggal', date('d', time()));
			$this->db->where('bulan', date('m', time()));
			$this->db->where('tahun', date('Y', time()));
		}elseif($waktu == 'bulan'){
			if($angka != ''){
				$this->db->where('bulan', $angka);
				$this->db->where('tahun', date('Y', time()));
			}else{
				$this->db->where('bulan', date('m', time()));
				$this->db->where('tahun', date('Y', time()));
			}
		}elseif($waktu == 'tahun'){
			if($angka != ''){
				$this->db->where('tahun', $angka);
			}else{
				$this->db->where('tahun', date('Y', time()));
			}
		}

		return $this->db->get()->result_array();
	}

}