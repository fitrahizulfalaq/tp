<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Validation_m extends CI_Model
{
    /*
		Untuk halaman login
		Login Biasa menggunakan login
		Login otp menggunakan kelas
			1. Cek HP (Validasi Nomor HP)
			2. Insert OTP (Memasukkan OTP ke Database)
			3. VelidationOTP (Memastikan OTP Benar)
	*/
	function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email',$post['username']);
		$this->db->where('password',sha1($post['password']));
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query; 
	}

    function cekHp()
    {
        $this->db->select('*');
		$this->db->from('tb_user');
		$this->db->like('hp', substr($post['hp'], "3", "15"));
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query;
    
	}

    function insertOTP()
    {
       $params['id'] =  $post['id'];
       $params['otp'] =  $post['otp'];
       
       $this->db->where('id', $params['id']);
       $this->db->update('tb_user', $params);
    }

    function validationOTP($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->like('hp', substr($this->session->hp, "3", "15"));
		$this->db->where('status', '1');
		$this->db->where('otp',$post['otp']);
		$query = $this->db->get();
		return $query;
	}

	/*
		Login with google
		Memeriksa kredensial google dengan email yang telah terdaftar di Database
		Jika kredensial sama, maka lanjut login. Jika Tidak, maka gagal
	*/
	function loginGoogle($email)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email', $email);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query;
	}

}
