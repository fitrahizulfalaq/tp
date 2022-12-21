<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function profil()
	{
		$data['menu'] = "Profil";
		$this->templateadmin->load('template/detail','page/profil',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Profil Pengembang";
		$this->templateadmin->load('template/detail','page/pembuat',$data);
	}

	public function petunjuk()
	{
		$data['menu'] = "Petunjuk Penggunaan";
		$this->templateadmin->load('template/detail','page/petunjuk',$data);
	}

	public function menu($id = null)
	{
		$data['menu'] = "Halaman Statis";
		$id = $this->uri->segment("3");
		$this->templateadmin->load('template/dashboard', 'page/menu/'.$id, $data);
	}
}


