<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

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

	public function index()
	{
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/home');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function user_data(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['user_data'] = $this->db->query("select * from user_data")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/user_data',$data);
		$this->load->view('backoffice/include/footer_bo');
	}
	public function semua_pesanan(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['semua_pesanan'] = $this->db->query("select * from ringkasan_pesanan order by rp_status asc,rp_created_date desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/semua_pesanan',$data);
		$this->load->view('backoffice/include/script_pesanan');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function pengecekan(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['pengecekan'] = $this->db->query("select * from ringkasan_pesanan left join user_data on ud_id = rp_user where rp_status in (1,2) order by rp_status asc,rp_created_date desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/pengecekan',$data);
		$this->load->view('backoffice/include/script_pesanan');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function diproses(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['diproses'] = $this->db->query("select * from ringkasan_pesanan left join user_data on ud_id = rp_user where rp_status =3 order by rp_status asc,rp_created_date desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/listproses',$data);
		$this->load->view('backoffice/include/script_pesanan');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function pengiriman(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['pengiriman'] = $this->db->query("select * from ringkasan_pesanan left join user_data on ud_id = rp_user where rp_status =4 order by rp_status asc,rp_created_date desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/pengiriman',$data);
		$this->load->view('backoffice/include/script_pesanan');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function pesanan_selesai(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['pesanan_selesai'] = $this->db->query("select * from ringkasan_pesanan where rp_status =5 order by rp_status asc,rp_created_date desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/pes_selesai',$data);
		$this->load->view('backoffice/include/script_pesanan');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function data_barang(){
		$url = $this->uri->segment(3); 
		$id = $this->uri->segment(4); 

 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['kategori'] = $this->db->query("select * from kategori_barang")->result();
		$data['kategori2'] = $this->db->query("select * from kategori_barang")->result();
		$data['data_barang'] = $this->db->query("select bd.*,kb_nama_kategori nama_kategori from barang_data bd left join kategori_barang on kb_id = bd_kategori")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/data_barang',$data);
		$this->load->view('backoffice/include/footer_bo');

		if(isset($_POST['submit'])){
			$nama_barang = $this->input->post('nama_barang');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga_barang');
			$desc = $this->input->post('desc');
			$stok = $this->input->post('stok');
			$berat = $this->input->post('berat');
			$path = $_FILES['gambar_barang']['name'];
			$target_dir = getcwd()."/assets/images/accesoris/";
			if($url=='tambah'){
				$basename = date("YmdHms").'.'.pathinfo($path, PATHINFO_EXTENSION);
				$target_file = $target_dir.$basename;

				$upload = move_uploaded_file($_FILES["gambar_barang"]["tmp_name"], $target_file);

				$run = $this->db->query("INSERT INTO `epm`.`barang_data`(`bd_id`, `bd_kategori`, `bd_nama_barang`, `bd_harga`, `bd_deskripsi`, `bd_stok`, `bd_berat`, `bd_gambar`) VALUES (NULL, $kategori, '$nama_barang', $harga, '$desc', $stok, $berat, '$basename');");
				echo "<script type='text/javascript'>window.alert('Tambah Barang Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";

			}else if($url=='edit'){

				$id_barang = $_POST['id_barang'];

				if($_FILES['gambar_barang']['size'] == 0){
					$run = $this->db->query("UPDATE `epm`.`barang_data` SET `bd_kategori` = $kategori, `bd_nama_barang` = '$nama_barang', `bd_harga` = $harga, `bd_deskripsi` = '$desc', `bd_stok` = $stok, `bd_berat` = $berat WHERE `bd_id` = $id_barang;");
				}else{
					$basename = date("YmdHms").'.'.pathinfo($path, PATHINFO_EXTENSION);
					$target_file = $target_dir.$basename;

					$upload = move_uploaded_file($_FILES["gambar_barang"]["tmp_name"], $target_file);


					$run = $this->db->query("UPDATE `epm`.`barang_data` SET `bd_kategori` = $kategori, `bd_nama_barang` = '$nama_barang', `bd_harga` = $harga, `bd_deskripsi` = '$desc', `bd_stok` = $stok, `bd_berat` = $berat, `bd_gambar` = '$basename' WHERE `bd_id` = $id_barang;");
				}
				echo "<script type='text/javascript'>window.alert('Update Barang Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}
		if($url=='hapus'){
			echo "<script type='text/javascript'>
			if (confirm('Anda yakin hapus barang?')) {
			  // Save it!
			".$this->db->query("DELETE from barang_data WHERE `bd_id` = $id")."
			  window.location.href = '".base_url()."backoffice/data_barang';
			} else {
			  // Do nothing!
			  window.location.href = '".base_url()."backoffice/data_barang';
			}
			</script>";
		}
	}
	public function kategori(){
		$url = $this->uri->segment(3); 
		$id = $this->uri->segment(4); 

 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['kategori'] = $this->db->query("select * from kategori_barang")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/kategori',$data);
		$this->load->view('backoffice/include/footer_bo');

		if(isset($_POST['submit'])){
			$kategori = $this->input->post('kategori');
			if($url=='tambah'){
				$run = $this->db->query("INSERT INTO `epm`.`kategori_barang`(`kb_id`, `kb_nama_kategori`, `kb_created_date`) VALUES (NULL, '$kategori', NOW());
");
				echo "<script type='text/javascript'>window.alert('Tambah Kategori Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";

			}else if($url=='edit'){
				$run = $this->db->query("UPDATE `epm`.`kategori_barang` SET `kb_nama_kategori` = $kategori, `kb_created_date` = NOW() WHERE `kb_id` = $id;
");
				echo "<script type='text/javascript'>window.alert('Update Kategori Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}
		if($url=='hapus'){
			echo "<script type='text/javascript'>
			if (confirm('Anda yakin hapus barang?')) {
			  // Save it!
			".$this->db->query("DELETE from kategori_barang WHERE `kb_id` = $id")."
			  window.location.href = '".base_url()."backoffice/kategori';
			} else {
			  // Do nothing!
			  window.location.href = '".base_url()."backoffice/kategori';
			}
			</script>";
		}
	}

	public function banner(){
		$url = $this->uri->segment(3); 
		$id = $this->uri->segment(4); 

 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['banner'] = $this->db->query("select * from slide_banner")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/banner',$data);
		$this->load->view('backoffice/include/footer_bo');

		if(isset($_POST['submit'])){
			$banner = $this->input->post('banner');
			$path = $_FILES['gambar_banner']['name'];
			$target_dir = getcwd()."/assets/images/banner/";
			if($url=='tambah'){
				$basename = date("YmdHms").'.'.pathinfo($path, PATHINFO_EXTENSION);
				$target_file = $target_dir.$basename;

				$upload = move_uploaded_file($_FILES["gambar_banner"]["tmp_name"], $target_file);

				$run = $this->db->query("INSERT INTO `epm`.`slide_banner`(`sb_id`, `sb_gambar`, `sb_created_date`) VALUES (NULL, '$basename', NOW());");
				echo "<script type='text/javascript'>window.alert('Tambah Banner Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";

			}else if($url=='edit'){
				if($_FILES['gambar_banner']['size'] == 0){
					
				}else{
					$basename = date("YmdHms").'.'.pathinfo($path, PATHINFO_EXTENSION);
					$target_file = $target_dir.$basename;

					$upload = move_uploaded_file($_FILES["gambar_banner"]["tmp_name"], $target_file);


					$run = $this->db->query("UPDATE `epm`.`slide_banner` SET `sb_gambar` = '$banner', `sb_created_date` = NOW() WHERE `sb_id` = $id;");
				}
				echo "<script type='text/javascript'>window.alert('Update Banner Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}
		if($url=='hapus'){
			echo "<script type='text/javascript'>
			if (confirm('Anda yakin hapus banner?')) {
			  // Save it!
			".$this->db->query("DELETE from slide_banner WHERE `sb_id` = $id")."
			  window.location.href = '".base_url()."backoffice/banner';
			} else {
			  // Do nothing!
			  window.location.href = '".base_url()."backoffice/banner';
			}
			</script>";
		}
	}
	public function testimoni(){
		$url = $this->uri->segment(3); 
		$id = $this->uri->segment(4); 

 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['testimoni'] = $this->db->query("select * from testimoni_pembeli order by tp_id desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/testimoni',$data);
		$this->load->view('backoffice/include/footer_bo');

		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama');
			$testimoni = $this->input->post('testimoni');
			if($url=='tambah'){
				$run = $this->db->query("INSERT INTO `epm`.`testimoni_pembeli` (`tp_id`, `tp_nama`, `tp_testimoni`, `tp_created_date`) VALUES (NULL, '$nama', '$testimoni', NOW());");
				echo "<script type='text/javascript'>window.alert('Tambah Testimoni Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";

			}else if($url=='edit'){
				$run = $this->db->query("UPDATE `epm`.`testimoni_pembeli` SET `tp_nama` = '$nama', `tp_testimoni` = '$testimoni', `tp_created_date` = NOW() WHERE `tp_id` = $id;");
				echo "<script type='text/javascript'>window.alert('Update Testimoni Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}
		if($url=='hapus'){
			echo "<script type='text/javascript'>
			if (confirm('Anda yakin hapus Testimoni?')) {
			  // Save it!
			".$this->db->query("DELETE from testimoni_pembeli WHERE `tp_id` = $id")."
			  window.location.href = '".base_url()."backoffice/testimoni';
			} else {
			  // Do nothing!
			  window.location.href = '".base_url()."backoffice/testimoni';
			}
			</script>";
		}
	}

	public function hubungi_kami(){
		$url = $this->uri->segment(3); 
		$id = $this->uri->segment(4); 

 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}
		$data['hubungi_kami'] = $this->db->query("select * from hubungi_kami order by hk_id desc")->result();
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/include/navbar_bo');
		$this->load->view('backoffice/hubungi_kami',$data);
		$this->load->view('backoffice/include/footer_bo');

		if($url=='hapus'){
			echo "<script type='text/javascript'>
			if (confirm('Anda yakin hapus Testimoni?')) {
			  // Save it!
			".$this->db->query("DELETE from testimoni_pembeli WHERE `tp_id` = $id")."
			  window.location.href = '".base_url()."backoffice/testimoni';
			} else {
			  // Do nothing!
			  window.location.href = '".base_url()."backoffice/testimoni';
			}
			</script>";
		}
	}

	public function login(){
		$this->load->view('backoffice/include/header_bo');
		$this->load->view('backoffice/login');
		$this->load->view('backoffice/include/footer_bo');
	}
	public function update_ongkir(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}

 		$nopesanan = $this->input->post('nopesanan');
		$ongkir = $this->input->post('ongkir');
		$id_pesanan = $this->input->post('id_pesanan');

 		$run = $this->db->query("UPDATE ringkasan_pesanan set rp_ongkir = $ongkir where rp_id = $id_pesanan");

 		if($run){
 			echo "<script type='text/javascript'>window.alert('Update ongkir pesanan $nopesanan berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 		}else{
 			echo "<script type='text/javascript'>window.alert('Update ongkir gagal, mohon hubungi administator');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 		}
	}


	public function update_noresi(){
 		if($this->session->userdata('status')!="login-bo"){
 			redirect(base_url().'backoffice/login');
 		}

 		$nopesanan = $this->input->post('nopesanan');;
		$noresi = $this->input->post('noresi');
		$id_pesanan = $this->input->post('id_pesanan');

 		$run = $this->db->query("UPDATE ringkasan_pesanan set rp_noresi = $noresi where rp_id = $id_pesanan");

 		if($run){
 			echo "<script type='text/javascript'>window.alert('Update Nomor Resi pada Pesanan $nopesanan Berhasil.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 		}else{
 			echo "<script type='text/javascript'>window.alert('Update Nomor Resi pada Pesanan $nopesanan Gagal, mohon hubungi administator');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 		}
	}

	public function update_status(){
		$status = $_GET['status'];
		$id_pesanan = $_GET['id_pesanan'];
		$query_update = "UPDATE ringkasan_pesanan set rp_status = rp_status+1 where rp_id = $id_pesanan";
		$query_cek =$this->db->query("SELECT * from ringkasan_pesanan where rp_id = $id_pesanan")->row();

 		if($query_cek){
 			if($status==1){
				$this->db->query($query_update);
 				echo "<script type='text/javascript'>window.alert('Pemeriksaan selesai, menunggu pembayaran dari customer.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 			}else if ($status==2){
				$this->db->query($query_update);
 				echo "<script type='text/javascript'>window.alert('Pemeriksaan Bukti Transfer Selesai, Pesanan dapat di proses di halaman Proses');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 			}else if ($status==3){
 				if(is_null($query_cek->rp_noresi)){
 					echo "<script type='text/javascript'>window.alert('Pastikan no Resi terisi.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 				}else{
				$this->db->query($query_update);
 				echo "<script type='text/javascript'>window.alert('Pemrosesan pesanan selesai, pesanan siap dikirim!.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 				}
 			}else if ($status==4){
				$this->db->query($query_update);
 				echo "<script type='text/javascript'>window.alert('Pesanan Selesai!.');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 			}
 		}else{
 			echo "<script type='text/javascript'>window.alert('Update Nomor Resi pada Pesanan $nopesanan Gagal, mohon hubungi administator');window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
 		}

	}

	public function login_act()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->db->query("SELECT * FROM bo_users WHERE bu_username='$username' and bu_password = sha1('$password')")->row();

		if($cek){
		$id = $cek->bu_id;
		$gdata = $this->db->query("SELECT * from bo_users where bu_id = $id")->row();
			$session = array(
				'id' 		=> $cek->bu_id,
				'nama'		=> $cek->bu_name,
				'status'	=> 'login-bo'
			);
			$this->session->set_userdata($session);
			$this->db->query("UPDATE bo_users SET bu_last_login = NOW() where bu_id = $id");
			redirect(base_url());
		}else{
			redirect(base_url()."backoffice/login?alert=wrong");
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'backoffice');
	}
}
