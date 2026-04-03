<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    // ============ METHOD PUBLIK ============
    
    public function index()
    {
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        
        $title = 'Portal Berita';
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    // ============ METHOD ADMIN ============
    
    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        
        return view('artikel/admin_index', compact('artikel', 'title'));
    }

    // ============ METHOD TAMBAH ARTIKEL ============
    
    public function add()
    {
        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|min_length[3]|max_length[255]',
            'isi' => 'required|min_length[10]'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $artikel = new ArtikelModel();
            
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul'), '-', true),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            session()->setFlashdata('success', 'Artikel berhasil ditambahkan');
            return redirect()->to('/admin/artikel');
        }
        
        $title = "Tambah Artikel";
        return view('artikel/form_add', compact('title'));
    }

    // ============ METHOD EDIT ARTIKEL ============
    
    public function edit($id)
    {
        $artikelModel = new ArtikelModel();
        
        // Ambil data artikel berdasarkan ID
        $artikel = $artikelModel->find($id);

        // Cek apakah artikel ditemukan
        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|min_length[3]|max_length[255]',
            'isi' => 'required|min_length[10]'
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            // Data yang akan diupdate
            $data = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul'), '-', true),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            // Update ke database
            $artikelModel->update($id, $data);
            
            // Set flash message sukses
            session()->setFlashdata('success', 'Artikel berhasil diupdate');
            
            return redirect()->to('/admin/artikel');
        }
        
        // Tampilkan form edit dengan data lama
        $title = "Edit Artikel";
        return view('artikel/form_edit', compact('title', 'artikel'));
    }

    // ============ METHOD HAPUS ARTIKEL ============
    
    public function delete($id)
    {
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->find($id);
        
        if ($artikel) {
            // Hapus data dari database
            $artikelModel->delete($id);
            
            session()->setFlashdata('success', 'Artikel berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Artikel tidak ditemukan');
        }
        
        return redirect()->to('/admin/artikel');
    }
}

