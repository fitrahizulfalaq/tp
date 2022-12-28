<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('validation_m');
	}

	/*
		Template halaman login
	*/
	public function target()
	{		
        $data['title']="Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_input',$data);
	}
}
	