<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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
		$data['ringskasan_krj'] = $this->db->query("SELECT sum(kr_qty) jml_barang,sum(bd_harga*kr_qty) total_harga,ud_alamat,ud_notelp,ud_kodepos from keranjang left join user_data on ud_id = kr_user left join barang_data on bd_id = kr_barang where kr_user=$id_user")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar-checkout');
		$this->load->view('checkout',$data);
		$this->load->view('include/footer');
	}
	public function pesan()
	{
		$id_user = $this->session->userdata('ud_id');
		$penerima = $_POST['penerima'];
		$alamat = $_POST['alamat'];
		$notelp = $_POST['notelp'];
		$kodepos = $_POST['kodepos'];

		$cek_stok = $this->db->query("SELECT 1 from keranjang left join barang_data on bd_id = kr_barang where kr_user = $id_user and kr_qty > bd_stok")->result();

		if($cek_stok){
			echo "<script type='text/javascript'>window.alert('Stok barang tidak cukup, mohon periksa kembali pesanan anda.');window.location.href = '". base_url() ."keranjang';</script>";
		}else{
			$this->db->query("INSERT INTO ringkasan_pesanan (rp_user,rp_no_pesanan,rp_qty,rp_total_harga,rp_penerima,rp_alamat,rp_kodepos,rp_notelp,rp_bukti_pembayaran,rp_status,rp_tgl_pembayaran,rp_created_date)
								select
								kr_user rp_user,
								concat('INV',date_format(curdate(),'%Y%m'),kr_user,seq_pesanan) rp_no_pesanan,
								sum(kr_qty) rp_qty,
								sum(bd_harga*kr_qty) rp_total_harga,
								'$penerima' rp_penerima,
								'$alamat' rp_alamat,
								$kodepos rp_kodepos,
								$notelp rp_notelp,
								NULL rp_bukti_pembayaran,
								1 rp_status,
								NULL rp_tgl_pembayaran,
								NOW() rp_created_date
								from
								keranjang
								left join barang_data on bd_id = kr_barang
								join (select count(1)+1 seq_pesanan from ringkasan_pesanan where rp_user = $id_user) rp
								where
								kr_user=$id_user;");
			$this->db->query("INSERT INTO detail_pesanan
								select
								NULL dp_id,
								max_rp_id dp_ringkasan_id,
								kr_user dp_user,
								kr_barang dp_barang,
								kr_qty dp_qty,
								bd_harga*kr_qty dp_total_harga,
								NOW() rp_created_date
								from
								keranjang
								left join barang_data on bd_id = kr_barang
								join (select max(rp_id) max_rp_id from ringkasan_pesanan where rp_user = $id_user) rp
								where
								kr_user=$id_user");
			$this->db->query("UPDATE
								barang_data
								inner join keranjang on kr_barang = bd_id and kr_user = 1
								set bd_stok = bd_stok-kr_qty");
			$this->db->query("DELETE from keranjang where kr_user=$id_user");
			redirect(base_url().'mailer?param=checkout');
		}
	}
}
