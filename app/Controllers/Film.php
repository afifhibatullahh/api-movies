<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelFilm;

class Film extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->film = new ModelFilm();
    }

    public function search($param)
    {
        $data = $this->film->like('judul', $param)->orLike('category', $param)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data Film tidak ada");
        }
    }

    public function index()
    {
        $data = $this->film->orderBy('judul', 'asc')->findAll(10);
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->film->where('id', $id)->findAll();

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data Film tidak ada");
        }
    }

    public function create()
    {
        $data = [
            'judul' => $this->request->getVar('judul'),
            'rating' => $this->request->getVar('rating'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'image' => $this->request->getVar('image'),
            'negara' => $this->request->getVar('negara'),
        ];

        if (!$this->film->save($data)) {
            return $this->fail($this->film->errors());
        }

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil menambahkan data film.'
            ]
        ];

        return $this->respond($response);
    }

    public function update($id = null)
    {
        $isExists = $this->film->where('id', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data tidak ditemukan");
        }

        // $data = [
        //     'id' => $id,
        //     'judul' => $this->request->getVar('judul'),
        //     'rating' => $this->request->getVar('rating'),
        //     'sinopsis' => $this->request->getVar('sinopsis'),
        //     'deskripsi' => $this->request->getVar('deskripsi'),
        //     'image' => $this->request->getVar('image'),
        //     'negara' => $this->request->getVar('negara'),
        // ];

        // gini juga bisa

        $data = $this->request->getRawInput();
        $data['id'] = $id;

        if (!$this->film->save($data)) {
            return $this->fail($this->film->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil mengubah data film.'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->film->where('id', $id)->findAll();
        if ($data) {
            $this->film->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Film berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
