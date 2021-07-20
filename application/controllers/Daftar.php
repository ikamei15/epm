<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
 		parent::__construct();

 		if($this->session->userdata('status')=="login-bo"){
 			redirect(base_url().'backoffice');
 		}
 	}
	
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('daftar');
		$this->load->view('include/footer');
	}

	public function daftar_act()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->db->query("SELECT * FROM user_data WHERE ud_email='$email'")->row();

		if($cek){
			echo "<script type='text/javascript'>window.alert('Email sudah digunakan.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}else{
			$this->db->query("INSERT INTO `epm`.`user_data` (`ud_id`, `ud_nama`, `ud_email`, `ud_password`) VALUES (NULL, '$nama', '$email', sha1('$password'));
");
			echo "<script type='text/javascript'>window.alert('Terima kasih sudah mendaftarkan akun, Mohon lakukan verifikasi dan melengkapi data diri sebelum melakukan pembelian');window.location.href = '".base_url()."mailer?param=verifcation&recipient=".$email."';</script>";
		}
	}

	public function ver()
	{
		
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('daftar_verifikasi');
		$this->load->view('include/footer');
	}

	public function suc_ver()
	{
		
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('verified');
		$this->load->view('include/footer');
	}

	public function verifikasi()
	{
		$id = $_GET['id'];

		$cek = $this->db->query("SELECT * FROM user_data WHERE sha1(ud_id)='$id'")->result();

		if($cek){
			$this->db->query("UPDATE `epm`.`user_data` set ud_verified='Y', ud_verified_date = NOW() where sha1(ud_id)='$id';");
			echo "<script type='text/javascript'>window.alert('Verifikasi Email Berhasil');window.location.href = '".base_url()."daftar/suc_ver';</script>";
		}else{
			echo "<script type='text/javascript'>window.alert('Verifikasi gagal, Mohon lakukan beberapa saat lagi');window.location.href = '".base_url()."masuk';</script>";
		}
	}
}
