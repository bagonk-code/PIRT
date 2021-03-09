<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

	public function getUserByEmail()
	{
		$email = trim($this->session->userdata('email'));

		return $this->db->query(" SELECT mr_user.*, mr_kota.nama_kota, mr_kecamatan.nama_kecamatan, mr_kelurahan.nama_kelurahan FROM mr_user INNER JOIN mr_kota ON mr_user.kota = mr_kota.kode_kota INNER JOIN mr_kecamatan ON mr_user.kecamatan = mr_kecamatan.kode_kecamatan INNER JOIN mr_kelurahan ON mr_user.kelurahan = mr_kelurahan.kode_kelurahan WHERE mr_user.email = '$email' ")->row();
	}	

	public function getUserAll()
	{
		return $this->db->query(" SELECT mr_user.*, mr_kota.nama_kota, mr_kecamatan.nama_kecamatan, mr_kelurahan.nama_kelurahan FROM mr_user INNER JOIN mr_kota ON mr_user.kota = mr_kota.kode_kota INNER JOIN mr_kecamatan ON mr_user.kecamatan = mr_kecamatan.kode_kecamatan INNER JOIN mr_kelurahan ON mr_user.kelurahan = mr_kelurahan.kode_kelurahan WHERE mr_user.is_active = 1 AND mr_user.is_delete = 0 AND mr_user.level = 2 ")->result();
	}

	public function getUserById($id_user)
	{
		$hasil = $this->db->where('id_user', $id_user)
		->get('mr_user');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function addUser($data_user){
		$this->db->insert('mr_user', $data_user);
	}

	public function updateUser($id_user, $data_user){
		$this->db->where('id_user', $id_user)
		->update('mr_user', $data_user);
	}

	public function deleteUser($id_user, $data_user){
		$this->db->where('id_user', $id_user)
		->update('mr_user', $data_user);
	}
}
