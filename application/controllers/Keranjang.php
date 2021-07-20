<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

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
		$id_user = $this->session->userdata('ud_id');
		$data['keranjang'] = $this->db->query("SELECT kr_id,kr_barang,kr_qty,bd_harga*kr_qty total_harga,bd_nama_barang,bd_gambar from keranjang left join barang_data on bd_id = kr_barang where kr_user = $id_user")->result();
		$data['ringskasan_krj'] = $this->db->query("SELECT sum(kr_qty) jml_barang,sum(bd_harga*kr_qty) total_harga from keranjang left join barang_data on bd_id = kr_barang where kr_user=$id_user")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('keranjang',$data);
		$this->load->view('include/footer');
	}

	public function tambah_keranjang()
	{
		$id_user = $this->session->userdata('ud_id');
		$id_barang = $_GET['id_barang'];
		$qty = $_POST['qty'];

		$cek = $this->db->query("SELECT * FROM keranjang WHERE kr_user='$id_user' and kr_barang = '$id_barang'")->row();

		if($qty==0){
			$this->db->query("DELETE from keranjang WHERE kr_user=$id_user and kr_barang=$id_barang");
			echo "<script type='text/javascript'>window.alert('Barang sudah di hapus dari keranjang.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}else if($cek){
			$this->db->query("UPDATE keranjang SET kr_qty = $qty WHERE kr_user=$id_user and kr_barang=$id_barang");
			echo "<script type='text/javascript'>window.alert('Keranjang sudah di perbarui.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}else{
			$this->db->query("INSERT INTO keranjang (kr_user, kr_barang, kr_qty) VALUES ($id_user, $id_barang, $qty);");
			echo "<script type='text/javascript'>window.alert('Barang sudah ditambahkan ke keranjang.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
		}
	}
}
