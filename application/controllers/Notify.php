<?php
ob_start();
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

    function saveLate()
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

    function waCheckin()
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

}