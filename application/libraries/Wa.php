<?php

class WA
{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function send($hp = null, $pesan = null)
	{
		//API dari Whacenter
		$device_id = 'f75a80b9d2b38921c6134f029d3e8c71'; // Token dari Whacenter
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://app.whacenter.com/api/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('device_id' => $device_id, 'number' => $no_hp, 'message' => $pesan),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;

		$data = json_decode($response);
		return $data;
	}
}
