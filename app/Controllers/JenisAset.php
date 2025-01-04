<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenisAset;

class JenisAset extends BaseController
{
    protected $modelJenisAset;

    public function __construct()
    {
        $this->modelJenisAset = new ModelJenisAset();
    }

    public function index()
    {
        $level = session()->get('level');

        if ($level === 'Admin') {
            $data = [
                'title' => 'Jenis Aset',
                'jenis_aset' => $this->modelJenisAset->findAll(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/master_data/kategori_jenis', $data);
            echo view('components/footer');
        } else {
            return redirect()->to('/unauthorized');
        }
    }

    public function tambah()
{
    $level = session()->get('level');
    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    // Validasi input
    if (!$this->validate([
        'jenis' => 'required|min_length[3]|max_length[255]'
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'jenis' => $this->request->getPost('jenis'),
    ];
    $this->modelJenisAset->insert($data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
    return redirect()->to('/admin/master-kategori');
}

public function edit()
{
    $level = session()->get('level');
    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    $id_jenis = $this->request->getPost('id_jenis');

    // Validasi input
    if (!$this->validate([
        'jenis' => 'required|min_length[3]|max_length[255]'
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'jenis' => $this->request->getPost('jenis'),
    ];
    $this->modelJenisAset->update($id_jenis, $data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    return redirect()->to('/admin/master-kategori');
}


    public function hapus()
    {
        $level = session()->get('level');
        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $id_jenis = $this->request->getPost('id_jenis');
        $this->modelJenisAset->delete($id_jenis);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        return redirect()->to('/admin/master-kategori');
    }
}
