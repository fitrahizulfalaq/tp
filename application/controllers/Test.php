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

        $inputan = $this->kunjungan_m->addkunjungan($post);
        redirect("test/sukses");
    }
    
    public function sukses()
    {
        $this->load->view('test/kunjungan/sukses');        
    }

    public function turus()
    {
        $this->load->view('test/kunjungan/turus');        
    }

    public function addTurus()
    {
        $this->load->model("approval_m");
        $post = $this->input->post(null, TRUE);
        $cek = $this->approval_m->getByDate(date("Y",strtotime($post['tgl'])),date("m",strtotime($post['tgl'])),date("d",strtotime($post['tgl'])));
        // test(date("d",strtotime($post['tgl'])));
        // test($cek->num_rows());
        if ($cek->num_rows() == null)
        {
            $this->approval_m->addTurus($post);
            redirect("test/sukses");
        } else {
            echo "sudah ada";
        }

    }

    public function get()
    {
        $this->load->model("approval_m");
        $inputan = $this->approval_m->getByMonth("2022","11")->result();
        test($inputan);
    }

    public function hapus()
    {
        $id = $_GET['id'];
        $this->load->model("kunjungan_m");
        $inputan = $this->kunjungan_m->delete($id)->result();
    }

    public function acc()
    {
        $id = $_GET['id'];
        $this->load->model("approval_m");
        $inputan = $this->approval_m->accTurus($id);
    }

    public function wa()
    {
        $hp = "081231390340";
        $wa = $this->wa->send($hp,"Testing");
        test($wa);
    }
}
