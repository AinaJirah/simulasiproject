<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelNilai;
use App\Models\ModelMahasiswa;
use App\Models\ModelMataKuliah;
use App\Models\ModelJadwal;


class Dashboard extends BaseController
{
    // Inisialisasi model yang digunakan
    protected $ModelNilai;
    protected $ModelMahasiswa;
    protected $ModelMataKuliah;
    protected $ModelJadwal;


    public function __construct()
    {
        // Menginisialisasi semua model yang akan digunakan dalam controller
        $this->ModelNilai = new ModelNilai();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelMataKuliah = new ModelMataKuliah();
        $this->ModelJadwal = new ModelJadwal();

    }

    public function index()
    {
        // Mendapatkan level pengguna dari session
        $level = session()->get('level');
        $data = [];

        // Cek jika pengguna adalah Mahasiswa
        if ($level === 'Mahasiswa') {
            $id_akun = session()->get('id_akun');
            $mahasiswa = $this->ModelMahasiswa->where('id_akun', $id_akun)->first();

            // Mendapatkan ID akun mahasiswa dari session
            if ($mahasiswa) {
                $id_mahasiswa = $mahasiswa['id_mahasiswa'];

                // Mengambil semua nilai milik mahasiswa berdasarkan ID mahasiswa
                $nilaiList = $this->ModelNilai->where('id_mahasiswa', $id_mahasiswa)->findAll();

                // Inisialisasi variabel untuk menghitung IPK, total SKS, dan jumlah mata kuliah
                $totalNilai = 0;
                $totalSKS = 0;
                $totalMataKuliah = count($nilaiList);

                // Looping untuk menghitung total nilai dan SKS berdasarkan mata kuliah
                foreach ($nilaiList as $nilai) {
                    $totalNilai += $nilai['nilai_angka'];
                    $matakuliah = $this->ModelMataKuliah->find($nilai['id_matakuliah']);
                    if ($matakuliah) {
                        $totalSKS += $matakuliah['sks'];
                    }
                }

                // Menghitung IPK berdasarkan total nilai dan jumlah mata kuliah
                $ipk = $totalMataKuliah > 0 ? round($totalNilai / $totalMataKuliah, 2) : 0;

                // Ambil jadwal hari ini
                $hariInggris = date('l'); // Nama hari dalam bahasa Inggris
                $hariIndonesia = [
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu',
                    'Sunday' => 'Minggu',
                ];
                $hariIni = $hariIndonesia[$hariInggris] ?? $hariInggris; // Terjemahkan ke bahasa Indonesia

                // Mengambil jadwal berdasarkan hari ini
                $jadwalHariIni = $this->ModelJadwal
                    ->select('jadwal.*, matakuliah.nama_matakuliah, dosen.nama_dosen')
                    ->join('matakuliah', 'matakuliah.id_matakuliah = jadwal.id_matakuliah')
                    ->join('nilai', 'nilai.id_matakuliah = matakuliah.id_matakuliah')
                    ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen')
                    ->where('nilai.id_mahasiswa', $id_mahasiswa)
                    ->where('jadwal.hari', $hariIni)
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
