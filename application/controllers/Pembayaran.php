<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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

 		if($this->session->userdata('status')!="login"){
 			redirect(base_url().'masuk');
 		}else if($this->session->userdata('verified')!="Y"){
 			redirect(base_url().'daftar/ver');
 		}
 	}
	public function index()
	{
		$id_pesanan = $_GET['pesanan'];
		$data['pembayaran'] = $this->db->query("select * from ringkasan_pesanan where rp_id = $id_pesanan")->result();
		$query = $this->db->query("select * from ringkasan_pesanan where rp_id = $id_pesanan")->row();

		if($query->rp_user == $this->session->userdata('ud_id')){
		$this->load->view('include/header');
		$this->load->view('include/navbar-checkout');
		$this->load->view('pembayaran',$data);
		$this->load->view('include/footer');
		}else{
			redirect(base_url());
		}
	}
	public function upload_bukti_transfer(){
		$id_pesanan = $_GET['pesanan'];
		$target_dir = getcwd()."/assets/bukti_transfer/";
		$basename = date("YmdHms");
		$target_file = $target_dir.$basename;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if ($uploadOk == 0) {
			echo "<script type='text/javascript'>window.alert('Error.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";	
		}else {
			$upload = move_uploaded_file($_FILES["bukti_transfer"]["tmp_name"], $target_file);
			if ($upload) {
				$this->db->query("UPDATE ringkasan_pesanan set rp_bukti_pembayaran='$basename' where rp_id = $id_pesanan");
				echo "<script type='text/javascript'>window.alert('Upload bukti transfer berhasil, mohon pantau selalu pesanan anda.');window.location.href = '".base_url()."mailer?param=sudah_upload&id_pesanan=".$id_pesanan."';</script>";
			} else {
				echo "<script type='text/javascript'>window.alert('Upload bukti transfer gagal, mohon periksa kembali gambar anda.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}
	}
}
