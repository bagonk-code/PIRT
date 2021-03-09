<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKemasan extends CI_Model {

	public function getKemasanAll()
	{
		$hasil = $this->db->get_where('mr_kemasan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else {
			return array();
		}
	}

	public function getKemasanById($id_kemsan)
	{
		$hasil = $this->db->where('id_kemasan', $id_kemsan)
		->get_where('mr_kemasan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addKemasan($data_kemasan)
	{
		$this->db->insert('mr_kemasan', $data_kemasan);
	}

	public function updateKemasan($id_kemasan, $data_kemasan){
		$this->db->where('id_kemasan', $id_kemasan)
		->update('mr_kemasan', $data_kemasan);
	}

	public function deleteKemasan($id_kemasan, $data_kemasan){
		$this->db->where('id_kemasan', $id_kemasan)
		->update('mr_kemasan', $data_kemasan);
	}

}
