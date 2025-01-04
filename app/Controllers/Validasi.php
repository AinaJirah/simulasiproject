<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelPengguna;

class Validasi extends BaseController
{
    public function index()
    {
        echo view('auth/login');
    }

    public function login()
    {
        $ModelPengguna = new ModelPengguna();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[5]|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = $ModelPengguna->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set([
                    'id_pengguna' => $data['id_pengguna'],
                    'nama' => $data['nama'],
                    'alamat' => $data['alamat'],
                    'no_hp' => $data['no_hp'],
                    'username' => $data['username'],
                    'level' => $data['level'],
                ]);

                switch ($data['level']) {
                    case 'Admin':
                        return redirect()->to('/admin');
                    case 'Masyarakat':
                        return redirect()->to('/peminjam');
                    case 'Ka. Des':
                        return redirect()->to('/kades');
                    default:
                        return redirect()->to('/unauthorized');
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                return redirect()->to('/login')->withInput();
            }
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
            return redirect()->to('/login')->withInput();
        }
    }

    public function profil()
    {
        $ModelPengguna = new ModelPengguna();
        $id_pengguna = $this->request->getPost('id_pengguna');
        $password = $this->request->getPost('password');
        if ($password) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
        } else {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'username' => $this->request->getPost('username'),
            ];
        }
        // session
        session()->set('nama', $this->request->getPost('nama'));
        session()->set('no_hp', $this->request->getPost('no_hp'));
        session()->set('alamat', $this->request->getPost('alamat'));
        session()->set('username', $this->request->getPost('username'));

        $ModelPengguna->update($id_pengguna, $data);

        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diupdate</div>');
        if (session()->get('level') == 'Admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('level') == 'Ka. Des') {
            return redirect()->to('/kades');
        } else {
            return redirect()->to('/peminjam');
        }
    }

    public function logout()
    {
        // hapus session id_pengguna, nama, alamat, no_hp, username, level
        session()->remove('id_pengguna');
        session()->remove('nama');
        session()->remove('alamat');
        session()->remove('no_hp');
        session()->remove('username');
        session()->remove('level');
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout</div>');
        return redirect()->to('/');
    }
}
