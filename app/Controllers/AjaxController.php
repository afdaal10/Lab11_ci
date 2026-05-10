<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax/index');
    }

    // Fungsi untuk menampilkan semua data di tabel
    public function getData()
    {
        $model = new ArtikelModel();
        $data = $model->findAll();
        
        return $this->response->setJSON($data);
    }

    // Fungsi untuk mengambil detail satu artikel berdasarkan ID (untuk Edit)
    public function getDetail($id)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);
        
        return $this->response->setJSON($data);
    }

    // Fungsi untuk Menyimpan Data (Tambah Baru ATAU Ubah Data Lama)
    public function save()
    {
        $model = new ArtikelModel();

        // Ambil ID dari form. Jika kosong, berarti ini Tambah Data. Jika ada isinya, berarti Ubah Data.
        $id = $this->request->getPost('id'); 
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi'   => $this->request->getPost('isi'),
            'slug'  => url_title($this->request->getPost('judul'), '-', true),
            'status'=> '0'
        ];

        if (empty($id)) {
            // Proses Insert (Tambah)
            $model->insert($data);
            $message = 'Data berhasil ditambahkan!';
        } else {
            // Proses Update (Ubah)
            $model->update($id, $data);
            $message = 'Data berhasil diubah!';
        }

        return $this->response->setJSON([
            'status' => 'OK', 
            'message' => $message
        ]);
    }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        
        return $this->response->setJSON(['status' => 'OK']);
    }
}