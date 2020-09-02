<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model 
{
	public function getStaff()
	{
		$query = "SELECT * FROM staff";
		return $this->db->query($query)->result_array();
	}

	public function getStaffById($id_staff)
	{
		$query = "SELECT * FROM staff WHERE id = '$id_staff'";
		return $this->db->query($query)->row_array();
	}
}