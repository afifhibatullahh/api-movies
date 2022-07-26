<?php

use App\Models\ModelUser;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($autentikasiHeader)
{
    if (is_null($autentikasiHeader)) {
        throw new Exception('jwt authentication failed');
    }
    return explode(" ", $autentikasiHeader)[1];
}

function validateJWT($encodedToken)
{
    $key = getenv('JWT_SECRET_KEY');
    $decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
    $modelUser = new ModelUser();

    $modelUser->getUsername($decodedToken->username);
}

function createJWT($username)
{
    $waktuRequest = time();
    $waktuToken = getenv('JWT_TIME_TO_LIVE');
    $waktuExpired = $waktuRequest + $waktuToken;
    $payload = [
        'username' => $username,
        'iat' => $waktuRequest,
        'exp' => $waktuExpired
    ];

    $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'), 'HS256');

    return $jwt;
}
