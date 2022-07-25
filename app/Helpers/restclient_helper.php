<?php

function akses_api($method, $url, $data)
{
    $client = \Config\Services::curlrequest();

    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwiaWF0IjoxNjU4NTUwMTUwLCJleHAiOjE2NTg1NTM3NTB9.vaVW1W9zmq5c9PFAFRQtjEl9DzLsDUFqJ7smoZC_wTY';

    $headers = [
        "Authorization" => 'Bearer ' . $token
    ];

    $response = $client->request($method, $url, ['headers' => $headers, 'http_errors' => false, 'form_params' => $data]);

    return $response;
}
