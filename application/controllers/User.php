<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ModelUser');
		$this->load->model('ModelMenu');
		if ($this->session->userdata('status') != "login") {
			redirect('Auth/login');
		}
	}

	public function index()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Beranda";
		
		$this->load->view('page/User', $data);
	}

}
