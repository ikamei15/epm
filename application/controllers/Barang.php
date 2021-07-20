<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		if($this->session->userdata('status')!="login"){
 			$id_user = $this->session->userdata('ud_id');
 		}
		$id_barang = $_GET['id_barang'];
		$data['data_barang'] = $this->db->query("SELECT barang_data.*,kb_nama_kategori,ifnull(kr_qty,1) jml_barang,ifnull(terjual,0) terjual from barang_data left join kategori_barang on kb_id = bd_kategori left join keranjang on kr_barang = bd_id and kr_user =1 left join (select dp_barang,sum(dp_qty) terjual from detail_pesanan group by dp_barang)dp on dp_barang = bd_id where bd_id = $id_barang")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('barang',$data);
		$this->load->view('include/footer');
	}
		
}
