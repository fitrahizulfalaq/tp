<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('validation_m');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('page/login');
	}
	
	public function loginOTP()
	{
		check_already_login();
		$this->load->view('page/loginOTP');
	}

	public function loginOTPConfirm()
	{
		check_already_login();
		$this->load->view('page/loginOtpConfirm');
	}

	public function logout()
	{
		$params = array('id','username','tipe_user','date_now');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$query = $this->validation_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'hp' => $row->hp,
					'email' => $row->email,
					'tempat_lahir' => $row->tempat_lahir,
					'tgl_lahir' => $row->tgl_lahir,
					'domisili' => $row->domisili,
					'nik' => $row->nik,
					'wilayah_kerja' => $row->wilayah_kerja,
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				// $kalimat = "Terima kasih telah membuka logbook UPTKUKM Jatim, *".$row->nama."*\n\nSelamat Berkerja Penuh Khidmat untuk Lembaga, Bangsa, dan Negara";
				// $this->fungsi->sendWA("0".$row->hp,$kalimat);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Login Gagal');
				redirect("auth/login");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('auth/login');
		}
	}

	public function processotp()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$this->load->library('wa');

			$query = $this->user_m->getotp($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
				);
				$params['otp'] = rand(100000,999999);
				$this->session->set_userdata($params);
				$kalimat = "Kode OTP KAMU : ".$params['otp'];			
				$this->wa->waWhacenter(hp($post['hp']),$kalimat);
				$this->user_m->insertOtp($params);
				redirect('auth/loginOTPConfirm');
			} else {
				$this->session->set_flashdata('danger','Nomor tidak ditemukan');
				redirect("auth/loginOTP");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('auth/login');
		}
	}
	
	/*
		Perintah login by Google.
		Cukup arahkan ke url base_url(auth/google);
	*/
	function google()
	{
		// Konfigurasi kredensial google
        $clientID = '916270909408-c3pap08k09p2bnsdd0bp6ga6bb4evio4.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url().'auth/google';

        // Buat Perintah Request ke API Google
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");

        // Koneksikan sesuai alur kredensial google
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // dapatkan info google
            $google_oauth = new Google_Service_Oauth2($client);
            $data = $google_oauth->userinfo->get();
            $email=  $data->email;
			$this->load->model("validation_m");
            $query = $this->validation_m->loginGoogle($email);			
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Email Tidak Terdaftar');
				redirect("auth/login");
			}
        } else {
			//Jika gagal / belum diarahkan untuk login
            redirect($client->createAuthUrl());
        }
	}
}
