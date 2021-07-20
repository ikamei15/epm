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
        $recipient_admin = 'adammarulyanto@gmail.com';
        $param = $_GET['param'];

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();
       

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'adammarulyanto@gmail.com'; // user email
        $mail->Password = '192Uitai'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('adammarulyanto@gmail.com', ''); // user email
        $mail->addReplyTo('adammarulyanto@gmail.com', ''); //user email

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
            $mailContent = "<link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
                            <style type='text/css'>
                                *{
                                font-family: 'Open Sans', sans-serif;
                                text-align: center;
                                }
                            </style>

                            <h1>Pesanan Anda ".$pesanan->rp_no_pesanan." Menunggu Pembayaran</h1>
                            <p>Lakukan Pembayaran Maksimal 2x24 Jam.</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."pembayaran?pesanan=".$id_pesanan."'>Bayar Sekarang</a> </p>"; // isi email
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
            $mailContent = "<link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
                            <style type='text/css'>
                                *{
                                font-family: 'Open Sans', sans-serif;
                                text-align: center;
                                }
                            </style>

                            <h3>Pesanan ".$pesanan->rp_no_pesanan." Selesai Melakukan Pembayaran</h3>
                            <p>Ayo diperiksa bukti pembayarannya!</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."backoffice/pengecekan'>Lihat Pesanan</a> </p>"; // isi email
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
            $mailContent = "<link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
                            <style type='text/css'>
                                *{
                                font-family: 'Open Sans', sans-serif;
                                text-align: center;
                                }
                            </style>

                            <h3>Pesanan Anda ".$pesanan->rp_no_pesanan." Dalam Pengiriman</h3>
                            <p>Nomor Resi : ".$pesanan->rp_noresi."</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."daftar_belanja/detail_daftar_belanja?id_pesanan=".$pesanan->rp_id."'>Lihat Pesanan</a> </p>"; // isi email
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
            $mailContent = "<link rel='preconnect' href='https://fonts.googleapis.com'>
                            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
                            <style type='text/css'>
                                *{
                                font-family: 'Open Sans', sans-serif;
                                text-align: center;
                                }
                            </style>

                            <h3>Pesanan Anda ".$pesanan->rp_no_pesanan." Selesai</h3>
                            <p>Terima kasih sudah berbelanja di Eka Perkasa Mandiri</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."'>Belanja Lagi</a> </p>"; // isi email
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

                            <h3>Verifikasi Email</h3>
                            <p>Email anda terdaftar pada ecommerce kami, mohon lakukan verifikasi email sebelum melakukan pembelian.</p>
                            <p><a style='padding:10px 25px; margin:20px 0; border:0; background:#2980b9; color:#fff; cursor: pointer; font-weight: bold; text-decoration:none;' href='".base_url()."daftar/verifikasi?id=".$query->id_ud."'>Verifikasi Email</a> </p>"; // isi email
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

