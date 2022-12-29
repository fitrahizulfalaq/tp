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

    public function targetdata()
	{		
        $data['title']="Data Target Kerja";
		$this->templateadmin->load('template/dashboard','target/target_data',$data);
	}

	public function kunjunganinput()
	{		
        $data['title']="Data Target Kerja";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_input',$data);
	}

	public function kunjunganeditukm()
	{		
        $data['title']="Form Edit Kunjungan";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_edit_ukmkoperasi',$data);
	}

	public function kunjunganeditkantor()
	{		
        $data['title']="Form Edit Kunjungan";
		$this->templateadmin->load('template/dashboard','kunjungan/draft/kunjungan_edit_kantor',$data);
	}

	public function koordinatordata()
	{		
        $data['title']="DATA TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/tp_data',$data);
	}

	public function koordinatorlaporan()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/laporankoor_data',$data);
	}

	public function koordinatorapprove()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/approve_data',$data);
	}

	public function koordinatordetail()
	{		
        $data['title']="LAPORAN TENAGA PENDAMPING";
		$this->templateadmin->load('template/dashboardkoor','koordinator/detailkunjunganukm_data',$data);
	}

}
	