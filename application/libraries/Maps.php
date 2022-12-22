<?php

class Maps
{

        protected $ci;


        function __construct()
        {
                $this->ci = &get_instance();

                //Setting penyimpanan
                $this->key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";
                $this->storage = 'assets/files/maps/';
                $this->storagetmp = 'assets/files/maps/tmp/';
        }

        // Digunakan untuk menyimpan gambar maps sesuai lokasi
        function saveMapsTmp($lat, $lng)
        {
                $url = "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C" . $lat . "," . $lng . "&zoom=15&size=500x500&maptype=roadmap&key=" . $this->key;
                // test($url);
                $img = FCPATH . $this->storagetmp . date("Ymdhmsi") . "nama.jpg";
                $fix = $this->storagetmp . date("Ymdhmsi") . "nama.jpg";
                // test($img);
                file_put_contents($img, file_get_contents($url));
                return $fix;
        }

        function saveMapsImg($url)
        {
                // test($url);
                $img = FCPATH . $this->storage . date("Ymdh") . "fix.jpg";
                $name = date("Ymdh") . "-fix.jpg";
                // test($img);
                file_put_contents($img, file_get_contents($url));
                return $name;       
        }
}
