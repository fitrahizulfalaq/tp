<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Laporan";
		$this->templateadmin->load('template/dashboard','laporan/laporan_data',$data);	


	}

	public function cetaklaporan()
	{
		$data['title'] = "Cetak Laporan";
		$this->templateadmin->load('template/dashboard','laporan/cetak_laporan',$data);	


	}

}