<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMataKuliah;
use App\Models\ModelNilai;

class MataKuliah extends BaseController
{
    protected $ModelMataKuliah;
    protected $ModelNilai;

    public function __construct()
    {
        $this->ModelMataKuliah = new ModelMataKuliah();
        $this->ModelNilai = new ModelNilai();
    }

    public function index()
    {
        $level = session()->get('level');
        $id_mahasiswa = session()->get('id_mahasiswa'); // ID mahasiswa dari sesi login
        $data = [];

        if ($level === 'Admin') {
            // Admin dapat melihat semua mata kuliah
            $data = [
                'title' => 'Mata Kuliah',
                'matakuliah' => $this->ModelMataKuliah
                    ->select('matakuliah.*, jurusan.nama_jurusan')
                    ->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan')
                    ->findAll(),
            ];
        } elseif ($level === 'Mahasiswa') {
            // Mahasiswa hanya melihat mata kuliah yang diambil
            $data = [
                'title' => 'Mata Kuliah yang Diambil',
                'matakuliah' => $this->ModelMataKuliah
                    ->select('matakuliah.*, jurusan.nama_jurusan')
                    ->join('nilai', 'nilai.id_matakuliah = matakuliah.id_matakuliah')
                    ->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan')
                    ->where('nilai.id_mahasiswa', $id_mahasiswa) // Filter berdasarkan mahasiswa
                    ->findAll(),
            ];
        } else {
            return redirect()->to('/unauthorized');
        }

        echo view('components/header', $data);

        if ($level === 'Admin') {
            echo view('components/sidebar_admin', $data);
            echo view('admin/matakuliah', $data);
        } elseif ($level === 'Mahasiswa') {
            echo view('components/sidebar_mahasiswa', $data);
            echo view('mahasiswa/perkuliahan/matakuliah', $data);
        }

        echo view('components/footer');
    }
}
