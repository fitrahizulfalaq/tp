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
	
	function listTP()
	{
		akses("koordinator");

		$this->load->model("user_m");
		$data['title'] = "DATA TENAGA PENDAMPING";
		$data['row'] = $this->user_m->getAllBy("wilayah_kerja","",$this->session->wilayah_kerja);
		$this->templateadmin->load('template/dashboard','laporan/listTP',$data);	
	}

	function listWilayah()
	{
		akses("admin");

		$this->load->model("user_m");
		$data['title'] = "DATA WILAYAH KERJA";
		$data['row'] = $this->user_m->getAllBy("wilayah_kerja","",$this->session->wilayah_kerja);
		$this->templateadmin->load('template/dashboard','laporan/listTP',$data);	
	}

}