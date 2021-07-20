<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

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
		$getorder = $_GET['order'];

		if($getorder=='termurah'){
			$order = 'order by bd_harga asc';
		}else if ($getorder=='termahal'){
			$order = 'order by bd_harga desc';
		}else if ($getorder=='terlaris'){
			$order = 'order by terjual desc';
		}else{
			$order = 'order by bd_id desc';
		}
		$data['search'] = $this->db->query("SELECT * from barang_data left join kategori_barang on kb_id = bd_kategori left join (select dp_barang,sum(dp_qty) terjual from detail_pesanan group by dp_barang)dp on dp_barang = bd_id $order")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('katalog',$data);
		$this->load->view('include/footer');
	}
}
