<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelAkun;

class Registrasi extends BaseController
{
    public function index()
    {
        echo view('auth/register');
    }

    public function registrasi()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|min_length[3]|max_length[255]|valid_email',
            'username' => 'required|min_length[3]|max_length[255]|is_unique[akun.username]',
            'password' => 'required|min_length[5]|max_length[255]',
            'password1' => 'required|min_length[5]|matches[password]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $ModelAkun = new ModelAkun();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => 'Mahasiswa',
        ];
        $ModelAkun->insert($data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil dibuat</div>');
        return redirect()->to('/loginpendaftaran');
    }
}
