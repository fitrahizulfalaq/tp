<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("kunjungan_m");
		$this->load->model("approval_m");
		$this->load->model("user_m");
		akses("koordinator");
	}

	public function index()
	{
		if ($this->session->tipe_user == "2") {
			redirect("laporan/listTp");
		} else {
			redirect("laporan/listDaerah");
		}
	}

	public function cetaklaporan()
	{
		$data['title'] = "Cetak Laporan";
		$this->templateadmin->load('template/dashboard', 'laporan/cetak_laporan', $data);
	}

	function listTP()
	{
		$data['title'] = "DATA TENAGA PENDAMPING";
		$data['row'] = $this->user_m->getAllBy("wilayah_kerja", "", $this->session->wilayah_kerja);
		$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/listTP', $data);
	}

	function detailTP($id = null)
	{
		if ($this->session->tipe_user < "3") { isMe($this->user_m->get($id)->row("wilayah_kerja"),$this->session->wilayah_kerja); }
		
		!isset($_POST['tahun']) ? $tahun = date("Y") : $tahun = $_POST['tahun'];
		!isset($_POST['bulan']) ? $bulan = date("m") : $bulan = $_POST['bulan'];
		!isset($_POST['user_id']) ? $id = $this->uri->segment("3") : $id = $_POST['user_id'];
		if ($id == null and $_POST['user_id'] == null) {
			redirect("laporan");
		}
		
		$data['title'] = "Kegiatan BULAN " . $bulan . " / " . $tahun;
		$data['row'] = $this->kunjungan_m->getByMonth($tahun, $bulan, $id);
		$data['tp'] = $this->user_m->get($id);
		$data['approval'] = $this->approval_m->getByMonth("approval", $tahun, $bulan, $id);
		// test($data['approval']->result());
		$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/detailTP', $data);
	}

	function detailLaporan($id)
	{
		$query = $this->kunjungan_m->getAllBy("id", $id);

		if ($query->num_rows() > 0) {
			$data['row'] = $query->row();
			$data['title'] = "DETAIL KUNJUNGAN";

			if ($query->row("tipe") != "lainnya") {
				$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/detailHasilUKM', $data);
			} else {
				$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/detailHasilLainnya', $data);
			}
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('kunjungan/data') . "';</script>";
		}
	}

	function accLaporanTP($id)
	{
		$tp = base64_decode($id);
		// Validation		
		akses("koordinator");
		isMe($this->session->wilayah_kerja, $this->user_m->get($tp)->row("wilayah_kerja"));

		$this->load->model("approval_m");
		$this->approval_m->accLaporan($tp);
		redirect("laporan/detailTP/" . $tp);
	}

	function listDaerah()
	{
		akses("admin");
		
		$data['title'] = "Data Laporan TP";
		if (isset($_POST['kota'])) {
			$this->db->where("tipe_user","1");
			$data['row'] = $this->user_m->getAllBy("wilayah_kerja", $_POST['kota']);
		} else {
			$this->db->where("status","1");
			$data['row'] = $this->user_m->getAllBy("tipe_user","1");
		}
		
		$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/listDaerah', $data);
	}
}
