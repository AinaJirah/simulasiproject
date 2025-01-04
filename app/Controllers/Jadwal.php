<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAset;
use App\Models\ModelJenisAset;

class Jadwal extends BaseController
{
    protected $ModelAset;
    protected $ModelJenisAset;

    public function __construct()
    {
        $this->ModelAset = new ModelAset();
        $this->ModelJenisAset = new ModelJenisAset();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [
            'title' => 'Aset Barang',
            'jenis_aset' => $this->ModelJenisAset->findAll(),
            'aset' => $this->ModelAset->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')->findAll(),
        ];

        if ($level === 'Admin') {
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/master_data/aset_barang');
            echo view('components/footer');
        } elseif ($level === 'Masyarakat') {
            echo view('components/header', $data);
            echo view('components/sidebar_masyarakat', $data);
            echo view('mahasiswa/management/aset_barang');
            echo view('components/footer');
        } else {
            return redirect()->to('/unauthorized');
        }
    }
}
