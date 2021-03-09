<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ModelAuth');
	}

	public function register()
	{
		$data['kota'] = $this->ModelAuth->getKota();
		$data['kecamatan'] = $this->ModelAuth->getKecamatan();
		$data['kelurahan'] = $this->ModelAuth->getKelurahan();
		$this->load->view('page/Register', $data);
		// echo json_encode($data['kecamatan']);
	}

	public function actionRegister()
	{
		$this->form_validation->set_rules('nama_user', 'Penanggungjawab', 'required');
		$this->form_validation->set_rules('nama_perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[mr_user.email]|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[12]|matches[c_password]|trim');
		$this->form_validation->set_rules('c_password', 'Konfirmasi Password', 'required|min_length[3]|max_length[12]|matches[password]|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
				
		if ($this->form_validation->run() == false) {
			$data['kota'] = $this->ModelAuth->getKota();
			$data['kecamatan'] = $this->ModelAuth->getKecamatan();
			$data['kelurahan'] = $this->ModelAuth->getKelurahan();
			$this->load->view('page/Register', $data);
		}else{
			$data_user = array(
				'nama_user' => $this->input->post('nama_user'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),  
				'email' => htmlspecialchars($this->input->post('email')),  
				'alamat' => $this->input->post('alamat'),  
				'kota' => $this->input->post('kota'),  
				'kecamatan' => $this->input->post('kecamatan'),  
				'kelurahan' => $this->input->post('kelurahan'),  
				'rt' => $this->input->post('rt'),  
				'rw' => $this->input->post('rw'),  
				'no_hp' => $this->input->post('no_hp'),  
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 2,
				'is_active' => 1,
				'is_delete' => 1
			);
			$this->ModelAuth->register($data_user);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check"></i><b>Pendaftaran Berhasil,</b> Silahkan Masuk Untuk Melanjutkan.</div>');
			redirect('Auth/login');
		}
	}

	public function login()
	{
		$this->load->view('page/login');
	}

	public function actionLogin()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('page/Login');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('mr_user',['email' => $email])->row_array();
			
			if ($user) {
				if ($user['is_active'] == 1) {
					if (password_verify($password, $user['password'])) {
						$data = array(
							'email' => $user['email'],
							'level' => $user['level'],
							'status' => 'login'
						);						
						$this->session->session_expiration = 7200;
						$this->session->set_userdata($data);
						redirect('User');
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> <i class="icon fas fa-exclamation-triangle"></i><b>Password Salah,</b> Silahkan Isikan Password Yang Benar.</div>');
						redirect('Auth/login');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-info"> <i class="icon fas fa-info"></i><b>Email Belum Diaktivasi,</b> Silahkan Aktivasi Terlebih Dahulu.</div>');
					redirect('Auth/login');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> <i class="icon fas fa-ban"></i><b>Email Tidak Terdaftar,</b> Silahkan Daftar Terlebih Dahulu.</div>');
				redirect('Auth/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"> <i class="icon fas fa-check"></i><b>Anda Telah Keluar,</b> Terimakasih.</div>');
		redirect('Auth/login');
	}

	public function block()
	{
		$this->load->view('page/Block');
	}
}
