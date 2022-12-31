<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model("validation_m");
	}

	public function setDevice()
	{
		$data['title'] = "Set Device";
		$data['row'] = $this->validation_m->cekDevice();
		$this->templateadmin->load('template/dashboard','pengaturan/setdevice',$data);
	}

	function saveDevice()
	{
		$device = $this->validation_m->cekDevice();
		$thisDevice = $this->validation_m->cekDevice($this->agent->agent_string(),$this->agent->platform(),$this->agent->browser());
		if ($this->agent->mobile() == "Nexus"){
			$this->session->set_flashdata('danger', 'Tidak Boleh menggunakan emulator');
			redirect("pengaturan/setDevice");
		} elseif ($device->num_rows() > 5) {
			$this->session->set_flashdata('danger', 'Device Sudah Yang di Daftarkan Telah Melebihi Batas Quota');
			redirect("pengaturan/setDevice");
		} elseif ($thisDevice->num_rows() > 0) {
			$this->session->set_flashdata('danger', 'Device Sudah Terdaftar');
			redirect("pengaturan/setDevice");
		} else {
			$this->validation_m->saveDevice();
			$this->session->set_flashdata('success', 'Device Berhasil di Daftarkan.');
			redirect("pengaturan/setDevice");
		}
	}
}
