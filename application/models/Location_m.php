<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class Location_m extends CI_Model
{

	public function now()
	{
		$client     = new Client();
        $response = $client->request('GET', 'https://api.waifu.im/search/', [
            'query' => ['foo' => 'bar']
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
	}

	
}
