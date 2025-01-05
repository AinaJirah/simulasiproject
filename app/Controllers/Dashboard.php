<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun;
use App\Models\ModelNilai;
use App\Models\ModelMahasiswa;
use App\Models\ModelMataKuliah;

class Dashboard extends BaseController
{
    protected $ModelAkun;
    protected $ModelNilai;
    protected $ModelMahasiswa;
    protected $ModelMataKuliah;

    public function __construct()
    {
        $this->ModelAkun = new ModelAkun();
        $this->ModelNilai = new ModelNilai();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelMataKuliah = new ModelMataKuliah();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin') {
            // Data tambahan untuk Admin
            $data = [
                'title' => 'Dashboard',
                'pengguna' => $this->ModelAkun->where('level', 'mahasiswa')->countAllResults(),
                'total_mahasiswa' => $this->ModelMahasiswa->countAllResults(),
                'total_matakuliah' => $this->ModelMataKuliah->countAllResults(),
                'mahasiswa_per_jurusan' => $this->ModelMahasiswa->select('id_jurusan, COUNT(*) as total')
                    ->join('matakuliah', 'matakuliah.id_jurusan = mahasiswa.id_jurusan')
                    ->groupBy('id_jurusan')
                    ->findAll(),
            ];
            echo view('components/header', $data);
            echo view('components/sidebar_admin', $data);
            echo view('admin/dashboard', $data);
        } elseif ($level === 'Mahasiswa') {
            $id_akun = session()->get('id_akun');
            $mahasiswa = $this->ModelMahasiswa->where('id_akun', $id_akun)->first();

            if ($mahasiswa) {
                $id_mahasiswa = $mahasiswa['id_mahasiswa'];

                // Ambil data nilai
                $nilaiList = $this->ModelNilai->where('id_mahasiswa', $id_mahasiswa)->findAll();

                // Hitung informasi tambahan
                $totalNilai = 0;
                $totalSKS = 0;
                $totalMataKuliah = count($nilaiList);

                foreach ($nilaiList as $nilai) {
                    $totalNilai += $nilai['nilai_angka'];
                    $matakuliah = $this->ModelMataKuliah->find($nilai['id_matakuliah']);
                    if ($matakuliah) {
                        $totalSKS += $matakuliah['sks'];
                    }
                }

                $ipk = $totalMataKuliah > 0 ? round($totalNilai / $totalMataKuliah, 2) : 0;

                $data = [
                    'title' => 'Dashboard',
                    'ipk' => $ipk,
                    'total_sks' => $totalSKS,
                    'total_matakuliah' => $totalMataKuliah,
                ];
            } else {
                $data = [
                    'title' => 'Dashboard',
                    'ipk' => 0,
                    'total_sks' => 0,
                    'total_matakuliah' => 0,
                ];
            }

            echo view('components/header', $data);
            echo view('components/sidebar_mahasiswa', $data);
            echo view('mahasiswa/dashboard', $data);
        } else {
            return redirect()->to('/unauthorized');
        }

        echo view('components/footer');
    }
}
