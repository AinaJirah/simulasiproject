<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;
use App\Models\ModelPeminjaman;

class Dashboard extends BaseController
{
    protected $ModelPengguna;
    protected $ModelPeminjaman;

    public function __construct()
    {
        $this->ModelPengguna = new ModelPengguna();
        $this->ModelPeminjaman = new ModelPeminjaman();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin') {
            $data = [
                'title' => 'Dashboard',
                'pengguna' => $this->ModelPengguna->where('level', 'Masyarakat')->countAllResults(),
                'menunggu_konfirmasi' => $this->ModelPeminjaman->where('status_pinjam', 'Menunggu')->countAllResults(),
                'menunggu_dikembalikan' => $this->ModelPeminjaman->where('status_pinjam', 'Dipinjam')->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/dashboard');
        } elseif ($level === 'Ka. Des') {
            $data = [
                'title' => 'Dashboard',
                'menunggu_konfirmasi' => $this->ModelPeminjaman->where('status_pinjam', 'Menunggu')->countAllResults(),
                'menunggu_dikembalikan' => $this->ModelPeminjaman->where('status_pinjam', 'Dipinjam')->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_kades', $data);
            echo view('kades/dashboard');
        } elseif ($level === 'Masyarakat') {
            $data = [
                'title' => 'Dashboard',
                'menunggu_konfirmasi' => $this->ModelPeminjaman->where('status_pinjam', 'Menunggu')->where('id_pengguna', session()->get('id_pengguna'))->countAllResults(),
                'menunggu_dikembalikan' => $this->ModelPeminjaman->where('status_pinjam', 'Dipinjam')->where('id_pengguna', session()->get('id_pengguna'))->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_peminjam', $data);
            echo view('peminjam/dashboard');
        } else {
            return redirect()->to('/unauthorized');
        }

        echo view('components/footer');
    }
}
