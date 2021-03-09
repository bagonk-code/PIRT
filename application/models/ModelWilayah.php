<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelWilayah extends CI_Model {

	public function getKotaAll()
	{
		$hasil = $this->db->get_where('mr_kota',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else {
			return array();
		}
	}

	public function getKotaById($id_kota)
	{
		$hasil = $this->db->where('id_kota', $id_kota)
		->get_where('mr_kota',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addKota($data_kota)
	{
		$this->db->insert('mr_kota', $data_kota);
	}

	public function updateKota($id_kota, $data_kota){
		$this->db->where('id_kota', $id_kota)
		->update('mr_kota', $data_kota);
	}

	public function deleteKota($id_kota, $data_kota){
		$this->db->where('id_kota', $id_kota)
		->update('mr_kota', $data_kota);
	}

	public function getKecamatanAll()
	{
		return $this->db->query("SELECT mr_kota.nama_kota, mr_kecamatan.* FROM mr_kota INNER JOIN mr_kecamatan ON mr_kota.kode_kota = mr_kecamatan.kode_kota WHERE mr_kecamatan.is_delete = 0")->result();
	}

	public function getKecamatanById($id_kecamatan)
	{
		$hasil = $this->db->where('id_kecamatan', $id_kecamatan)
		->get_where('mr_kecamatan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addKecamatan($data_kecamatan)
	{
		$this->db->insert('mr_kecamatan', $data_kecamatan);
	}

	public function updateKecamatan($id_kecamatan, $data_kecamatan){
		$this->db->where('id_kecamatan', $id_kecamatan)
		->update('mr_kecamatan', $data_kecamatan);
	}

	public function deleteKecamatan($id_kecamatan, $data_kecamatan){
		$this->db->where('id_kecamatan', $id_kecamatan)
		->update('mr_kecamatan', $data_kecamatan);
	}

	public function getKelurahanAll()
	{
		return $this->db->query("SELECT mr_kecamatan.nama_kecamatan, mr_kelurahan.* FROM mr_kecamatan INNER JOIN mr_kelurahan ON mr_kecamatan.kode_kecamatan = mr_kelurahan.kode_kecamatan WHERE mr_kelurahan.is_delete = 0")
		->result();
	}

	public function getKelurahanById($id_kelurahan)
	{
		$hasil = $this->db->where('id_kelurahan', $id_kelurahan)
		->get_where('mr_kelurahan',array('is_delete' => 0));
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addKelurahan($data_kelurahan)
	{
		$this->db->insert('mr_kelurahan', $data_kelurahan);
	}

	public function updateKelurahan($id_kelurahan, $data_kelurahan){
		$this->db->where('id_kelurahan', $id_kelurahan)
		->update('mr_kelurahan', $data_kelurahan);
	}

	public function deleteKelurahan($id_kelurahan, $data_kelurahan){
		$this->db->where('id_kelurahan', $id_kelurahan)
		->update('mr_kelurahan', $data_kelurahan);
	}

}
