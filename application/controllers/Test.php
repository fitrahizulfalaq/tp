<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Test extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('page/login');
	}

	public function getLocation()
	{
        $this->load->model("location_m");
        $lokasi = $this->location_m->now();
        test($lokasi);
        
	}

}
