<?php

function cek_menu($id_menu, $id_submenu) 
{
	$ci = get_instance();

	$ci->db->where('menu_id', $id_menu);
	$ci->db->where('id', $id_submenu);
	$result = $ci->db->get('user_submenu')->num_rows();

	if($result == 1) {

		return 'selected';
	}
}

function cek_bulan_tahun($val, $tipe){

	$ci = get_instance();

	if($tipe == 'bulan') {

		$bulan_sekarang = date('m', time());

		if($val == $bulan_sekarang) {

			return 'selected';
		}
	}

	if($tipe == 'tahun') {

		$tahun_sekarang = date('Y', time());

		if($val == $tahun_sekarang) {

			return 'selected';
		}
	}
	
}

function cek_aktif($val, $id_submenu) 
{
	$ci = get_instance();

	$result = $ci->db->get_where('user_submenu', ['id' => $id_submenu])->row_array();

	if($result['is_active'] == $val) {

		return 'selected';
	}
}

function cek_aktif_staff($email, $val) 
{
	$ci = get_instance();

	$result = $ci->db->get_where('user', ['email' => $email])->row_array();

	if($result['is_active'] == $val) {

		return 'selected';
	}
}

function cek_jk($val, $id, $tipe) 
{
	$ci = get_instance();

	if($tipe == 'admin') { $tb = 'admin'; }
	if($tipe == 'staff') { $tb = 'staff'; }
	if($tipe == 'teknisi') { $tb = 'teknisi'; }

	if($tipe == 1) { $tb = 'admin'; }
	if($tipe == 2) { $tb = 'staff'; }
	if($tipe == 3) { $tb = 'teknisi'; }

	$result = $ci->db->get_where($tb, ['id' => $id])->row_array();

	if($result['jenis_kelamin'] == $val) {

		return 'selected';
	}
}

function cek_akses($role_id, $menu_id)
{
	$ci = get_instance();

	$result = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();

	if($result > 0) {

		return 'checked="checked"';
	}
}

function sudah_login()
{
	$ci = get_instance();

	if(!$ci->session->userdata('username')) {

		redirect('auth/login');
	}
}

function active_sidebar($title, $segment)
{
	if($title == $segment)
	{
		return 'active';
	}
}

function jumlah_transaksi_per_tanggal($tanggal, $bulan)
{
	$ci = get_instance();

	$ci->db->where('tanggal', $tanggal);
	$ci->db->where('bulan', $bulan);
	$transaksi = $ci->db->get('transaksi')->row_array();
	$id_transaksi = $transaksi['id'];

	return $ci->db->query("SELECT * FROM transaksi_detail WHERE id_transaksi = '$id_transaksi'")->num_rows();
}


