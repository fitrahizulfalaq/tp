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
        $lokasi = $this->location_m->get();
        test($lokasi);
        
	}

    public function coba()
    {
        $client = new Client();

        $response = $client->request("POST","https://www.googleapis.com/geolocation/v1/geolocate",[
            'query' => [
                'key' => 'AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A'
            ]
        ]);
        $result = json_decode($response->getbody()->getcontents(),true)['location'];
		$data['img'] = "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C".$result['lat']."," .$result['lng']."&zoom=18&size=400x400&maptype=roadmap&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";
        $data['lat'] = $result['lat'];
        $data['lng'] = $result['lng'];
        $this->load->view('page/coba',$data);
    }

    public function simpan()
    {
        $post = $this->input->post(null, TRUE);
        // test($post);

        //Simpan gambar ke directory
        $url = "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C".$post['lat-input']."," .$post['lng-input']."&zoom=18&size=400x400&maptype=roadmap&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";
        // test($url);
        $img = FCPATH . 'assets/files/maps/'.date("Ymd")."nama".rand(1,10).".jpg";
        // test($img);
        file_put_contents($img, file_get_contents($url));
        
    }

}
