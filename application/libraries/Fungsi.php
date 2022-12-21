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

	function pilihan_advanced_limit($tabel,$kode,$id,$limit,$dari,$urutkan,$berdasarkan) {		
		$this->ci->db->where($kode,$id);
		$this->ci->db->order_by($berdasarkan, $urutkan);
		$query = $this->ci->db->get($tabel,$limit,$dari);
		return $query;
	}

	function pilihan_aritmatika($tabel,$kode,$id,$perintah,$kolom) {		
		$this->ci->db->$perintah($kolom);
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->row();
		return $query;
	}

	function pilihan_aritmatika_advanced($tabel,$kode,$id,$perintah,$kolom,$kode2,$kondisi) {		
		$this->ci->db->$perintah($kolom);
		$this->ci->db->where($kode,$id);
		$this->ci->db->where($kode2,$kondisi);
		$query = $this->ci->db->get($tabel)->row();
		return $query;
	}

	function hitung_mean($n_tugas,$n_uh,$n_uts,$n_uas)
	{
		$tugas = 0.2 * $n_tugas;
		$uh = 0.2 * $n_uh;
		$uts = 0.3 * $n_uts;
		$uas = 0.3 * $n_uas;
		$hasil = $tugas + $uh + $uts + $uas;
		return number_format((float)$hasil, 2, '.', '');

	}

	function validasi_item($tabel,$user_id,$id,$kolom,$n_kolom)
	{
		$this->ci->db->from($tabel);
		$this->ci->db->where($user_id,$id);
		$this->ci->db->where($kolom,$n_kolom);
		$query = $this->ci->db->get();
		return $query;
	}

	// Hitung Cepat
	function hitung_rows($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->like($kode2,$id2);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_triple($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_nilai($tabel,$kolom,$kode,$id) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode,$id);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	function hitung_nilai_multiple($tabel,$kolom,$kode1,$id1,$kode2,$id2) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode1,$id1);		
		$this->ci->db->where($kode2,$id2);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	function cetak_pdf() {
    include_once APPPATH . '/third_party/TCPDF-main/tcpdf.php';
	}


}

?>
