<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		loadAttrMaster();
		isLoggedIn();
	}

	public function index()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Profil";
		$data['judul2'] = "Pengaturan Profil";
		$this->load->view('page/Profil', $data);
		// echo json_encode($data['user']);
	}

	public function updateProfil($id_user = null)
	{
		if (!isset($id_user)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();
		$data['judul1'] = "Profil";
		$data['judul2'] = "Pengaturan Profil";
		$data['pmh'] = $this->ModelUser->getUserById(base64_decode($id_user));
		$this->load->view('page/EditProfil', $data);
		// echo json_encode($data['pmh']);
	}

	public function updateProfilAction()
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
			$this->load->view('page/EditProfil', $data);
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
				'no_hp' => $this->input->post('no_hp')
			);
			$this->ModelUser->updateUser(base64_decode($id_user), $data_user);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Profil Berhasil Diubah</b></div>');
			redirect('Profil/index');
			// echo "sukses";
		}
	}

	public function uploadBerkas()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Profil";
		$data['judul2'] = "Pengaturan Profil";
		$this->load->view('page/UploadBerkas', $data);
	}

}
