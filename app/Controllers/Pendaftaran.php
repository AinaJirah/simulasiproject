<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelPengguna;

class pendaftaran extends BaseController
{
    public function index()
    {
        echo view('auth/register');
    }

    public function pendaftaran()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
            'no_hp' => 'required|numeric|min_length[10]|max_length[15]',
            'alamat' => 'required|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]|is_unique[pengguna.username]',
            'password' => 'required|min_length[5]|max_length[255]',
            'password1' => 'required|min_length[5]|matches[password]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $ModelPengguna = new ModelPengguna();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => 'Masyarakat',
        ];
        $ModelPengguna->insert($data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil dibuat</div>');
        return redirect()->to('/login');
    }
}
