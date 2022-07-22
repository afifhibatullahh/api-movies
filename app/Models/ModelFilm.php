<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFilm extends Model
{
    protected $table = 'film';
    protected $primaryKey = 'id';

    protected $allowedFields = ['judul', 'rating', 'deskripsi', 'sinopsis', 'image', 'negara'];

    protected $validationRules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'sinopsis' => 'required',
        'negara' => 'required'
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Silahkan masukan judul'
        ],
        'deskripsi' => [
            'required' => 'Silahkan masukan deskripsi'
        ],
        'sinopsis' => [
            'required' => 'Silahkan masukan sinopsis'
        ],
        'negara' => [
            'required' => 'Silahkan masukan negara'
        ],
    ];
}
