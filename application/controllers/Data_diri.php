<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_diri extends CI_Controller {

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
		$id_user = $this->session->userdata('ud_id');
		$data['data_diri'] = $this->db->query("SELECT * from user_data where ud_id=$id_user")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('data_diri',$data);
		$this->load->view('include/footer');
	}
	public function update()
	{
		$id = $this->session->userdata('ud_id');
		$nama = $this->input->post('nama');
		$notelp = $this->input->post('notelp');
		$alamat = $this->input->post('alamat');
		$kodepos = $this->input->post('kodepos');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if(empty($password)){
			$this->db->query("UPDATE `epm`.`user_data` SET `ud_nama` = '$nama', `ud_email` = '$email', `ud_alamat` = '$alamat', `ud_kodepos` = '$kodepos', `ud_notelp` = '$notelp', `ud_created_date` = NOW() WHERE `ud_id` = $id;");
			echo "<script type='text/javascript'>window.alert('Data diri sudah di update');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}else{
			$this->db->query("UPDATE `epm`.`user_data` SET `ud_nama` = '$nama', `ud_email` = '$email',ud_password=sha1('$password'), `ud_alamat` = '$alamat', `ud_kodepos` = '$kodepos', `ud_notelp` = '$notelp', `ud_created_date` = NOW() WHERE `ud_id` = $id;");
			echo "<script type='text/javascript'>window.alert('Data diri sudah di update');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}
	}
}
