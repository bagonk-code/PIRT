<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		loadAttrMaster();
		isLoggedIn();
	}

	public function menu()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['menu_all'] = $this->ModelMenu->getMenuAll();
		$data['sub_menu'] = $this->ModelMenu->getSubMenuAll();
		$data['level'] = $this->ModelMenu->getLevelAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$data['judul3'] = "Master Sub Menu";
		$data['judul4'] = "Master Role Akses Menu";
		$this->load->view('page/ListMenu', $data);
	}

	public function addMenu()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$this->load->view('page/AddMenu', $data);
	}

	public function addMenuAction()
	{
		$this->form_validation->set_rules('menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Menu";
			$this->load->view('page/AddMenu', $data);
		}else{
			$data = array(
				'menu' => $this->input->post('menu'),
				'icon' => $this->input->post('icon'),
				'is_delete' => 0
			);
			$this->ModelMenu->addMenu($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Menu Berhasil Ditambahkan</b></div>');
			redirect('Master/menu');
		}	
	}

	public function updateMenu($id_menu = null){
		if (!isset($id_menu)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$data['mn'] = $this->ModelMenu->getMenuById(base64_decode($id_menu));
		$this->load->view('page/EditMenu', $data);
	}

	public function updateMenuAction()
	{
		$this->form_validation->set_rules('menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$id_menu = $this->input->post('id_menu');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['mn'] = $this->ModelMenu->getMenuById(base64_decode($id_menu));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Menu";
			$this->load->view('page/EditMenu', $data);
		}else{
			$data = array(
				'menu' => $this->input->post('menu'),
				'icon' => $this->input->post('icon'),
				'is_delete' => 0
			);
			$this->ModelMenu->updateMenu(base64_decode($id_menu), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Menu Berhasil Diubah</b></div>');
			redirect('Master/menu');
		}
	}

	public function deleteMenuAction()
	{
		$data = array(
			'is_delete' => 1
		);
		$id_menu = $this->input->post('id_menu');
		$this->ModelMenu->deleteMenu(base64_decode($id_menu), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Menu Berhasil Dihapus</b></div>');
		redirect('Master/menu');
	}

	public function addSubMenu()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['menu_all'] = $this->ModelMenu->getMenuAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$this->load->view('page/AddSubMenu', $data);
	}

	public function addSubMenuAction()
	{
		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('title', 'Nama Sub Menu', 'required');
		$this->form_validation->set_rules('url', 'Alamat URL', 'required');
		$this->form_validation->set_rules('is_active', 'Status Aktif', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['menu_all'] = $this->ModelMenu->getMenuAll();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Menu";
			$this->load->view('page/AddSubMenu', $data);
		}else{
			$data = array(
				'id_menu' => $this->input->post('id_menu'),
				'title' => $this->input->post('title'),
				'url' => $this->input->post('url'),
				'is_active' => $this->input->post('is_active'),
				'is_delete' => 0
			);
			$this->ModelMenu->addSubMenu($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Sub Menu Berhasil Ditambahkan</b></div>');
			redirect('Master/menu');
		}	
	}

	public function updateSubMenu($id_sub_menu = null)
	{
		if (!isset($id_sub_menu)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['menu_all'] = $this->ModelMenu->getMenuAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$data['sm'] = $this->ModelMenu->getSubMenuById(base64_decode($id_sub_menu));
		$this->load->view('page/EditSubMenu', $data);
		// echo json_encode($data['sm']);
	}

	public function updateSubMenuAction()
	{
		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('title', 'Nama Sub Menu', 'required');
		$this->form_validation->set_rules('url', 'Alamat URL', 'required');
		$this->form_validation->set_rules('is_active', 'Status Aktif', 'required');
		$id_sub_menu = $this->input->post('id_sub_menu');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['menu_all'] = $this->ModelMenu->getMenuAll();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Menu";
			$data['sm'] = $this->ModelMenu->getSubMenuById(base64_decode($id_sub_menu));
			$this->load->view('page/EditSubMenu', $data);
		}else{
			$data = array(
				'id_menu' => $this->input->post('id_menu'),
				'title' => $this->input->post('title'),
				'url' => $this->input->post('url'),
				'is_active' => $this->input->post('is_active'),
				'is_delete' => 0
			);
			$this->ModelMenu->updateSubMenu(base64_decode($id_sub_menu), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Sub Menu Berhasil Diubah</b></div>');
			redirect('Master/menu');
		}	
	}

	public function deleteSubmenuAction($id_sub_menu)
	{
		$data = array(
			'is_delete' => 1
		);
		$this->ModelMenu->deleteSubmenu(base64_decode($id_sub_menu), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Sub Menu Berhasil Dihapus</b></div>');
		redirect('Master/menu');
	}

	public function kemasan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kemasan'] = $this->ModelKemasan->getKemasanAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Kemasan";
		$this->load->view('page/ListKemasan', $data);
	}

	public function addKemasan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Kemasan";
		$this->load->view('page/AddKemasan', $data);
	}

	public function addKemasanAction()
	{
		$this->form_validation->set_rules('kode', 'Kode Kemasan', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Kemasan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Kemasan";
			$this->load->view('page/AddKemasan', $data);
		}else{
			$data = array(
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'keterangan' => $this->input->post('keterangan'),
				'is_delete' => 0
			);
			$this->ModelKemasan->addKemasan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Kemasan Berhasil Ditambahkan</b></div>');
			redirect('Master/kemasan');
		}	
	}

	public function updateKemasan($id_kemasan = null){
		if (!isset($id_kemasan)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Kemasan";
		$data['kms'] = $this->ModelKemasan->getKemasanById(base64_decode($id_kemasan));
		$this->load->view('page/EditKemasan', $data);
	}

	public function updateKemasanAction()
	{
		$this->form_validation->set_rules('kode', 'Kode Kemasan', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Kemasan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$id_kemasan = $this->input->post('id_kemasan');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kms'] = $this->ModelKemasan->getKemasanById(base64_decode($id_kemasan));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Kemasan";
			$this->load->view('page/EditKemasan', $data);
		}else{
			$data = array(
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'keterangan' => $this->input->post('keterangan'),
				'is_delete' => 0
			);
			$this->ModelKemasan->updateKemasan(base64_decode($id_kemasan), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Kemasan Berhasil Diubah</b></div>');
			redirect('Master/kemasan');
		}
	}

	public function deleteKemasanAction(){
		$data = array(
			'is_delete' => 1
		);
		$id_kemasan = $this->input->post('id_kemasan');
		$this->ModelKemasan->deleteKemasan(base64_decode($id_kemasan), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Kemasan Berhasil Dihapus</b></div>');
		redirect('Master/kemasan');
	}

	public function pangan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['pangan'] = $this->ModelPangan->getPanganAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Pangan";
		$this->load->view('page/ListPangan', $data);
	}

	public function addPangan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Pangan";
		$this->load->view('page/AddPangan', $data);
	}

	public function addPanganAction()
	{
		$this->form_validation->set_rules('kode', 'Kode Pangan', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Pangan', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Pangan";
			$this->load->view('page/AddPangan', $data);
		}else{
			$data = array(
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'is_delete' => 0
			);
			$this->ModelPangan->addPangan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Pangan Berhasil Ditambahkan</b></div>');
			redirect('Master/pangan');
		}	
	}

	public function updatePangan($id_pangan = null){
		if (!isset($id_pangan)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Pangan";
		$data['pgn'] = $this->ModelPangan->getPanganById(base64_decode($id_pangan));
		$this->load->view('page/EditPangan', $data);
	}

	public function updatePanganAction()
	{
		$this->form_validation->set_rules('kode', 'Kode Pangan', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Pangan', 'required');
		$id_pangan = $this->input->post('id_pangan');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['pgn'] = $this->ModelPangan->getPanganById(base64_decode($id_pangan));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Pangan";
			$this->load->view('page/EditPangan', $data);
		}else{
			$data = array(
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'is_delete' => 0
			);
			
			$this->ModelPangan->updatePangan(base64_decode($id_pangan), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Pangan Berhasil Diubah</b></div>');
			redirect('Master/pangan');
		}
	}

	public function deletePanganAction()
	{
		$data = array(
			'is_delete' => 1
		);
		$id_pangan = $this->input->post('id_pangan');
		$this->ModelPangan->deletePangan(base64_decode($id_pangan), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Jenis Pangan Berhasil Dihapus</b></div>');
		redirect('Master/pangan');
	}

	public function wilayah()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['kelurahan'] = $this->ModelWilayah->getKelurahanAll();		
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Wilayah";
		$this->load->view('page/ListWilayah', $data);
	}

	public function addKota()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Wilayah";
		$this->load->view('page/AddKota', $data);
	}

	public function addKotaAction()
	{
		$this->form_validation->set_rules('kode_kota', 'Kode Kota', 'required');
		$this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Wilayah";
			$this->load->view('page/AddKota', $data);
		}else{
			$data = array(
				'kode_kota' => $this->input->post('kode_kota'),
				'nama_kota' => $this->input->post('nama_kota'),
				'is_delete' => 0
			);
			$this->ModelWilayah->addKota($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Kota Berhasil Ditambahkan</b></div>');
			redirect('Master/wilayah');
		}	
	}

	public function updateKota($id_kota = null){
		if (!isset($id_kota)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Wilayah";
		$data['kt'] = $this->ModelWilayah->getKotaById(base64_decode($id_kota));
		$this->load->view('page/EditKota', $data);
	}

	public function updateKotaAction()
	{
		$this->form_validation->set_rules('kode_kota', 'Kode Kota', 'required');
		$this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required');
		$id_kota = $this->input->post('id_kota');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kt'] = $this->ModelWilayah->getKotaById(base64_decode($id_kota));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Wilayah";
			$this->load->view('page/EditKota', $data);
		}else{
			$data = array(
				'kode_kota' => $this->input->post('kode_kota'),
				'nama_kota' => $this->input->post('nama_kota'),
				'is_delete' => 0
			);
			$this->ModelWilayah->updateKota(base64_decode($id_kota), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Kota Berhasil Diubah</b></div>');
			redirect('Master/wilayah');
		}
	}

	public function deleteKotaAction()
	{
		$data = array(
			'is_delete' => 1
		);
		$id_kota = $this->input->post('id_kota');
		$this->ModelWilayah->deleteKota(base64_decode($id_kota), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Kota Berhasil Dihapus</b></div>');
		redirect('Master/wilayah');
	}

	public function addKecamatan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Wilayah";
		$this->load->view('page/AddKecamatan', $data);
	}

	public function addKecamatanAction()
	{
		$this->form_validation->set_rules('kode_kota', 'Nama Kota', 'required');
		$this->form_validation->set_rules('kode_kecamatan', 'Kode Kecamatan', 'required');
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();			
			$data['kota'] = $this->ModelWilayah->getKotaAll();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Wilayah";
			$this->load->view('page/AddKecamatan', $data);
		}else{
			$data = array(
				'kode_kecamatan' => $this->input->post('kode_kecamatan'),
				'kode_kota' => $this->input->post('kode_kota'),
				'nama_kecamatan' => $this->input->post('nama_kecamatan'),
				'is_delete' => 0
			);
			$this->ModelWilayah->addKecamatan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Kecamatan Berhasil Ditambahkan</b></div>');
			redirect('Master/wilayah');
		}	
	}

	public function updateKecamatan($id_kecamatan = null){
		if (!isset($id_kecamatan)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kota'] = $this->ModelWilayah->getKotaAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Wilayah";
		$data['kc'] = $this->ModelWilayah->getKecamatanById(base64_decode($id_kecamatan));
		$this->load->view('page/EditKecamatan', $data);
	}

	public function updateKecamatanAction()
	{
		$this->form_validation->set_rules('kode_kota', 'Nama Kota', 'required');
		$this->form_validation->set_rules('kode_kecamatan', 'Kode Kecamatan', 'required');
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
		$id_kecamatan = $this->input->post('id_kecamatan');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kota'] = $this->ModelWilayah->getKotaAll();
			$data['kc'] = $this->ModelWilayah->getKecamatanById(base64_decode($id_kecamatan));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Wilayah";
			$this->load->view('page/EditKecamatan', $data);
		}else{
			$data = array(
				'kode_kecamatan' => $this->input->post('kode_kecamatan'),
				'kode_kota' => $this->input->post('kode_kota'),
				'nama_kecamatan' => $this->input->post('nama_kecamatan'),
				'is_delete' => 0
			);
			$this->ModelWilayah->updateKecamatan(base64_decode($id_kecamatan), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-secondary"> <i class="icon fas fa-check-circle"></i><b>Data Kecamatan Berhasil Diubah</b></div>');
			redirect('Master/wilayah');
		}
	}

	public function deleteKecamatanAction()
	{
		$data = array(
			'is_delete' => 1
		);
		$id_kecamatan = $this->input->post('id_kecamatan');
		$this->ModelWilayah->deleteKecamatan(base64_decode($id_kecamatan), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Kecamatan Berhasil Dihapus</b></div>');
		redirect('Master/wilayah');
	}

	public function addKelurahan()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Wilayah";
		$this->load->view('page/AddKelurahan', $data);
	}

	public function addKelurahanAction()
	{
		$this->form_validation->set_rules('kode_kecamatan', 'Nama Kecamatan', 'required');
		$this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'required');
		$this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Wilayah";
			$this->load->view('page/AddKelurahan', $data);
		}else{
			$data = array(
				'kode_kelurahan' => $this->input->post('kode_kelurahan'),
				'kode_kecamatan' => $this->input->post('kode_kecamatan'),
				'nama_kelurahan' => $this->input->post('nama_kelurahan'),
				'is_delete' => 0
			);
			$this->ModelWilayah->addKelurahan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Kelurahan Berhasil Ditambahkan</b></div>');
			redirect('Master/wilayah');
		}	
	}

	public function updateKelurahan($id_kelurahan = null){
		if (!isset($id_kelurahan)) redirect('Auth/block');

		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Jenis Wilayah";
		$data['kl'] = $this->ModelWilayah->getKelurahanById(base64_decode($id_kelurahan));
		$this->load->view('page/EditKelurahan', $data);
	}

	public function updateKelurahanAction()
	{
		$this->form_validation->set_rules('kode_kecamatan', 'Nama Kecamatan', 'required');
		$this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'required');
		$this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'required');
		$id_kelurahan = $this->input->post('id_kelurahan');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
			$data['kl'] = $this->ModelWilayah->getKelurahanById(base64_decode($id_kelurahan));
			$data['judul1'] = "Master";
			$data['judul2'] = "Master Jenis Wilayah";
			$this->load->view('page/EditKelurahan', $data);
		}else{
			$data = array(
				'kode_kelurahan' => $this->input->post('kode_kelurahan'),
				'kode_kecamatan' => $this->input->post('kode_kecamatan'),
				'nama_kelurahan' => $this->input->post('nama_kelurahan'),
				'is_delete' => 0
			);
			$this->ModelWilayah->updateKelurahan(base64_decode($id_kelurahan), $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check-circle"></i><b>Data Kelurahan Berhasil Diubah</b></div>');
			redirect('Master/wilayah');
		}
	}

	public function deleteKelurahanAction()
	{
		$data = array(
			'is_delete' => 1
		);
		$id_kelurahan = $this->input->post('id_kelurahan');
		$this->ModelWilayah->deleteKelurahan(base64_decode($id_kelurahan), $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-check-circle"></i><b>Data Kelurahan Berhasil Dihapus</b></div>');
		redirect('Master/wilayah');
	}

	public function changeAccess($id_level = null)
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['menu_all'] = $this->ModelMenu->getMenuAll();
		$data['kecamatan'] = $this->ModelWilayah->getKecamatanAll();
		$data['judul1'] = "Master";
		$data['judul2'] = "Master Menu";
		$data['level'] = $this->ModelMenu->getLevelById(base64_decode($id_level));
		$this->load->view('page/EditAkses', $data);
		// echo json_encode($data['akses']);
	}

	public function ChangeAksesAction()
	{
		$id_level = $this->input->get_post('id_level');
		$id_menu = $this->input->get_post('id_menu');

		$data = array(
			'id_level' => $id_level,
			'id_menu' => $id_menu
		);

		$hasil = $this->db->get_where('mr_akses_menu', $data);
		if ($hasil->num_rows() < 1) {
			$this->db->insert('mr_akses_menu', $data);
		}else{
			$this->db->delete('mr_akses_menu', $data);
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-primary"> <i class="icon fas fa-check-circle"></i><b>Akses Menu Berhasil Diubah</b></div>');
		// redirect('Master/changeAccess?id_level'.$id_level);
	}

}
