<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Kunjungan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tb_user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function saveKunjungan($post)
    {
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['resume'] =  $post['resume'];
        $params['detail'] =  $post['detail'];
        $params['identifikasi'] =  $post['identifikasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['foto_selfie'] =  $post['foto_selfie'];
        $params['foto_lokasi'] =  $post['foto_lokasi'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['loc_img'] =  $post['loc_img'];
        $params['created'] =  date("Ymdhmsi");
        $this->db->insert('tb_kunjungan', $params);
    }
    
    function updateKunjungan($post)
    {
        //Id	  
        $params['id'] =  $post['id'];
        
        // Kebutuhan User
        $params['resume'] =  $post['resume'];
        $params['detail'] =  $post['detail'];
        $params['identifikasi'] =  $post['identifikasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['lokasi'] =  $post['lokasi'];
        
        //Cek foto
        if ($post['foto_selfie'] != null) {
            $params['foto_selfie'] =  $post['foto_selfie'];
        } else {
            $params['foto_selfie'] =  "";
        }

        if ($post['foto_lokasi'] != null) {
            $params['foto_lokasi'] =  $post['foto_lokasi'];
        } else {
            $params['foto_lokasi'] =  "";
        }
        //End Cek foto
        
        $params['modified'] =  date("Ymdhmsi");
        
        $this->db->where('id', $params['id']);
        $this->db->update('tb_kunjungan', $params);
    }
    
    function addSPPD($post)
    {
        $params['id'] = "";
        $params['user_id'] =  $this->session->id;
        $params['file'] =  $post['sppd'];
        $params['created'] =  date("Ymdhmsi");
        $this->db->insert('tb_sppd', $params);
    }

    function updateSPPD($post)
    {
        $params['id'] =  $post['id'];
        if ($post['sppd'] != null) {
            $params['file'] =  $post['sppd'];
        } else {
            $params['file'] =  "";
        }
        $params['modified'] =  date("Ymdhmsi");
        
        $this->db->where('id', $params['id']);
        $this->db->update('tb_sppd', $params);
    }
    
}
