<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

    public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_data',$data);	


	}

	public function addtarget()
	{
		$data['title'] = "Input Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_input',$data);	


	}

	public function edittarget()
	{
		$data['title'] = "Edit Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_edit',$data);	


	}

}