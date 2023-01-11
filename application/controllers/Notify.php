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
            if ($dataLogin->num_rows() == null) {
                $kalimat = "*[KAMU BELUM CHECK IN KUNJUNGAN HARI INI]* \n\nTerhitung pada ".date("d-m-Y H:i:s")." kamu belum melakukan checkin kunjungan. Segera melaporkan kegiatan hari ini, terima kasih. \n\n\n https://tp.upktukm.id\nProvide by TIM IT UPT";
                $this->wa->send($data->hp,$kalimat);
            }
            sleep(9); // this should halt for 3 seconds for every loop
            ob_flush();
            flush();            
        }
    }
    
}