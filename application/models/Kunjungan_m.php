<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Kunjungan_m extends CI_Model
{

    /* 
        Ambil Data Kunjungan berdasarkan Tabel dan Variable Tabel
        $this->kunjungan_m->getAllBy("nama tabel","variable tabel");
        $this->kunjungan_m->getAllBy("id","user_id");
    */
    function getAllBy($kolom = null, $id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($kolom != null && $id != null) {
            $this->db->where($kolom, $id);
        }
        $query = $this->db->get();
        return $query;
    }

    /* 
        Ambil data berdasarkan Tahun Bulan dan Tanggal, kondisi tambahan bisa untuk masing-masing TP (User_id)
            1. getByDate (Tanggal) - ("tahun","bulan","tanggal","user_id | opsional")
            2. getByMonth (bulan) - ("tahun","bulan","user_id | opsional")
            3. getByYear (tahun) - ("tahun","user_id | opsional")
        Example :
        $this->kunjungan_m->getByDate("tahun","bulan","tanggal");
    */
    function getByDate($tahun = null, $bulan = null, $tanggal = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan . "-" . $tanggal);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }
    function getByMonth($tahun = null, $bulan = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun . "-" . $bulan);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }
    function getByYear($tahun = null, $user_id = null)
    {
        $this->db->from('tb_kunjungan');
        if ($user_id != null) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->like('created', $tahun);
        $this->db->order_by('created', "asc");
        $query = $this->db->get();
        return $query;
    }

    function addKunjungan($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'],$this->session->nik);
        //Input Data
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
        if ($post['foto_selfie'] != null) { $params['foto_selfie'] =  $post['foto_selfie']; } else { $params['foto_selfie'] =  ""; }
        if ($post['foto_lokasi'] != null) { $params['foto_lokasi'] =  $post['foto_lokasi']; } else { $params['foto_lokasi'] =  ""; }
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
        if ($post['sppd'] != null) { $params['file'] =  $post['sppd']; } else { $params['file'] =  ""; }
        $params['modified'] =  date("Ymdhmsi");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_sppd', $params);
    }

    /*
        Hapus Kunjungan Menggunakan ID
    */
    function delete($id)
    {
        // Ambil Data ID
        $this->db->from('tb_kunjungan');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();

        // Hapus Gambar yang diinput
        $this->maps->deleteMapsImg($query->loc_img);
        // Hapus Data
        $this->db->where('id', $id);
        $this->db->delete('tb_kunjungan');
    }
}
