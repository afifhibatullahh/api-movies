<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelUser;

class Otentikasi extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan username'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan password'
                ]
            ],
        ];

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $user = new ModelUser();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $user->getUsername($username);

        if ($data['password'] != md5($password)) {
            return $this->fail('Password tidak sesuai');
        }

        helper('jwt');
        $response = [
            'message' => 'Otentikasi berhasil dilakukan',
            'data' => $data,
            'access_token' => createJWT($username)
        ];
        return $this->respond($response);
    }
}
