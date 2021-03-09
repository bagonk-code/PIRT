<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMenu extends CI_Model {

	public function getMenu()
	{
		$level = trim($this->session->userdata('level'));

		return $this->db->query(" SELECT mr_menu.id_menu, mr_menu.menu, mr_menu.icon FROM mr_menu INNER JOIN mr_akses_menu ON mr_menu.id_menu = mr_akses_menu.id_menu WHERE mr_akses_menu.id_level = $level AND mr_menu.is_delete = 0 ORDER BY mr_akses_menu.id_akses ASC ")->result();
	}

	public function getSubmenuAll()
	{
		return $this->db->query(" SELECT mr_sub_menu.id_sub_menu, mr_sub_menu.title, mr_menu.menu, mr_sub_menu.url, mr_sub_menu.is_active FROM mr_menu INNER JOIN mr_sub_menu ON mr_menu.id_menu = mr_sub_menu.id_menu WHERE  mr_sub_menu.is_delete = 0 ORDER BY mr_menu.id_menu ASC ")
		->result();
	}

	public function getLevelAll()
	{
		return $this->db->query(" SELECT * FROM mr_level ORDER BY id_level ASC ")->result();
	}

	public function getMenuAll()
	{
		$hasil = $this->db->order_by('id_menu', 'ASC')
		->get_where('mr_menu',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else {
			return array();
		}
	}

	public function getMenuById($id_menu)
	{
		$hasil = $this->db->where('id_menu', $id_menu)
		->get_where('mr_menu',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addMenu($data_menu)
	{
		$this->db->insert('mr_menu', $data_menu);
	}

	public function updateMenu($id_menu, $data_menu){
		$this->db->where('id_menu', $id_menu)
		->update('mr_menu', $data_menu);
	}

	public function deleteMenu($id_menu, $data_menu){
		$this->db->where('id_menu', $id_menu)
		->update('mr_menu', $data_menu);
	}

	public function addSubMenu($data_submenu)
	{
		$this->db->insert('mr_sub_menu', $data_submenu);
	}

	public function getSubMenuById($id_sub_menu)
	{
		$hasil = $this->db->where('id_sub_menu', $id_sub_menu)
		->get_where('mr_sub_menu',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function updateSubMenu($id_sub_menu, $data_submenu){
		$this->db->where('id_sub_menu', $id_sub_menu)
		->update('mr_sub_menu', $data_submenu);
	}

	public function deleteSubmenu($id_sub_menu, $data_sub_menu){
		$this->db->where('id_sub_menu', $id_sub_menu)
		->update('mr_sub_menu', $data_sub_menu);
	}

	public function getLevelById($id_level)
	{
		$hasil = $this->db->where('id_level', $id_level)
		->limit(1)
		->get('mr_level');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

}
