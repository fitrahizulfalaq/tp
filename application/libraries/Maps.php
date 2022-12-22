<?php 

class Maps {

	protected $ci;
	
    
	function __construct()
	{
        $this->ci =& get_instance();

        //Setting penyimpanan
        $this->key = "AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A";
        $this->storage = 'assets/files/maps/';
	}

    // Digunakan untuk menyimpan gambar maps sesuai lokasi
	function saveMapsImg($lat,$lng) {
        $url = "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C".$lat."," .$lng."&zoom=15&size=500x500&maptype=roadmap&key=".$this->key;
        // test($url);
        $img = FCPATH . $this->storage.date("Ymdhmsi")."nama.jpg";
        // test($img);
        file_put_contents($img, file_get_contents($url));
        return $img;
	}
	
}

?>
