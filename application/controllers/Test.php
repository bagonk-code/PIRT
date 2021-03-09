<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function index()
	{
		$this->load->library('aesencrypt');
		$nama = 'Mohammad Iqbal Syauqi';
		
		$enkripsi = base64_encode($this->aesencrypt->cryptoJsAesEncrypt($this->config->item('keys'), $nama));
		$deskripsi = $this->aesencrypt->cryptoJsAesDecrypt($this->config->item('keys'), base64_decode($enkripsi));
		
		echo 'Asal : '. $nama;
		echo '<br>';
		echo '<br>';
		echo 'Enkripsi : ' . $enkripsi;
		echo '<br>';
		echo 'Deskripsi : ' . $deskripsi;
		
	}

	public function tanggal()
	{
		
		$tgl1 = "2020-12-10";
		$tgl2 = date('d / M / y', strtotime('+5 year', strtotime($tgl1)));
		echo 'Tanggal Sekarang : '.$tgl1;
		echo '<br>';
		echo 'Tanggal Ditambah 5 Tahun : '.$tgl2;
		echo '<br>';
		echo date('d F Y', strtotime('2016-03-20')); // Hasil 20 March 2016
		echo '<br>';
		echo date('d F Y'); // Hasil 17 December 2016
	}
}  