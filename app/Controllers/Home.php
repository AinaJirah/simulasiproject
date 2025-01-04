<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->akun->getLogin($username);

        $validate = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong.'
                ]
            ]
        ]);

        if ($validate) {
            if ($user && password_verify("$password", $user['password'])) {
                session()->set('isLogin', true);
                session()->set('id_akun', $user['id_akun']);
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                session()->set('level', $user['level']);

                session()->setFlashdata('welcome_message', 'Selamat datang, ' . $user['username'] . '!');

                if ($user['level'] == 'admin') {
                    return redirect()->to(base_url('dashboard_admin'));
                } elseif ($user['level'] == 'peserta' || $user['level'] == 'kepsek') {
                    return redirect()->to(base_url('beranda'));
                } else {
                    return redirect()->back()->with('pesan', 'Gak Boleh !!');
                }
            } else {
                session()->setFlashdata('pesan', 'Username atau password salah.');
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->back()->withInput()->with('pesan', 'Username dan Password Tidak Boleh Kosong');
        }
    }

}
