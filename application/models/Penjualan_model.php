<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan_model extends CI_Model 
{
	public function getPenjualan()
	{
		$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function laporanPenjualan()
	{
		$query = "SELECT p.nomor_penjualan, b.nama as barang, s.nama as staff, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.jumlah, p.total FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function laporanPenjualanHari($hari)
	{
		$query = "SELECT p.nomor_penjualan, b.nama as barang, s.nama as staff, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.jumlah, p.total FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.tanggal = '$hari' ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function laporanPenjualanBulan($bulan)
	{
		$query = "SELECT p.nomor_penjualan, b.nama as barang, s.nama as staff, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.jumlah, p.total FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.bulan = '$bulan' ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function laporanPenjualanTahun($tahun)
	{
		$query = "SELECT p.nomor_penjualan, b.nama as barang, s.nama as staff, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.jumlah, p.total FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function getPenjualanLast()
	{
		$max = $this->db->query("SELECT max(nomor_penjualan) FROM penjualan")->row_array();
		$maks = $max['max(nomor_penjualan)'];

		$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE nomor_penjualan = '$maks'";

		return $this->db->query($query)->result_array();
	}

	public function getPenjualanPerHari()
	{
		$hari = date('d', time());
		$bulan = date('m', time());
		$tahun = date('Y', time());

		$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.tanggal = '$hari' AND p.bulan = '$bulan' AND p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

		return $this->db->query($query)->result_array();
	}

	public function getPenjualanPerBulan($angka)
	{
		if($angka == 0) {

			$bulan = date('m', time());
			$tahun = date('Y', time());

			$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.bulan = '$bulan'  AND p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

			return $this->db->query($query)->result_array();								
		}

		if($angka != 0) {

			$bulan = $angka;

			$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.bulan = '$bulan'  AND p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

			return $this->db->query($query)->result_array();								
		}
	}

	public function getPenjualanPerTahun($angka)
	{
		if($angka == 0) {

			$tahun = date('Y', time());

			$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

			return $this->db->query($query)->result_array();
		}

		if($angka != 0) {

			$tahun = $angka;

			$query = "SELECT p.*, s.nama as staff, b.nama as barang FROM penjualan p JOIN staff s ON p.id_staff = s.id JOIN barang b ON p.id_barang = b.id WHERE p.tahun = '$tahun' ORDER BY p.nomor_penjualan";

			return $this->db->query($query)->result_array();
		}
	}

}