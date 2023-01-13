<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	function tipe_user($tipe = null) {
		if ($tipe != null) {
			$tipe_user = $tipe;
		} else {
			$tipe_user = $this->ci->session->userdata('tipe_user');			
		}
		$this->ci->db->from('tb_tipe_user');
		$this->ci->db->where('id',$tipe_user);
		$query = $this->ci->db->get();
		return $query;
	}

	function setting($kode) {
		$this->ci->db->from('setting');
		$this->ci->db->where('kode',$kode);
		$query = $this->ci->db->get();
		return $query;
	}

	function status($tipe_user) {
		$this->ci->db->from('tb_tipe_user');
		$this->ci->db->where('id',$tipe_user);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function nama($id) {
		$this->ci->db->from('tb_user');
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("nama");
		return $query;
	}

	function timeToStr($tipe = null, $value = null)
    {
        $tanggal = date($tipe,strtotime($value));
        return $tanggal;
    }

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_advanced_2($tabel,$kode,$id,$kode2,$id2) {		
		$this->ci->db->where($kode,$id);
		$this->ci->db->where($kode2,$id2);
		$query = $this->ci->db->get($tabel);
		return $query;
	}
	
	function totalJarak($id = null)
	{
		$this->ci->load->model("kunjungan_m");
		$this->ci->load->model("validation_m");
		// Total Jarak
		$data = $this->ci->kunjungan_m->getByMonth(date("Y"), date("m"), $id);        
        $no = 0;
		$totalJarak = 0;
        $point1 = array("lat" => $data->row('lat'), "lng" => $data->row('lng'));        
        foreach ($data->result() as $key => $data) {
            if ($no != null){
			$point2 = array("lat" => $data->lat, "lng" => $data->lng);
            $perbedaanJarak = $this->ci->validation_m->hitungJarak($point1['lat'],$point1['lng'],$point2['lat'],$point2['lng']);
			$totalJarak = $totalJarak + $perbedaanJarak['kilometers'];
            $point1 = $point2;
			}
			$no++;
        }
		
		$estimasiJarak = number_format($totalJarak,3,',','');
		return $estimasiJarak;
	}
	
}

?>
