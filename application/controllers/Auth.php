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
				);				
				$this->session->set_userdata($params);
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

}
