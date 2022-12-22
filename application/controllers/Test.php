<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Test extends CI_Controller
{
    public $key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";

    public function login()
    {
        check_already_login();
        $this->load->view('test/login');
    }

    public function getLocation()
    {
        $this->load->model("location_m");
        $lokasi = $this->location_m->get();
        test($lokasi);
    }

    public function lokasi()
    {
        $this->load->view('test/kunjungan/lokasi');
    }

    public function kunjungan()
    {
        $this->load->library("maps");
        $post = $this->input->post(null, TRUE);

        $data['lat'] = $post['lat-input'];
        $data['lng'] = $post['lng-input'];
        $data['loc_img'] = $this->maps->saveMapsTmp($post['lat-input'], $post['lng-input']);
        $this->load->view('test/kunjungan/kunjungan', $data);
    }

    public function addkunjungan()
    {
        $this->load->library("maps");
        $this->load->model("kunjungan_m");
        $post = $this->input->post(null, TRUE);

        $test = $this->maps->saveMapsImg(FCPATH . $post['loc_img']);
        $inputan = $this->kunjungan_m->addkunjungan($post);
        $this->load->view('test/kunjungan/sukses', $data);
    }

    public function get()
    {
        $this->load->model("validation_m");
        $inputan = $this->validation_m->verifyOTP()->result();
        test($inputan);
    }

    public function wa()
    {
        $hp = "081231390340";
        $wa = $this->wa->send($hp,"Testing");
        test($wa);
    }
}
