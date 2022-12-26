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
        $cek = $this->approval_m->getByDate(date("Y", strtotime($post['tgl'])), date("m", strtotime($post['tgl'])), date("d", strtotime($post['tgl'])));
        // test(date("d",strtotime($post['tgl'])));
        // test($cek->num_rows());
        if ($cek->num_rows() == null) {
            $this->approval_m->addTurus($post);
            redirect("test/sukses");
        } else {
            echo "sudah ada";
        }
    }

    public function get()
    {
        $this->load->model("approval_m");
        $inputan = $this->approval_m->getByMonth("2022", "11")->result();
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
        $wa = $this->wa->send($hp, "Testing");
        test($wa);
    }

    public function time()
    {
        timevalidation("20221220", "20221227");
    }

    public function google()
    {
        // init configuration
        $clientID = '916270909408-5ebl637cbekthhqkpva05cbbdv1tj7o6.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = 'https://uptmentoring.me/test/google';

        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $data['email'] =  $google_account_info->email;
            $data['name'] =  $google_account_info->name;
            test($data);

            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
        }
    }

    public function drive()
    {
        $this->load->view('test/drive');
    }
}
