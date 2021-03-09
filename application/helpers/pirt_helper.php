<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	function isLoggedIn()
	{
		$CI = get_instance();
		if (!$CI->session->userdata('email')) {
			redirect('Auth/login');
		}else{
			$level = $CI->session->userdata('level');
			$menu = $CI->uri->segment(1);

			$queryMenu = $CI->db->get_where('mr_menu', ['menu' => "$menu"])->row_array();
			$menu_id = $queryMenu['id_menu'];

			$userAccess = $CI->db->get_where('mr_akses_menu', [
				'id_level' => $level,
				'id_menu' => $menu_id
			]);

			if ($userAccess->num_rows() < 1) {
				redirect('Auth/block');
			}
		}
	}

	function loadAttrMaster()
	{
		$CI = get_instance();
		$CI->load->model('ModelUser');
		$CI->load->model('ModelMenu');
		$CI->load->model('ModelKemasan');
		$CI->load->model('ModelPangan');
		$CI->load->model('ModelWilayah');
		$CI->load->library('aesencrypt');
	}

	function checkAkses($id_level, $id_menu)
	{
		$CI =& get_instance();
		$CI->db->where('id_level', $id_level);
		$CI->db->where('id_menu', $id_menu);
		$hasil = $CI->db->get('mr_akses_menu');

		if ($hasil->num_rows() > 0) {
			return "checked='checked'";
		}
	}

?>