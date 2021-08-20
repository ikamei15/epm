<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer extends CI_Controller {

	public function __construct() { 
                parent::__construct(); 
                
                require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                 
    }
    function index() 
    {

        // TEMPLATE

        function template($judul='',$pesan = '',$link ='')
        {
            echo "In bar(); argument was '$judul'.<br />\n";
        }

        $recipient_admin = 'ikawahyu4118@gmail.com';
        $param = $_GET['param'];

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();
       

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'ikawahyu4118@gmail.com'; // user email
        $mail->Password = 'ikabsi94'; // password email
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('ikawahyu4118@gmail.com', ''); // user email
        $mail->addReplyTo('ikawahyu4118@gmail.com', ''); //user email

        if($param=='checkout'){
            $recipient =  $recipient_admin;
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = '[EPM] Pesanan Baru!'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mailContent = "<link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
                            <style type='text/css'>
                                *{
                                font-family: 'Open Sans', sans-serif;
                                text-align: center;
                                }
                            </style>

                            <h1>Ada Pesanan Baru !!</h1>
                            <p>Ayo periksa pesanan barunya.</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."backoffice/pengecekan'>Lihat Pesanan</a> </p>"; // isi email
            $email_vars = array(
                'judul' => 'Pesanan Baru',
                'judul2' => 'Pesanan Baru Siap di Proses',
                'pesan' => 'Ayo periksa pesanan barunya.',
                'link' => base_url().'backoffice/pengecekan',
                'tombol' => 'Lihat Pesanan',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'tq_pesan');
            }
        }else if($param=='menunggu_pembayaran'){
            $recipient =  $_GET['recipient'];
            $id_pesanan =  $_GET['id_pesanan'];
            $status =  $_GET['status'];

            $pesanan = $this->db->query("SELECT * from ringkasan_pesanan where rp_id = $id_pesanan")->row();
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = 'EPM - Pesanan Anda '.$pesanan->rp_no_pesanan.' -Menunggu Pembayaran'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $email_vars = array(
                'judul' => 'Menunggu Pembayaran',
                'judul2' => 'Pesanan Anda '.$pesanan->rp_no_pesanan.' Menunggu Pembayaran',
                'pesan' => 'Lakukan Pembayaran Maksimal 2x24 Jam.',
                'link' => base_url()."pembayaran?pesanan=".$id_pesanan,
                'tombol' => 'Bayar Sekarang',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'backoffice/update_status?id_pesanan='.$id_pesanan.'&status='.$status);
            }
        }else if($param=='sudah_upload'){
            $recipient =  $recipient_admin;
            $id_pesanan =  $_GET['id_pesanan'];

            $pesanan = $this->db->query("SELECT * from ringkasan_pesanan where rp_id = $id_pesanan")->row();
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = '[EPM] - Pesanan '.$pesanan->rp_no_pesanan.' - Selesai Melakukan Pembayaran'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $email_vars = array(
                'judul' => 'Customer Melakukan Pembayaran',
                'judul2' => 'Pesanan '.$pesanan->rp_no_pesanan.' Selesai Melakukan Pembayaran',
                'pesan' => 'Ayo diperiksa bukti pembayarannya!',
                'link' => base_url().'backoffice/pengecekan',
                'tombol' => 'Lihat Pesanan',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'daftar_belanja');
            }
        }else if($param=='pengiriman'){
            $recipient =  $_GET['recipient'];
            $id_pesanan =  $_GET['id_pesanan'];

            $pesanan = $this->db->query("SELECT * from ringkasan_pesanan where rp_id = $id_pesanan")->row();
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = 'EPM - Pesanan Anda '.$pesanan->rp_no_pesanan.' - Dalam Pengiriman!'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $email_vars = array(
                'judul' => 'Pesanan Anda Dalam Pengiriman',
                'judul2' => 'Pesanan '.$pesanan->rp_no_pesanan. 'Dalam Pengiriman',
                'pesan' => 'Berikut Nomor Resi Pengiriman Pesanan Anda<br>No Resi : '.$pesanan->rp_noresi,
                'link' => base_url().'daftar_belanja/detail_daftar_belanja?id_pesanan='.$pesanan->rp_id,
                'tombol' => 'Lihat Pesanan',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'backoffice/update_status?id_pesanan='.$pesanan->rp_id.'&status='.$pesanan->rp_status);
            }
        }else if($param=='selesai'){
            $recipient =  $_GET['recipient'];
            $id_pesanan =  $_GET['id_pesanan'];

            $pesanan = $this->db->query("SELECT * from ringkasan_pesanan where rp_id = $id_pesanan")->row();
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = 'EPM - Pesanan Anda '.$pesanan->rp_no_pesanan.' - Selesai!'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $email_vars = array(
                'judul' => 'Pesanan Anda Selesai',
                'judul2' => 'Pesanan Anda'.$pesanan->rp_no_pesanan. 'Telah Selesai',
                'pesan' => 'Terima kasih sudah berbelanja di Eka Perkasa Mandiri.',
                'link' => base_url(),
                'tombol' => 'Belanja Lagi',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'backoffice/update_status?id_pesanan='.$pesanan->rp_id.'&status='.$pesanan->rp_status);
            }
        }else if($param=='verifcation'){
            $recipient =  $_GET['recipient'];

            $query = $this->db->query("SELECT sha1(ud_id) id_ud from user_data where ud_email = '$recipient'")->row();
            // Add a recipient
            $mail->addAddress($recipient); //email tujuan pengiriman email

            // Email subject
            $mail->Subject = 'EPM - Verifikasi Email'; //subject email

            // Set email format to HTML
            $mail->isHTML(true);
            $link = base_url().'daftar/verifikasi?id='.$query->id_ud;
            $email_vars = array(
                'judul' => 'Verifikasi Email',
                'judul2' => 'Verifikasi',
                'pesan' => 'Email anda terdaftar pada ecommerce kami, mohon lakukan verifikasi email sebelum melakukan pembelian.',
                'link' => $link,
                'tombol' => 'Verifikasi Email',
            );
            $mailContent = file_get_contents(base_url().'assets/template/mailer.html');

            if(isset($email_vars)){
                foreach($email_vars as $k=>$v){
                    $mailContent = str_replace('{'.strtoupper($k).'}', $v, $mailContent);
                }
            }
            $mail->Body = $mailContent;

            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                redirect(base_url().'daftar/ver');
            }
        }
    }

}

