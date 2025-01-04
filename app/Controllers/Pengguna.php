<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;

class Pengguna extends BaseController
{
    protected $modelPengguna;

    public function __construct()
    {
        $this->modelPengguna = new ModelPengguna();
    }

    public function index()
    {
        $level = session()->get('level');

        if ($level === 'Admin') {
            $data = [
                'title' => 'Akun',
                'akun' => $this->modelPengguna->findAll(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/master_data/akun', $data);
            echo view('components/footer');
        } else {
            return redirect()->to('/unauthorized');
        }
    }

    public function edit_akun()
{
    $level = session()->get('level');

    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    $id_pengguna = $this->request->getPost('id_pengguna');

    // Validasi input
    $rules = [
        'username' => 'required|min_length[3]|max_length[255]',
        'level' => 'required|in_list[Admin,Ka. Des,Masyarakat]',
        'status_akun' => 'required|in_list[Aktif,Tidak Aktif]'
    ];

    if ($this->request->getPost('password')) {
        $rules['password'] = 'required|min_length[5]|max_length[255]';
    }

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('validation', $this->validator)->with('edit_gagal', true)->with('id_pengguna', $id_pengguna);
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'level' => $this->request->getPost('level'),
        'status_akun' => $this->request->getPost('status_akun'),
    ];

    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $this->modelPengguna->update($id_pengguna, $data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    return redirect()->to('/admin/master-akun');
}



    public function pengguna()
    {
        $level = session()->get('level');

        if ($level === 'Admin') {
            $data = [
                'title' => 'Data Pengguna',
                'pengguna' => $this->modelPengguna->findAll(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/master_data/pengguna', $data);
            echo view('components/footer');
        } else {
            return redirect()->to('/unauthorized');
        }
    }

    public function tambah_pengguna()
{
    $level = session()->get('level');

    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    // Validasi input
    if (!$this->validate([
        'nama' => 'required|min_length[3]|max_length[255]',
        'no_hp' => 'required|numeric|min_length[10]|max_length[15]',
        'alamat' => 'required|max_length[255]',
        'username' => 'required|min_length[3]|max_length[255]|is_unique[pengguna.username]',
        'password' => 'required|min_length[5]|max_length[255]',
        'level' => 'required|in_list[Admin,Ka. Des,Masyarakat]',
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'nama' => $this->request->getPost('nama'),
        'no_hp' => $this->request->getPost('no_hp'),
        'alamat' => $this->request->getPost('alamat'),
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'level' => $this->request->getPost('level'),
        'status_akun' => 'Aktif',
    ];
    $this->modelPengguna->insert($data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
    return redirect()->to('/admin/master-pengguna');
}

public function edit_pengguna()
{
    $level = session()->get('level');

    if ($level !== 'Admin') {
        return redirect()->to('/unauthorized');
    }

    $id_pengguna = $this->request->getPost('id_pengguna');

    // Validasi input
    if (!$this->validate([
        'nama' => 'required|min_length[3]|max_length[255]',
        'no_hp' => 'required|numeric|min_length[10]|max_length[15]',
        'alamat' => 'required|max_length[255]',
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'nama' => $this->request->getPost('nama'),
        'no_hp' => $this->request->getPost('no_hp'),
        'alamat' => $this->request->getPost('alamat'),
    ];
    $this->modelPengguna->update($id_pengguna, $data);
    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    return redirect()->to('/admin/master-pengguna');
}


    public function hapus_pengguna()
    {
        $level = session()->get('level');

        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $id_pengguna = $this->request->getPost('id_pengguna');
        $this->modelPengguna->delete($id_pengguna);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        return redirect()->to('/admin/master-pengguna');
    }
}
