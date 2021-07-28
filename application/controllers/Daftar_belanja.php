<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_belanja extends CI_Controller {

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
		if(isset($_GET['status'])){
			$where = 'and rp_status='.$_GET['status'];
		}else{
			$where ='';
		}
		$data['daftar_os'] = $this->db->query("select rp_id,rp_no_pesanan,rp_qty,rp_total_harga,bd_gambar,rp_status,date_format(rp_created_date,'%d %M %Y %H:%i:%s') tgl_pesanan,rp_ongkir,rp_bukti_pembayaran from ringkasan_pesanan left join detail_pesanan on dp_ringkasan_id = rp_id left join barang_data on bd_id = dp_barang where rp_user =$id_user and rp_status=2 group by rp_id order by rp_created_date desc")->result();
		$data['daftar_belanja'] = $this->db->query("select rp_id,rp_no_pesanan,rp_qty,rp_total_harga,bd_gambar,rp_status,date_format(rp_created_date,'%d %M %Y %H:%i:%s') tgl_pesanan,rp_noresi from ringkasan_pesanan left join detail_pesanan on dp_ringkasan_id = rp_id left join barang_data on bd_id = dp_barang where rp_user =$id_user $where group by rp_id order by rp_created_date desc")->result();
		$data['daftar_status'] = $this->db->query("select rp_status,case rp_status when 1 then 'Pengecekan' when 2 then 'Menunggu Pembayaran' when 3 then 'Diproses' when 4 then 'Dikirim' when 5 then 'Selesai' end stat from ringkasan_pesanan group by rp_status order by rp_status")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('daftar_belanja',$data);
		$this->load->view('include/footer');
	}
	public function detail_daftar_belanja()
	{

		$id_user = $this->session->userdata('ud_id');
		$id_pesanan = $_GET['id_pesanan'];
		$data['ringkasan_belanja'] = $this->db->query("select *,date_format(rp_created_date,'%d %M %Y %H:%i:%s') tgl_pesanan from ringkasan_pesanan where rp_id = $id_pesanan")->result();
		$data['belanjaan'] = $this->db->query("select bd_nama_barang,dp_qty,dp_total_harga,bd_gambar from detail_pesanan left join barang_data on bd_id = dp_barang where dp_ringkasan_id =$id_pesanan")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('detail_daftar_belanja',$data);
		$this->load->view('include/footer');
	}
	public function invoice()
	{

		$id_user = $this->session->userdata('ud_id');
		$id_pesanan = $_GET['id_pesanan'];
		$data['ringkasan_belanja'] = $this->db->query("select *,date_format(rp_created_date,'%d %M %Y %H:%i:%s') tgl_pesanan from ringkasan_pesanan where rp_id = $id_pesanan")->result();
		$data['belanjaan'] = $this->db->query("select bd_nama_barang,dp_qty,dp_total_harga,bd_gambar,dp_total_harga/dp_qty harga_barang from detail_pesanan left join barang_data on bd_id = dp_barang where dp_ringkasan_id =$id_pesanan")->result();
		$this->load->view('include/header');
		$this->load->view('invoice',$data);
	}
}
