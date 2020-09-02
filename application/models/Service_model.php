<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_model extends CI_Model 
{
	public function getService()
	{
		$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id ORDER BY sv.nomor_service";

		return $this->db->query($query)->result_array();
	}

	public function laporanService()
	{
		$query = "SELECT p.nomor_service, b.nama as teknisi, s.nama as staff, p.nama, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.keterangan, p.biaya FROM service p JOIN staff s ON p.id_staff = s.id JOIN teknisi b ON p.id_teknisi = b.id ORDER BY p.nomor_service";

		return $this->db->query($query)->result_array();
	}

	public function laporanServiceHari($hari)
	{
		$query = "SELECT p.nomor_service, b.nama as teknisi, s.nama as staff, p.nama, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.keterangan, p.biaya FROM service p JOIN staff s ON p.id_staff = s.id JOIN teknisi b ON p.id_teknisi = b.id WHERE p.tanggal = '$hari' ORDER BY p.nomor_service";

		return $this->db->query($query)->result_array();
	}

	public function laporanServiceBulan($bulan)
	{
		$query = "SELECT p.nomor_service, b.nama as teknisi, s.nama as staff, p.nama, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.keterangan, p.biaya FROM service p JOIN staff s ON p.id_staff = s.id JOIN teknisi b ON p.id_teknisi = b.id WHERE p.bulan = '$bulan' ORDER BY p.nomor_service";

		return $this->db->query($query)->result_array();
	}

	public function laporanServiceTahun($tahun)
	{
		$query = "SELECT p.nomor_service, b.nama as teknisi, s.nama as staff, p.nama, p.jam, CONCAT_WS('-', p.tanggal, p.bulan, p.tahun) as tanggal, p.keterangan, p.biaya FROM service p JOIN staff s ON p.id_staff = s.id JOIN teknisi b ON p.id_teknisi = b.id WHERE p.tahun = '$tahun' ORDER BY p.nomor_service";

		return $this->db->query($query)->result_array();
	}

	public function getServiceLast()
	{
		$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id ORDER BY sv.nomor_service DESC LIMIT 1";

		return $this->db->query($query)->row_array();
	}

	public function getServicePer($waktu, $angka)
	{
		if($waktu == 'hari') {

			$data = date('d', time());

			$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id WHERE sv.tanggal = '$data' ORDER BY sv.nomor_service";
		}

		if($waktu == 'bulan' && $angka == 0) {

			$data = date('m', time());

			$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id WHERE sv.bulan = '$data' ORDER BY sv.nomor_service";
		}

		if($waktu == 'bulan' && $angka != 0) {

			$data = $angka;

			$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id WHERE sv.bulan = '$data' ORDER BY sv.nomor_service";
		}

		if($waktu == 'tahun' && $angka == 0) {

			$data = date('Y', time());

			$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id WHERE sv.tahun = '$data' ORDER BY sv.nomor_service";
		}

		if($waktu == 'tahun' && $angka != 0) {

			$data = $angka;

			$query = "SELECT sv.*, s.nama as staff, t.nama as teknisi FROM service sv JOIN staff s ON sv.id_staff = s.id JOIN teknisi t ON sv.id_teknisi = t.id WHERE sv.tahun = '$data' ORDER BY sv.nomor_service";
		}

		return $this->db->query($query)->result_array();
	}

}