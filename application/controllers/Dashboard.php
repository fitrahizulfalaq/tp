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

		// Redirect jika password masih default
		$this->load->model("validation_m");
		$password = $this->user_m->getAllBy("id",$this->session->id)->row("password");
		if ($password == sha1("12345678")) { redirect("pengaturan/setPassword");}
		
		// Menampilkan data Leaderboard
		$this->load->model("kunjungan_m");
		$data['leaderboard'] = $this->kunjungan_m->leaderboard($this->session->wilayah_kerja);

		// Data Rekam Trayek Harian (Untuk Keperluan Maps Titik per Lokasi)
		$dataMonth = $this->kunjungan_m->getByMonth(date("Y"),date("m"),$this->session->id);
		if ($dataMonth != null){
			$data['center'] = $dataMonth->row("lat").",".$dataMonth->row("lng");
			$datamarker = "";
			foreach ($dataMonth->result() as $key => $x) {
			    $datamarker = $datamarker."markers=size:mid%7Ccolor:0xff0000%7Clabel:0%7C".$x->lat."%2C".$x->lng."|&";
			}
			$data['markers'] = $datamarker;
		}
		$data['device'] = $this->validation_m->cekDevice($this->agent->agent_string(), $this->agent->platform(), $this->agent->browser());		
		$data['kunjungan'] = $dataMonth;

		// Data Statistik
		$data['k_lainnya'] = $this->kunjungan_m->getAllByType("lainnya",date("Y")."-".date("m"),$this->session->id);
		$data['k_ukm'] = $this->kunjungan_m->getAllByType("ukm",date("Y")."-".date("m"),$this->session->id);
		$data['k_koperasi'] = $this->kunjungan_m->getAllByType("koperasi",date("Y")."-".date("m"),$this->session->id);

		$data['title'] = "KITAPKU APPS";
		$this->templateadmin->load('template/dashboard','page/beranda/'.$this->session->tipe_user,$data);
	}
}
