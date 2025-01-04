<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;

class Dashboard extends BaseController
{
    protected $ModelPengguna;

    public function __construct()
    {
        $this->ModelPengguna = new ModelPengguna();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin') {
            $data = [
                'title' => 'Dashboard',
                'pengguna' => $this->ModelPengguna->where('level', 'mahasiswa')->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/dashboard');
        } elseif ($level === 'Mahasiswa') {
            $data = [
                'title' => 'Dashboard',
                'IPK' => $this->ModelNilai->where('status_pinjam', 'Menunggu')->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_mahasiswa', $data);
            echo view('mahasiswa/dashboard');
        }else {
            return redirect()->to('/unauthorized');
        }

        echo view('components/footer');
    }
}
