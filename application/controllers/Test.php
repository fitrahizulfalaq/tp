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
        $this->load->library('user_agent');
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
    
    public function edit($id)
    {
        $this->load->model("kunjungan_m");
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('hp', 'hp', 'min_length[10]|max_length[16]');
        
		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');
        
		if ($this->form_validation->run() == FALSE) {
            $query = $this->kunjungan_m->getAllBy("id",$id);
            
			if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
				$data['title'] = "HASIL KUNJUNGAN";
                if ($query->row("tipe") != "LAINNYA" ) {
                    $this->templateadmin->load('template/dashboard', 'kunjungan/updateHasilUKM', $data);
                } else {
                    $this->templateadmin->load('template/dashboard', 'kunjungan/updateHasilLainnya', $data);
                }
			} else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('kunjungan') . "';</script>";
			}
		} else {
            $post = $this->input->post(null, TRUE);
            test($post);
			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/img/foto-tugas/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['file_name']            = $query->row('user_id') . '--' . $tgl;
            
			$this->load->library('upload', $config);
			if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $itemfoto = $this->kunjungan_m->get_tugas($post['id'])->row();
					if ($itemfoto->gambar != null) {
                        $target_file = 'assets/dist/img/foto-tugas/' . $itemfoto->gambar;
						unlink($target_file);
					}
                    
					$post['gambar'] = $this->upload->data('file_name');
				} else {
                    $pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('log_book/edit_tugas/' . $id);
				}
			}
            
			$this->kunjungan_m->update_tugas($post);
			if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('log_book');
		}
    }
    
    function hasilPost($post)
    {
        $post = $this->input->post(null, TRUE);
        test($post);
    }
    
    function device()
    {
        echo $this->agent->agent_string()."</br>";
        echo $this->agent->platform()." </br>";
        echo $this->agent->browser()."</br>";
        echo $this->agent->mobile()."</br>";
        echo $this->agent->referrer()."</br>";
    }
    
    function count()
    {
        $this->load->model("kunjungan_m");
        test($this->kunjungan_m->leaderboard("")->result());
    }

    function counts()
    {
        $this->load->model("kunjungan_m");
        $this->kunjungan_m->addPoin("10","kunjungan");
    }
    
    
}
