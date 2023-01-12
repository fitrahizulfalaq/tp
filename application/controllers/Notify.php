<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notify extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->library("wa");
    }
 
    function index()
    {
        redirect("");
    }

    function belumLogin()
    {
        $this->load->model("user_m");
        $this->load->model("kunjungan_m");
        $dataUser = $this->user_m->getAllby("tipe_user","1");
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"),date("m"),date("d"),$data->id);
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin","user_id",$this->session->id,date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                // $kalimat = "*[KAMU BELUM CHECK IN KUNJUNGAN HARI INI]* \n\nHalo, ".$data->nama.$data->hp." Terhitung pada ".date("d-m-Y H:i:s")." kamu belum melakukan checkin kunjungan. Segera melaporkan kegiatan hari ini, terima kasih. \n\n\n https://tp.upktukm.id\n_Sistem Otomatis oleh TIM IT UPT_";
                // echo $kalimat."<br>";
                $this->kunjungan_m->saveLate($data->id,"telat check in");
                // $this->wa->send($data->hp,$kalimat);
                // sleep(4); // this should halt for 3 seconds for every loop
                // ob_flush();
                // flush();            
            }
        }
    }

    /*
        Bisa dikembangkan lebih detail lagi
    */
    function getJarak()
    {
        $this->load->model("validation_m");
        // Dapatkan Latitude dan Longtitude dari Data
        $point1 = array("lat" => -7.9750924, "lng" => 112.6616627);         
        // Dapatkan Latitude dan Longtitude dari Inputan Text Alamat
        $data = $this->validation_m->getLocationByAddress("Jl. Raya Ki Ageng Gribig Perumahan BTU Kota Malang");
        $point2 = $data['results']['0']['geometry']['location'];

        $lat1 = $point1['lat'];
        $lon1 = $point1['lng'];
        $lat2 = $point2['lat'];
        $lon2 = $point2['lng'];

        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet  = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        $str = compact('miles','feet','yards','kilometers','meters');

        test($str);
    }
    
}