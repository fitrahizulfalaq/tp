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
		$data['title'] = "Beranda";
		$this->templateadmin->load('template/dashboard','page/beranda',$data);
		// $this->load->view('template/dashboard');


	}
}
