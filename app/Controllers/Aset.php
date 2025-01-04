<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAset;
use App\Models\ModelJenisAset;

class Aset extends BaseController
{
    protected $ModelAset;
    protected $ModelJenisAset;

    public function __construct()
    {
        $this->ModelAset = new ModelAset();
        $this->ModelJenisAset = new ModelJenisAset();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [
            'title' => 'Aset Barang',
            'jenis_aset' => $this->ModelJenisAset->findAll(),
            'aset' => $this->ModelAset->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')->findAll(),
        ];

        if ($level === 'Admin') {
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/master_data/aset_barang');
            echo view('components/footer');
        } elseif ($level === 'Ka. Des') {
            echo view('components/header', $data);
            echo view('components/sidebar_kades', $data);
            echo view('kades/management/aset_barang');
            echo view('components/footer');
        } elseif ($level === 'Masyarakat') {
            echo view('components/header', $data);
            echo view('components/sidebar_peminjam', $data);
            echo view('peminjam/management/aset_barang');
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
    $validation = \Config\Services::validation();
    $validation->setRules([
        'id_jenis' => 'required|integer',
        'nama_aset' => 'required|string|max_length[255]',
        'stok' => 'required|integer|greater_than_equal_to[1]',
        'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
    ]);

    if (!$this->validate($validation->getRules())) {
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->back()->withInput();
    }

    $data = [
        'id_jenis' => $this->request->getPost('id_jenis'),
        'nama_aset' => $this->request->getPost('nama_aset'),
        'stok' => $this->request->getPost('stok'),
        'foto' => $this->request->getFile('foto'),
    ];

    // Proses upload foto
    $data['foto']->move('img/aset');
    $data['foto'] = $data['foto']->getName();

    $this->ModelAset->insert($data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
    return redirect()->to('admin/master-aset');
}

public function edit()
{
    $level = session()->get('level');
    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'id_jenis' => 'required|integer',
        'nama_aset' => 'required|string|max_length[255]',
        'stok' => 'required|integer|greater_than_equal_to[1]',
        'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
    ]);

    if (!$this->validate($validation->getRules())) {
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->back()->withInput();
    }

    $id_aset = $this->request->getPost('id_aset');
    $data = [
        'id_jenis' => $this->request->getPost('id_jenis'),
        'nama_aset' => $this->request->getPost('nama_aset'),
        'stok' => $this->request->getPost('stok'),
        'foto' => $this->request->getFile('foto'),
    ];

    $foto_lama = $this->request->getPost('foto_lama');
    if ($data['foto']->getError() == 4) {
        $data['foto'] = $foto_lama;
    } else {
        $data['foto']->move('img/aset');
        $data['foto'] = $data['foto']->getName();
        unlink('img/aset/' . $foto_lama);
    }

    $this->ModelAset->update($id_aset, $data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    return redirect()->to('/admin/master-aset');
}


    public function hapus()
    {
        $level = session()->get('level');
        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $id_aset = $this->request->getPost('id_aset');
        $foto = $this->ModelAset->find($id_aset);
        unlink('img/aset/' . $foto['foto']);
        $this->ModelAset->delete($id_aset);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        return redirect()->to('/admin/master-aset');
    }

    public function aset_barang()
    {
        $data = [
            'title' => 'Aset Barang',
            'aset' => $this->ModelAset->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')->findAll(),
        ];
        echo view('components/header', $data);
        echo view('components/sidebar_admin', $data);
        echo view('admin/management/aset_barang');
        echo view('components/footer');
    }
}
