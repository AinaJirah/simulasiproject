<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelAkun;

class Reset extends Controller
{
    public function index()
    {
        return view('auth/permintaan_reset'); // Tampilan untuk meminta email reset
    }

    public function kirimPermintaan()//Mengirimkan email untuk reset password dengan link reset.
    {
        $emailInput = $this->request->getPost('email');
        $model = new ModelAkun();
        $user = $model->where('email', $emailInput)->first();

        if ($user) {
            // Generate token untuk reset password
            $token = bin2hex(random_bytes(16));
            $tokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token berlaku 1 jam

            // Simpan token dan waktu kedaluwarsa ke database
            $model->update($user['id_akun'], [
                'reset_token' => $token,
                'token_expiry' => $tokenExpiry,
            ]);

            // Konfigurasi dan kirim email reset password
            $email = \Config\Services::email();
            $email->setFrom(config('Email')->fromEmail, config('Email')->fromName);
            $email->setTo($emailInput);
            $email->setSubject('Reset Password Anda');
            $email->setMessage('Klik tautan berikut untuk mereset password Anda: <a href="' . base_url('reset/resetPassword/' . $token) . '">Reset Password</a>.<br>Link ini hanya berlaku selama 1 jam.');

            if ($email->send()) {
                return redirect()->to('/login')->with('pesan', '<div class="alert alert-success">Link reset password berhasil dikirim ke email Anda.</div>');
            } else {
                // Debug jika gagal
                return redirect()->back()->with('pesan', '<div class="alert alert-danger">Gagal mengirim email. Silakan coba lagi nanti.</div>');
            }
        } else {
            return redirect()->back()->with('pesan', '<div class="alert alert-danger">Email tidak ditemukan.</div>');
        }
    }

    public function resetPassword($token = null)//Menampilkan halaman reset password berdasarkan token.
    {
        $model = new ModelAkun();
        $user = $model->where('reset_token', $token)->first();

        // Validasi token: cek apakah token valid atau sudah kedaluwarsa
        if (!$user || strtotime($user['token_expiry']) < time()) {
            return redirect()->to('/reset')->with('pesan', '<div class="alert alert-danger">Token tidak valid atau sudah kedaluwarsa.</div>');
        }

        $data = [
            'title' => 'Reset Password',
            'token' => $token,
        ];

        return view('auth/reset_password', $data);
    }

    public function ubahPassword()//Mengubah password berdasarkan token yang diberikan.
    {
        $model = new ModelAkun();
        $token = $this->request->getPost('token');
        $passwordBaru = $this->request->getPost('password');
        $konfirmasiPassword = $this->request->getPost('password1');

        // Validasi: memastikan password dan konfirmasi password cocok
        if ($passwordBaru !== $konfirmasiPassword) {
            return redirect()->back()->with('pesan', '<div class="alert alert-danger">Password dan konfirmasi password tidak cocok.</div>');
        }

        // Mencari user berdasarkan token
        $user = $model->where('reset_token', $token)->first();

        // Validasi token: cek apakah token valid atau sudah kedaluwarsa
        if (!$user || strtotime($user['token_expiry']) < time()) {
            return redirect()->to('/reset')->with('pesan', '<div class="alert alert-danger">Token tidak valid atau sudah kedaluwarsa.</div>');
        }

        // Update password dan hapus token reset
        $model->update($user['id_akun'], [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
            'reset_token' => null,
            'token_expiry' => null,
        ]);

        return redirect()->to('/login')->with('pesan', '<div class="alert alert-success">Password berhasil diubah. Silakan login.</div>');
    }
}
