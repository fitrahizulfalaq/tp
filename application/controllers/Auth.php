<?php
ob_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('page/login');
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
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,
					'tempat_lahir' => $row->tempat_lahir,
					'tanggal_lahir' => $row->tanggal_lahir,
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
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
