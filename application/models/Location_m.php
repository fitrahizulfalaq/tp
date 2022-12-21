<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;


class Location_m extends CI_Model
{

    public function __construct()
    {

        $this->_client = new Client([
            'base_uri' => 'https://api.jtnweb.my.id',
            'auth' => ['webmasterjtn', 'RedaksiIndonesia-2022']
        ]);
    }
    
    public function getAll($location= null,$limit = null,$start = null)
    {
        $res = $this->_client->request('GET', 'news/location', [
            'query' => [
                'location' => $location,
                'start' => $start,
                'limit' => $limit,
            ]
        ]);

        $response = json_decode($res->getBody()->getContents(), true);
        return $response;
    }

    public function get()
    {
        $client = new Client();

        $response = $client->request('GET','https://api.catboys.com/ping');
        // $result = json_decode($response->getbody()->getcontent(),true);
        return $response;
    }
    
}
