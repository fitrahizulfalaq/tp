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
        $this->db->order_by('created', "desc");
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
        $this->db->order_by('created', "desc");
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
        $this->db->order_by('created', "desc");
        $query = $this->db->get();
        return $query;
    }

    /*
        Tambahkan Kunjungan
    */
    function addCheckInNonLainnya($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'],$this->session->hp);
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['nama'] =  $post['nama'];
        $params['kelamin'] =  $post['kelamin'];
        $params['hp'] =  $post['hp'];
        $params['tujuan'] =  $post['tujuan'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Ymdhmsi");
        $params['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjungan', $params);
    }

    function addCheckInLainnya($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'],$this->session->hp);
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['masalah'] =  $post['masalah'];
        $params['target'] =  $post['target'];
        $params['realisasi'] =  $post['realisasi'];
        $params['kegiatan'] =  $post['kegiatan'];
        $params['tujuan'] =  $post['tujuan'];
        $params['kesimpulan'] =  $post['kesimpulan'];
        $params['tindak_lanjut'] =  $post['tindak_lanjut'];
        $params['foto_selfie'] =  $post['foto_selfie'];
        $params['foto_lokasi'] =  $post['foto_lokasi'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Ymdhmsi");
        $params['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjungan', $params);
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
        $parms['ip_address'] = $this->input->ip_address();
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

    /////// TARGET KUNJUNGAN TAHUNAN ///////
    /*
        Secara default akan mengambil seluruh data di tabel target
        Gunakan variabel tahun dan user_id untuk memilah
        $this->kunjungan_m->getTarget("2022","user_id")
    */
    function getTarget($tahun = null, $id = null)
    {
        $this->db->from('tb_target');
        if ($tahun != null && $id != null) { $this->db->where("tahun", $tahun); }
        $query = $this->db->get();
        return $query;
    }

    function addTargetTahunan($post)
    {
        $params['id'] = "";
        $params['tahun'] =  date("Y");
        $params['user_id'] =  $this->session->id;
        $params['file'] =  $post['file'];
        $params['created'] =  date("Ymdhmsi");
        $this->db->insert('tb_target', $params);
    }

    function editTargetTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['target'] =  $post['target'];
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    function addRealisasiTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['realisasi'] =  $post['realisasi'];
        $params['modified'] =  date("Ymdhmsi");
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    function editRealisasiTahunan($post)
    {
        $params['id'] =  $post['id'];
        $params['realisasi'] =  $post['realisasi'];
        $this->db->where('id', $params['id']);
        $this->db->update('tb_target', $params);
    }

    /////// LIST LEMBAGA ///////
    function getLembaga($id = null)
    {
        $this->db->from('tb_lembaga');
        if ($id != null) { $this->db->where("id", $id); }
        $query = $this->db->get();
        return $query;
    }    

    function addkunjung($post)
    {
        //Migrasi Gambar Peta dari TMP ke Storage Utama
        $params['loc_img'] =  $this->maps->saveMapsImg(FCPATH . $post['loc_img'],$this->session->nik);
        //Input Data
        $params['id'] =  "";
        $params['user_id'] =  $this->session->id;
        $params['tipe'] =  $post['tipe'];
        $params['resume'] =  $post['resume'];
        $params['foto_selfielokasi'] =  $post['foto_selfielokasi'];
        $params['sppd'] =  $post['sppd'];
        $params['lat'] =  $post['lat'];
        $params['lng'] =  $post['lng'];
        $params['created'] =  date("Ymdhmsi");
        $parms['ip_address'] = $this->input->ip_address();
        $this->db->insert('tb_kunjung', $params);
    }

}
