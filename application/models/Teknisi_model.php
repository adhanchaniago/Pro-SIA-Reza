<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teknisi_model extends CI_Model 
{
	public function getTeknisi()
	{
		$query = "SELECT * FROM teknisi";
		return $this->db->query($query)->result_array();
	}

	public function getTeknisiById($id_staff)
	{
		$query = "SELECT * FROM teknisi WHERE id = '$id_staff'";
		return $this->db->query($query)->row_array();
	}
}