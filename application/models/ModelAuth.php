<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAuth extends CI_Model {

	public function getKota()
	{
		return $this->db->query("SELECT * FROM mr_kota WHERE kode_kota = 3579")
		->result();
	}

	public function getKecamatan()
	{
		return $this->db->query("SELECT * FROM mr_kecamatan WHERE mr_kecamatan.kode_kota = 3579")->result();
	}

	public function getKelurahan()
	{
		return $this->db->query("SELECT mr_kota.*, mr_kecamatan.*, mr_kelurahan.* FROM mr_kota INNER JOIN mr_kecamatan ON mr_kota.kode_kota = mr_kecamatan.kode_kota INNER JOIN mr_kelurahan ON mr_kecamatan.kode_kecamatan = mr_kelurahan.kode_kecamatan WHERE mr_kota.kode_kota = 3579")->result();
	}
	
	public function register($data_user){
		$this->db->insert('mr_user', $data_user);
	}

}
