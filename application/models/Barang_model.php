<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model 
{
	public function getBarang()
	{
		$query = "SELECT * FROM barang";
		return $this->db->query($query)->result_array();
	}

	public function getBarangId($id_barang)
	{
		$query = "SELECT * FROM barang WHERE id = '$id_barang'";
		return $this->db->query($query)->row_array();
	}

}