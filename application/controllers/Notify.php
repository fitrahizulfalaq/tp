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
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin","user_id",$data->id,date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                $this->kunjungan_m->saveLate($data->id,"telat check in");
            }
        }
    }

    function belumCheckin()
    {
        $this->load->model("user_m");
        $this->load->model("kunjungan_m");
        $dataUser = $this->user_m->getAllby("tipe_user","1");
        foreach ($dataUser->result() as $key => $data) {
            $dataLogin = $this->kunjungan_m->getByDate(date("Y"),date("m"),date("d"),$data->id);
            $dataIzin = $this->kunjungan_m->getAllByTable("tb_izin","user_id",$data->id,date("Y-m-d"));
            if ($dataLogin->num_rows() == null and $dataIzin->num_rows() == null) {
                $kalimat = "*[KAMU BELUM CHECK IN KUNJUNGAN HARI INI]* \n\nHalo, ".$data->nama.$data->hp." Terhitung pada ".date("d-m-Y H:i:s")." kamu belum melakukan checkin kunjungan. Segera melaporkan kegiatan hari ini, terima kasih. \n\n\n https://tp.upktukm.id\n_Sistem Otomatis oleh TIM IT UPT_";
                $this->wa->send($data->hp,$kalimat);
                sleep(4); // this should halt for 3 seconds for every loop
                ob_flush();
                flush();            
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

        $data = $this->validation_m->hitungJarak($point1['lat'],$point1['lng'],$point2['lat'],$point2['lng']);
        test($data['kilometers']);
    }
    
    function totalJarak()
    {
        $this->load->model("validation_m");
        $this->load->model("kunjungan_m");
        
        $data = $this->kunjungan_m->getByMonth(date("Y"), date("m"), "226");
        
        $totalJarak = 0;
        $point1 = array("lat" => $data->row('lat'), "lng" => $data->row('lng'));
        
        foreach ($data->result() as $key => $data) {
            $point2 = array("lat" => $data->lat, "lng" => $data->lng);
            $perbedaanJarak = $this->validation_m->hitungJarak($point1['lat'],$point1['lng'],$point2['lat'],$point2['lng']);
            $totalJarak = $totalJarak + $perbedaanJarak['kilometers'];
            echo $perbedaanJarak['kilometers']." Total Jarak Kunjungan ". $totalJarak . "<br>";
            $point1 = $point2;
        }
        
        echo "<br> Total Keseluruhan Jarak Kunjungan <br>";
        echo $totalJarak;
        
    }
    
}