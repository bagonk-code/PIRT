<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon extends CI_Controller {

	public function __construct(){
		parent::__construct();
		loadAttrMaster();
		isLoggedIn();
	}

	public function index()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['pemohon'] = $this->ModelUser->getUserAll();
		$data['judul1'] = "Pemohon";
		$data['judul2'] = "Biodata";
		$this->load->view('page/ListPemohon', $data);
		// echo json_encode($data['pemohon']);
	}

	public function addPemohon()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();
		$data['judul1'] = "Pemohon";
		$data['judul2'] = "Biodata";
		$this->load->view('page/AddPemohon', $data);
	}

	public function addPemohonAction()
	{
		$this->form_validation->set_rules('nama_user', 'Penanggungjawab', 'required');
		$this->form_validation->set_rules('nama_perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[mr_user.email]|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_numeric');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('is_active', 'Status', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kota'] = $this->ModelWilayah->getKotaAll();
			$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
			$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();
			$data['judul1'] = "Pemohon";
			$data['judul2'] = "Data Pemohon";
			$this->load->view('page/AddPemohon', $data);
		}else{
			$data_user = array(
				'nama_user' => $this->input->post('nama_user'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),  
				'email' => htmlspecialchars($this->input->post('email')),  
				'alamat' => $this->input->post('alamat'),  
				'kota' => $this->input->post('kota'),  
				'kecamatan' => $this->input->post('kecamatan'),  
				'kelurahan' => $this->input->post('kelurahan'),  
				'jk' => $this->input->post('jk'),  
				'rt' => $this->input->post('rt'),  
				'rw' => $this->input->post('rw'),  
				'no_hp' => $this->input->post('no_hp'),  
				'password' => password_hash("12345678", PASSWORD_DEFAULT),
				'level' => 2,
				'is_active' => $this->input->post('is_active'),
				'is_delete' => 1
			);
			$this->ModelUser->addUser($data_user);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check"></i><b>Data Pemohon Berhasil Ditambahkan</b></div>');
			redirect('Pemohon');	
		}	
	}

	public function updateUser($id_user = null){
		if (!isset($id_user)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();
		$data['judul1'] = "Pemohon";
		$data['judul2'] = "Biodata";
		$data['pmh'] = $this->ModelUser->getUserById(base64_decode($id_user));
		$this->load->view('page/EditPemohon', $data);
		// echo json_encode($data['pmh']);
	}

	public function updateUserAction()
	{
		$this->form_validation->set_rules('nama_user', 'Penanggungjawab', 'required');
		$this->form_validation->set_rules('nama_perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_numeric');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('is_active', 'Status', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$id_user = $this->input->post('id_user');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kota'] = $this->ModelWilayah->getKotaAll();
			$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
			$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();
			$data['judul1'] = "Pemohon";
			$data['judul2'] = "Biodata";
			$data['pmh'] = $this->ModelUser->getUserById(base64_decode($id_user));
			$this->load->view('page/EditPemohon', $data);
		}else{
			$data_user = array(
				'nama_user' => $this->input->post('nama_user'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),  
				'email' => htmlspecialchars($this->input->post('email')),  
				'alamat' => $this->input->post('alamat'),  
				'kota' => $this->input->post('kota'),  
				'kecamatan' => $this->input->post('kecamatan'),  
				'kelurahan' => $this->input->post('kelurahan'),  
				'jk' => $this->input->post('jk'),  
				'rt' => $this->input->post('rt'),  
				'rw' => $this->input->post('rw'),  
				'no_hp' => $this->input->post('no_hp'),  
				'password' => password_hash("12345678", PASSWORD_DEFAULT),
				'level' => 2,
				'is_active' => $this->input->post('is_active'),
				'is_delete' => 0
			);
			$this->ModelUser->updateUser(base64_decode($id_user), $data_user);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Pemohon Berhasil Diubah</b></div>');
			redirect('Pemohon/index');
		}
	}

	public function deleteUserAction(){
		$data = array(
			'is_delete' => 1
		);
		$id_user = $this->input->post('id_user');
		$this->ModelUser->deleteUser(base64_decode($id_user), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data User Berhasil Dihapus</b></div>');
		redirect('Pemohon');
	}
}