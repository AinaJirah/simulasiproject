<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun;

class Dashboard extends BaseController
{
    protected $ModelAkun;

    public function __construct()
    {
        $this->ModelAkun = new ModelAkun();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin') {
            $data = [
                'title' => 'Dashboard',
                'pengguna' => $this->ModelAkun->where('level', 'mahasiswa')->countAllResults(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/dashboard');
        } elseif ($level === 'Mahasiswa') {
            $data = [
                'title' => 'Dashboard',
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
