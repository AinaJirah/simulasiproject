<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun;
use App\Models\ModelPendaftaran;
use App\Models\ModelMahasiswa;


class Validasi extends BaseController
{
    public function index()
    {
        echo view('auth/login');
    }

    public function login()
    {
        $ModelAkun = new ModelAkun();
        $ModelPendaftaran = new ModelPendaftaran();
        $ModelMahasiswa = new ModelMahasiswa();


        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (
            !$this->validate([
                'username' => 'required|min_length[3]|max_length[255]',
                'password' => 'required|min_length[5]|max_length[255]',
            ])
        ) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = $ModelAkun->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                // Cek status pendaftaran
                $pendaftaran = $ModelPendaftaran->where('id_akun', $data['id_akun'])->first();

                if (!$pendaftaran) {
                    session()->setFlashdata('pesan', '<div class="alert alert-warning">Pendaftaran tidak ditemukan. Silakan daftar terlebih dahulu.</div>');
                    return redirect()->to('/login')->withInput();
                }

                if ($pendaftaran['status_verefikasi'] !== 'Verified') {
                    session()->setFlashdata('pesan', '<div class="alert alert-danger">Pendaftaran Anda belum diverifikasi atau ditolak.</div>');
                    return redirect()->to('/login')->withInput();
                }

                // Ambil id_mahasiswa berdasarkan id_akun
                $mahasiswa = $ModelMahasiswa->where('id_akun', $data['id_akun'])->first();

                if (!$mahasiswa) {
                    session()->setFlashdata('pesan', '<div class="alert alert-warning">Akun ini tidak terdaftar sebagai mahasiswa.</div>');
                    return redirect()->to('/login')->withInput();
                }

                // Login berhasil
                session()->set([
                    'id_akun' => $data['id_akun'],
                    'nama' => $data['nama'],
                    'username' => $data['username'],
                    'level' => $data['level'],
                    'id_mahasiswa' => $mahasiswa['id_mahasiswa'], // Tambahkan id_mahasiswa ke sesi
                ]);

                switch ($data['level']) {
                    case 'Admin':
                        return redirect()->to('/admin');
                    case 'Mahasiswa':
                        return redirect()->to('/mahasiswa');
                    default:
                        return redirect()->to('/unauthorized');
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger">Password salah</div>');
                return redirect()->to('/login')->withInput();
            }
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger">Username tidak ditemukan</div>');
            return redirect()->to('/login')->withInput();
        }
    }
    public function pendaftaran()
    {
        echo view('auth/loginpendaftaran');
    }

    public function loginpendaftaran()
    {
        $ModelAkun = new ModelAkun();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (
            !$this->validate([
                'username' => 'required|min_length[3]|max_length[255]',
                'password' => 'required|min_length[5]|max_length[255]',
            ])
        ) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = $ModelAkun->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set([
                    'id_akun' => $data['id_akun'],
                    'nama' => $data['nama'],
                    'username' => $data['username'],
                    'level' => $data['level'],
                ]);
                return redirect()->to('/pendaftaran');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                return redirect()->to('/loginpendaftaran')->withInput();
            }
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
            return redirect()->to('/loginpendaftaran')->withInput();
        }
    }

    public function profil()
    {
        $ModelAkun = new ModelAkun();
        $id_akun = $this->request->getPost('id_akun');
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

        $ModelAkun->update($id_akun, $data);

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
        session()->destroy(); // Menghapus seluruh session yang ada
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil logout</div>');
        return redirect()->to('/');
    }
}
