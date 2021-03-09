<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		loadAttrMaster();
		isLoggedIn();
	}

	private function config_upload(){
		$config = [];
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']  = '2048';
		$config['encrypt_name']  = TRUE;
		return $config;
	}

	public function uploadFile()
	{
		$data['user'] = $this->ModelUser->getUserByEmail();
		$data['menu'] = $this->ModelMenu->getMenu();
		$data['judul1'] = "Pengaturan";
		$data['judul2'] = "Database";
		$this->load->view('page/Coba', $data);
	}

	public function uploadFileAction()
	{
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->ModelUser->getUserByEmail();
			$data['menu'] = $this->ModelMenu->getMenu();
			$data['judul1'] = "Pengaturan";
			$data['judul2'] = "Database";
			$this->load->view('page/Coba', $data);
		}else{
			// $config['upload_path'] = './uploads/';
			// $config['allowed_types'] = 'gif|jpg|png';
			// $config['max_size']  = '2048';
			
			$this->load->library('upload', $this->config_upload());

			$this->upload->do_upload('file1');
			$file1 = $this->upload->data('file_name');
			// echo "<pre>";
			// print_r($file1);
			// echo "</pre>";
         
			$this->upload->do_upload('file2');
			$file2 = $this->upload->data('file_name');
			// echo "<pre>";
			// print_r($file2);
			// echo "</pre>";

			$ket = $this->input->post('ket');
			$data = array(
				'ket' => $ket,
				'file1' => $file1,
				'file2' => $file2
			);
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			// $this->db->insert('coba', $data);
			// echo "sukses";
		}	
	}

}
