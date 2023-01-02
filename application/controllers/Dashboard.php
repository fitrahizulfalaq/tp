<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->load->model("user_m");
		$password = $this->user_m->getAllBy("id",$this->session->id)->row("password");
		if ($password == "7c222fb2927d828af22f592134e8932480637c0d") { redirect("pengaturan/setPassword");}
		
		$this->load->model("kunjungan_m");
		$data['leaderboard'] = $this->kunjungan_m->leaderboard($this->session->wilayah_kerja);
		// test($data['leaderboard']->result());
		$data['title'] = "KITAPKU APPS";
		$this->templateadmin->load('template/dashboard','page/beranda/'.$this->session->tipe_user,$data);
	}
}
