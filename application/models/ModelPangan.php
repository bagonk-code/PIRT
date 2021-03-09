<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPangan extends CI_Model {

	public function getPanganAll()
	{
		$hasil = $this->db->get_where('mr_pangan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else {
			return array();
		}
	}

	public function getPanganById($id_pangan)
	{
		$hasil = $this->db->where('id_pangan', $id_pangan)
		->get_where('mr_pangan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addPangan($data_pangan)
	{
		$this->db->insert('mr_pangan', $data_pangan);
	}

	public function updatePangan($id_pangan, $data_pangan){
		$this->db->where('id_pangan', $id_pangan)
		->update('mr_pangan', $data_pangan);
	}

	public function deletePangan($id_pangan, $data_pangan){
		$this->db->where('id_pangan', $id_pangan)
		->update('mr_pangan', $data_pangan);
	}

}
