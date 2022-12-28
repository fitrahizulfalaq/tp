<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Target extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("kunjungan_m");
	}

	function index()
	{
		//Cek Hak Akses
		$akses = $this->session->tipe_user;
		if ($akses == "1"){
			//Cek Sudah Isi atau Belum
			$cek = $this->kunjungan_m->getTarget(date("Y"),$this->session->id);
			if ($cek->num_rows() != null){
				//Larikan ke halaman sudah upload
				redirect("target/data/");
			} else {
				//Larikan ke halaman upload
				redirect("target/tambah/");
			}
		} elseif ($akses == "2") {

		}		
	}

	function tambah()
	{
		// Validasi waktu: Format Ymd (Dimulai,Berakhir,Dialihkan kemana)
		timevalidation("20220101","20230105","target/data");

		$cek = $this->kunjungan_m->getTarget(date("Y"),$this->session->id);
		$cek->num_rows() != null ? redirect("target") : "";

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_modul.judul]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "TAMBAH TARGET SETAHUN";
			$this->templateadmin->load('template/dashboard', 'target/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK FILES
			$config['upload_path']          = 'assets/files/target_tahunan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 5000;
			$config['file_name']            = "TARGETTAHUNAN-".strtoupper($this->session->hp);

			$this->load->library('upload', $config);
			if (@$_FILES['file']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file')) {
					$post['file'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('target/tambah');
				}
			}

			$this->kunjungan_m->addTargetTahunan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Target Berhasil di Tambahkan');
			}
			redirect('target/data');
		}
	}

	function data()
	{
		$data['title'] = "DATA TARGET KINERJA";
		$this->templateadmin->load('template/dashboard','target/data',$data);
	}
	
	function open()
	{
		$tahun = $_GET['tahun'];
		$file = $this->kunjungan_m->getTarget($tahun,$this->session->id)->row("file");
		$filecontents = "/assets/files/target_tahunan/" . $file;

		$data['title'] = "Open";
		$data['url'] = base_url().$filecontents;
		$this->load->view('target/open',$data);
	}

	function download()
	{
		$tahun = $_GET['tahun'];
		$file = $this->kunjungan_m->getTarget($tahun,$this->session->id)->row("file");
		$filecontents = "/assets/files/target_tahunan/" . $file;
		redirect("".$filecontents);
	}

	function print()
	{
		// Ambil Data, yang dibutuhkan ID
		$tahun = $_GET['tahun'];
		$file = $this->kunjungan_m->getTarget($tahun,$this->session->id)->row("file");
		$filecontents = FCPATH . "/assets/files/target_tahunan/" . $file;
		exec($filecontents);
		redirect("target/data");
	}

}
