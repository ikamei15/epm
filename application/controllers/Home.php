<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['banner'] = $this->db->query("SELECT *,(select min(sb_id) from slide_banner) min_id_banner from slide_banner order by sb_id")->result();
		$data['terlaris'] = $this->db->query("SELECT dp_barang,sum(dp_qty) jml_barang,bd_gambar,bd_nama_barang,bd_harga,bd_deskripsi from detail_pesanan left join barang_data on bd_id = dp_barang group by dp_barang order by jml_barang desc")->result();
		$data['kategori1'] = $this->db->query("SELECT * from barang_data left join kategori_barang on kb_id = bd_kategori where kb_id = 1 order by bd_id desc limit 6")->result();
		$data['kategori2'] = $this->db->query("SELECT * from barang_data left join kategori_barang on kb_id = bd_kategori where kb_id = 2 order by bd_id desc limit 6")->result();
		$data['testimoni'] = $this->db->query("SELECT * from testimoni_pembeli order by tp_id desc limit 2")->result();
		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->load->view('home',$data);
		$this->load->view('include/footer');
	}
	public function hubungi_kami()
	{

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$notelp = $this->input->post('notelp');
		$pesan = $this->input->post('pesan');

		$insert = $this->db->query("INSERT INTO `epm`.`hubungi_kami` (`hk_id`, `hl_nama_lengkap`, `hk_email`, `hk_notelp`, `hk_pesan`, `hk_created_date`) VALUES (null, '$nama', '$email', '$notelp', '$pesan', NOW());
");
		echo "<script type='text/javascript'>window.alert('Terimakasih sudah menghubungi kami, Pesan berhasil terkirim.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
	}
		
}
