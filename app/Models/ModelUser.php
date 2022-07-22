<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ModelUser extends Model
{
    protected $table = 'user';

    protected $allowedFields = ['username', 'password'];

    protected $validationRules = [
        'username' => 'required',
        'password' => 'required'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Silahkan masukan username'
        ],
        'password' => [
            'required' => 'Silahkan masukan password'
        ]
    ];

    function getUsername($username)
    {
        $builder = $this->table('user');
        $data = $builder->where('username', $username)->first();

        if (!$data) {
            throw new Exception("Data authentikasi tidak ditemukan");
        }

        return $data;
    }
}
