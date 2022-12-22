<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	
	//Kode akses
	public function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}



	//////////////////////
	/////////////////////
	/// PROFIL
	///////////////////	
	///////////////////
	function update_profil($post)
	{
	  //Id	  
	  $params['id'] =  $post['id'];
	  // Kebutuhan User
	  $params['username'] =  $post['username'];
	  if ($post['password'] != null) {
		  $params['password'] =  sha1($post['password']);	  	
	  }
	  $params['nama'] =  $post['nama'];
	  $params['tempat_lahir'] =  $post['tempat_lahir'];
	  $tanggal =  $post['tanggal'];
	  $bulan =  $post['bulan'];
	  $tahun =  $post['tahun'];
	  $params['tgl_lahir'] =  date("Y:m:d", strtotime($tahun."-".$bulan."-".$tanggal));
	  $params['hp'] =  $post['hp'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['provinsi'] =  $post['provinsi'];
	  $params['kota'] =  $post['kota'];
	  $params['kecamatan'] =  $post['kecamatan'];
	  $params['kelurahan'] =  $post['kelurahan'];
	  $params['domisili'] =  $post['domisili'];
	  $params['pernikahan'] =  $post['pernikahan'];
	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
	  $params['pekerjaan_utama'] =  $post['pekerjaan_utama'];
	  $params['angkatan'] =  $post['angkatan'];
	  $params['tahun_bergabung'] =  $post['tahun_bergabung'];
	  $params['status'] =  "1";
	  if ($post['foto'] != null) {
  	  $params['foto'] =  $post['foto'];
  	} else {
  	  $params['foto'] =  "";
  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_user',$params);
	}

}
