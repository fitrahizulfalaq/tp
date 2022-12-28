<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model("kunjungan_m");
	}
    public $key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";

    function index()
    {
        $this->session->set_flashdata('warning', 'Inputan Anda Tidak Valid');
        redirect("");
    }
    
    /*
        CHECK IN
        Step 1 - Tentukan Lokasi        
    */
    function checkIn()
    {
        $data['title']="CHECK IN LOKASI";   
        $this->templateadmin->load('template/dashboard','kunjungan/lokasi',$data);
    }

    /*
        Step 2 - Tambahkan data kunjungan awal
        Koperasi/UMKM/Wirausaha Pemula --> Isian (1)
        Kalau di Kantor --> Isian (2)
        */
        function addCheckIn()
        {
            $this->load->library("maps");
            $post = $this->input->post(null, TRUE);
            // Validasi
            if ($post == null){
                $this->session->set_flashdata('danger', 'Mohon Share Loc Terlebih Dahulu');
                redirect("kunjungan/checkin");
            } else {
            $this->load->library('form_validation');
            $data['lat'] = $post['lat-input'];
            $data['lng'] = $post['lng-input'];
            $data['loc_img'] = $this->maps->saveMapsTmp($post['lat-input'], $post['lng-input']);
            $data['title']="Kunjungan";
            $this->templateadmin->load('template/dashboard','kunjungan/addCheckin',$data);
        }
    }
    /*
        Step 3 - Simpan ke Database Kunjungan
    */
    function saveCheckIn()
    {
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
            // Redirect agar tidak di hit langsung
            $post = $this->input->post(null, TRUE);
            if ($post == null){$this->session->set_flashdata('danger', 'Mohon Share Loc Terlebih Dahulu');redirect("kunjungan/checkin");}

            $data['title']="TAMBAH DATA KUNJUNGAN";
            $this->templateadmin->load('template/dashboard','kunjungan/addCheckin',$data);
		} else {
			$post = $this->input->post(null, TRUE);
            test($post);
            //Input database sesuai tipe
            if ($post['tipe'] == "UKM" or $post['tipe'] == "KOPERASI" or $post['tipe'] == "CALON WIRAUSAHA"){
                $this->kunjungan_m->addCheckInNonLainnya($post);
            } elseif ($post['tipe'] == "LAINNYA"){
                //CEK FOTO SELFIE
                $foto_selfie['upload_path']          = 'assets/files/foto_selfie';
                $foto_selfie['allowed_types']        = 'png|jpg|jpeg';
                $foto_selfie['max_size']             = 5000;
                $foto_selfie['file_name']            = "TARGETTAHUNAN-".strtoupper($this->session->hp);

                $this->load->library('upload', $foto_selfie);
                if (@$_FILES['foto_selfie']['name'] != null) {
                    $this->upload->initialize($foto_selfie);
                    if ($this->upload->do_upload('foto_selfie')) {
                        $post['foto_selfie'] = $this->upload->data('file_name');
                    } else {
                        $pesan = $this->upload->display_errors();
                        $this->session->set_flashdata('danger', $pesan);
                        redirect('kunjungan/saveCheckIn');
                    }
                }

                //CEK FOTO LOKASI
                $foto_lokasi['upload_path']          = 'assets/files/foto_lokasi';
                $foto_lokasi['allowed_types']        = 'png|jpg|jpeg';
                $foto_lokasi['max_size']             = 5000;
                $foto_lokasi['file_name']            = "TARGETTAHUNAN-".strtoupper($this->session->hp);

                $this->load->library('upload', $foto_lokasi);
                if (@$_FILES['foto_lokasi']['name'] != null) {
                    $this->upload->initialize($foto_lokasi);
                    if ($this->upload->do_upload('foto_lokasi')) {
                        $post['foto_lokasi'] = $this->upload->data('file_name');
                    } else {
                        $pesan = $this->upload->display_errors();
                        $this->session->set_flashdata('danger', $pesan);
                        redirect('kunjungan/saveCheckIn');
                    }
                }

                $this->kunjungan_m->addCheckInLainnya($post);                
            }

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Check In Berhasil. Anda bisa mengedit hasil kunjungan pada menu Laporan.');
			}
			redirect('kunjungan/checkin');
		}
    }

    public function editkunjungan()
    {        
        $data['title']="Edit Kunjungan";
        $this->templateadmin->load('template/dashboard','kunjungan/kunjungan_edit',$data);
    }      
}
