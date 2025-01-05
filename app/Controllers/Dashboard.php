<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelNilai;
use App\Models\ModelMahasiswa;
use App\Models\ModelMataKuliah;
use App\Models\ModelJadwal;


class Dashboard extends BaseController
{
    protected $ModelNilai;
    protected $ModelMahasiswa;
    protected $ModelMataKuliah;
    protected $ModelJadwal;


    public function __construct()
    {
        $this->ModelNilai = new ModelNilai();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelMataKuliah = new ModelMataKuliah();
        $this->ModelJadwal = new ModelJadwal();

    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin') {
            // Data tambahan untuk Admin
            $data = [
                'title' => 'Dashboard',
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

                // Ambil jadwal hari ini
                $hariIni = date('l'); // Contoh: "Monday", "Tuesday", dll.
                $jadwalHariIni = $this->ModelJadwal
                    ->select('jadwal.*, matakuliah.nama_matakuliah, dosen.nama_dosen')
                    ->join('matakuliah', 'matakuliah.id_matakuliah = jadwal.id_matakuliah')
                    ->join('nilai', 'nilai.id_matakuliah = matakuliah.id_matakuliah')
                    ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen')
                    ->where('nilai.id_mahasiswa', $id_mahasiswa)
                    ->where('jadwal.hari', $hariIni) // Filter berdasarkan hari ini
                    ->findAll();

                $data = [
                    'title' => 'Dashboard',
                    'ipk' => $ipk,
                    'total_sks' => $totalSKS,
                    'total_matakuliah' => $totalMataKuliah,
                    'jadwal_hari_ini' => $jadwalHariIni,
                ];
            } else {
                $data = [
                    'title' => 'Dashboard',
                    'ipk' => 0,
                    'total_sks' => 0,
                    'total_matakuliah' => 0,
                    'jadwal_hari_ini' => [],
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
