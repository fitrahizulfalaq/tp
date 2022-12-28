<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Kunjungan extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		check_not_login();
	}
    public $key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";

    public function login()
    {
        check_already_login();
        $this->load->view('test/login');
    }    

    public function lokasi()
    {
        $data['title']="Kunjungan";   
        $this->templateadmin->load('template/dashboard','kunjungan/lokasi',$data);
    }
    
    public function kunjungan()
    {
        $this->load->library("maps");
        $post = $this->input->post(null, TRUE);

        $data['lat'] = $post['lat-input'];
        $data['lng'] = $post['lng-input'];
        $data['loc_img'] = $this->maps->saveMapsTmp($post['lat-input'], $post['lng-input']);
        $data['title']="Kunjungan";
        $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_input',$data);
    }        

    public function addkunjungan()
    {
        $this->load->library("maps");
        $this->load->model("kunjungan_m");
        $post = $this->input->post(null, TRUE);
        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $this->load->library("upload");
            
            $config = array(
                'upload_path' => './assets/files/uploads/selfie',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => '2048',
            );
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('selfie')){

                $error=$this->upload->display_errors();
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Kunjungan";
                echo "<script> alert('Format/Ukuran Foto Selfie dan Lokasi tidak Sesuai-$error')</script>";
                $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_data', $data);
                
            }else{
                    $selfie_img_data = $this->upload->data();
                    $selfie_img = $selfie_img_data['file_name'];

                    $config = array(
                        'upload_path' => './assets/files/uploads/lokasi',
                        'allowed_types' => 'pdf|jpg|png|jpeg',
                        'max_size' => '2048',
                    );
                    $this->upload->initialize($config);

                if(!$this->upload->do_upload('lokasi')){       
                    $errir=$this->upload->display_errors();
                    $data['errir'] = $this->upload->display_errors();
                    $data['title'] = "Kunjungan";
                    echo "<script> alert('Format/Ukuran LOKASI tidak Sesuai-$errir')</script>";
                    $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_data', $data);
                }else{
                    $lokasi_img_data = $this->upload->data();
                    $lokasi_img = $lokasi_img_data['file_name'];

                    $config = array(
                        'upload_path' => './assets/files/uploads/sppd',
                        'allowed_types' => 'pdf|jpg|png|jpeg',
                        'max_size' => '2048',
                    );
                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('sppd')){       
                        $errr=$this->upload->display_errors();
                        $data['errr'] = $this->upload->display_errors();
                        $data['title'] = "Kunjungan";
                        echo "<script> alert('Format/Ukuran LOKASI tidak Sesuai-$errr')</script>";
                        $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_data', $data);
                        
                    }else{
                            //post
                            $sppd_img_data = $this->upload->data();
                            $sppd_img = $sppd_img_data['file_name'];

                            $post['foto_selfie']= $selfie_img;
                            $post['foto_lokasi']= $lokasi_img;
                            $data['sppd']= $sppd_img;
            
                            $result = $this->kunjungan_m->addkunjungan($post);
                            $sppdupload= $this->kunjungan_m->addSPPD($data);
            
                            if($result){
                                echo "<script> alert('sukses')</script>";
                            }else{
                                echo "<script> alert('gagal')</script>";
                            }
                            redirect('dashboard');

                        }                    
                }
            }
        }
    }      

    public function editkunjungan()
    {        
        $data['title']="Edit Kunjungan";
        $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_edit',$data);
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
