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
		$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/listTp', $data);
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
		$data['header_script'] = "header/datatables-default";
		$data['footer_script'] = "footer/datatables-default";
		$this->templateadmin->load('template/dashboard', 'kunjungan/laporan/listDaerah', $data);
	}

	/*
	Controller untuk membuka, mendownload, dan mencetak laporan akhir
	*/
	function perintah()
	{
		$data['perintah'] = $_GET['aksi']; 
		$data['tahun'] = $_GET['tahun']; 
		$data['bulan'] = $_GET['bulan']; 
		$data['jenis'] = $_GET['jenis']; 
		$data['user_id'] = base64_decode($_GET['token']); 
		!isset($data) ? redirect("") : "";
		// Cek apakah sudah upload atau belum
		$file = $this->kunjungan_m->getLaporan($data['tahun'],$data['bulan'],$data['user_id']);
		$filecontents = "/assets/files/laporan/". $data['jenis'] . "/" . $file->row($data['jenis']);
		// Buka sesuai metode
		if ($file->num_rows() > 0){
			if ($data['perintah'] == "open"){
				$data['title'] = "Open";
				$data['url'] = base_url().$filecontents;
				$this->load->view('laporan/open',$data);
			} elseif ($data['perintah'] == "download"){
				redirect("".$filecontents);
			} elseif ($data['perintah'] == "print"){
				exec(FCPATH . $filecontents);
				redirect("laporan/listDaerah");
			}
		} else {
			$this->session->set_flashdata('danger', "Belum mengupload");
			redirect("laporan/listDaerah");
		}
	}

	function belumLogin()
    {
        $this->load->model("user_m");
        $dataUser = $this->user_m->getAllby("tipe_user","1");
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"),date("m"),date("d"),$data->id);
			$dataIzin = $this->kunjungan_m->getAllByTable("tb_izin","user_id",$data->id,date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                $kalimat = $data->nama.$data->hp." Belum login pada ".date("d-m-Y H:i:s")."<br>";
                echo $kalimat."<br>";
            }
        }
    }
}
