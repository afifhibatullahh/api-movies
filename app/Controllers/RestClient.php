<?php

namespace App\Controllers;

use Exception;

class RestClient extends BaseController
{
    public function index()
    {
        helper('restclient');
        $url = 'http://localhost/react-api/public/film';
        $response = akses_api('get', $url, []);
        dd($response->getBody());
    }
}
