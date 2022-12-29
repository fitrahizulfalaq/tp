<?php 
class Upload extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('kunjungan_m');
        $this->load->library('upload');
    } 
 
    function index(){
        $this->load->view('v_upload');
    }
 
    function upload_image(){
        test($this->input->post(null,true));
    }
 
} 