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
        previllage($this->session->tipe_user,"1","!=","kunjungan/data");
        $data['title'] = "CHECK IN LOKASI";   
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

        // Validasi menghindari injection. Alihkan jika posisi latitude dan longtitude tidak ada
        if ($post['lat'] == null or $post['lng'] == null){
            $this->session->set_flashdata('danger', 'Mohon Share Loc Terlebih Dahulu');
            redirect("kunjungan/checkin");
        } else {
            //Load librarynya form
            $this->load->library('form_validation');
            //Atur validasinya
            $this->form_validation->set_rules('hp', 'hp', 'min_length[10]|max_length[15]');
            //Pesan yang ditampilkan
            $this->form_validation->set_message('is_unique', 'Data sudah ada');
            //Tampilan pesan error
            $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

            if ($this->form_validation->run() == FALSE or !isset($post['loc_img'])) {
                // Redirect agar tidak di hit langsung
                $post = $this->input->post(null, TRUE);

                $data['lat'] = $post['lat'];
                $data['lng'] = $post['lng'];
                $data['loc_img'] = $this->maps->saveMapsTmp($post['lat'], $post['lng']);
                $data['title']="ABSEN KUNJUNGAN";
                $this->templateadmin->load('template/dashboard','kunjungan/addCheckin',$data);
            } else {
                $post = $this->input->post(null, TRUE);
                
                //Input database sesuai tipe
                if ($post['tipe'] == "UKM" or $post['tipe'] == "KOPERASI" or $post['tipe'] == "CALON WIRAUSAHA"){
                    $this->kunjungan_m->addCheckInNonLainnya($post);
                } elseif ($post['tipe'] == "LAINNYA"){
                    $this->kunjungan_m->addCheckInLainnya($post);                
                }

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Check In Berhasil. Silahkan tambahkan data hasil kunjungan.');
                }
                redirect('kunjungan/data');
            }
        }
    }

    // function data()
    // {
    //     !isset($_GET['tahun']) ? $tahun = date("Y") : $tahun = $_GET['tahun'];
    //     !isset($_GET['bulan']) ? $bulan = date("m") : $bulan = $_GET['bulan'];

    //     $data['title'] = "Kegiatan BULAN " . $bulan . " / " . $tahun;
	// 	$data['row'] = $this->kunjungan_m->getByMonth($tahun,$bulan,$this->session->id);

	// 	$this->templateadmin->load('template/dashboard', 'kunjungan/logData', $data);
    // }
    
    public function edit($id)
    {
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
      
}
