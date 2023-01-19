<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Test extends CI_Controller
{
    public function __construct(){
		parent::__construct();
        $this->fungsi->saveAdminLog("Akses TEST");
	}

    function metaImage()
    {
        $exif = exif_read_data("https://tp.uptkukm.id/assets/files/foto_lokasi/tmp/38587112.jpg", 0, true);
        foreach ($exif as $key => $section) {
            foreach ($section as $name => $val) {
                echo "$key.$name: $val<br />\n";
            }
        }
    }
}
