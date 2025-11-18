<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LibraryController extends Controller
{
    private $apiUrl = 'http://127.0.0.1:8000/api/books'; // Alamat API Laravel

    // Halaman Utama (List Buku)
    public function index()
    {
        $client = \Config\Services::curlrequest();
        
        // Ambil data dari Laravel
        $response = $client->request('GET', $this->apiUrl);
        $data['books'] = json_decode($response->getBody(), true);

        return view('books/index', $data);
    }

    // Form Tambah Buku
    public function create()
    {
        return view('books/create');
    }

    // Proses Simpan ke API Laravel
    public function store()
    {
        $client = \Config\Services::curlrequest();
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
            'kategori' => $this->request->getPost('kategori'),
            'isbn' => $this->request->getPost('isbn'),
            'status' => $this->request->getPost('status'),
        ];

        $client->request('POST', $this->apiUrl, [
            'form_params' => $data
        ]);

        return redirect()->to('/');
    }

    // Proses Hapus
    public function delete($id)
    {
        $client = \Config\Services::curlrequest();
        $client->request('DELETE', $this->apiUrl . '/' . $id);
        
        return redirect()->to('/');
    }

    // 1. Menampilkan Halaman Edit (GET)
    public function edit($id)
    {
        $client = \Config\Services::curlrequest();
        
        // Ambil data buku spesifik dari API Laravel berdasarkan ID
        // URL: http://127.0.0.1:8000/api/books/{id}
        $response = $client->request('GET', $this->apiUrl . '/' . $id);
        
        // Cek jika data ditemukan
        if ($response->getStatusCode() == 200) {
            $data['book'] = json_decode($response->getBody(), true);
            return view('books/edit', $data);
        }
        
        return redirect()->to('/');
    }

    // 2. Memproses Update Data (POST dari Form CI4 -> PUT ke API Laravel)
    public function update($id)
    {
        $client = \Config\Services::curlrequest();

        // Data yang diambil dari Form Edit
        $data = [
            'judul'          => $this->request->getPost('judul'),
            'pengarang'      => $this->request->getPost('pengarang'),
            'penerbit'       => $this->request->getPost('penerbit'),
            'tahun_terbit'   => $this->request->getPost('tahun_terbit'),
            'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
            'isbn'           => $this->request->getPost('isbn'),
            'kategori'       => $this->request->getPost('kategori'),
            'status'         => $this->request->getPost('status'),
        ];

        // Kirim request PUT ke Laravel
        $client->request('PUT', $this->apiUrl . '/' . $id, [
            'json' => $data
        ]);

        return redirect()->to('/');
    }

}

