<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_temp_model extends CI_Model 
{
	public function get_transaksi_temp()
	{
		$query = "SELECT tt.*, a.akun FROM transaksi_temp tt JOIN akun a ON a.id = tt.id_akun ORDER BY tt.id";
		return $this->db->query($query)->result();
	}

}