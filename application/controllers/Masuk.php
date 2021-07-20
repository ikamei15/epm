<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

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

 		if($this->session->userdata('status') == "login-bo"){
 			redirect(base_url().'backoffice');
 		}
 	}
	public function index()
	{
		if($this->session->userdata('status') == "login"){
 			redirect(base_url());
 		}
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');
	}

	public function login_act()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->db->query("SELECT * FROM user_data WHERE ud_email='$email' and ud_password = sha1('$password')")->row();

		if($cek){
		$id = $cek->ud_id;
		$gdata = $this->db->query("SELECT * from user_data where ud_id = $id")->row();
			$session = array(
				'ud_id' 		=> $cek->ud_id,
				'ud_nama'		=> $cek->ud_nama,
				'ud_email'		=> $cek->ud_email,
				'verified'		=> $cek->ud_verified,
				'status'	=> 'login'
			);
			$this->session->set_userdata($session);
			$this->db->query("UPDATE user_data SET ud_last_login = NOW() where ud_id = $id");
			redirect(base_url());
		}else{
			redirect(base_url()."masuk?alert=wrong");
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
