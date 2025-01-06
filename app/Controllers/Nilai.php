<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelNilai;
use App\Models\ModelMahasiswa;

class Nilai extends BaseController
{
    protected $ModelNilai;
    protected $ModelMahasiswa;

    public function __construct()
    {
        $this->ModelNilai = new ModelNilai();
        $this->ModelMahasiswa = new ModelMahasiswa();
    }

    public function index()
    {
        // Memeriksa apakah pengguna yang sedang login adalah "Mahasiswa"
        $id_mahasiswa = session()->get('id_mahasiswa');
        $level = session()->get('level');

        // Jika pengguna bukan mahasiswa atau tidak memiliki ID mahasiswa, redirect ke halaman unauthorized
        if ($level !== 'Mahasiswa' || !$id_mahasiswa) {
            return redirect()->to('/unauthorized');
        }

        // Mengambil data nilai mahasiswa yang sedang login
        $nilai = $this->ModelNilai
            ->select('nilai.*, matakuliah.nama_matakuliah, matakuliah.sks')
            ->join('matakuliah', 'matakuliah.id_matakuliah = nilai.id_matakuliah')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->orderBy('semester', 'ASC')
            ->findAll();

        // Mengelompokkan nilai berdasarkan semester
        $nilaiBySemester = [];
        foreach ($nilai as $n) {
            $nilaiBySemester[$n['semester']][] = $n;
        }

        $data = [
            'title' => 'Nilai Saya',
            'nilaiBySemester' => $nilaiBySemester,
        ];

        echo view('components/header', $data);
        echo view('components/sidebar_mahasiswa', $data);
        echo view('mahasiswa/perkuliahan/nilai', $data);
        echo view('components/footer');
    }

    public function cetak_transkrip()
    {
        // Memeriksa apakah pengguna yang sedang login adalah "Mahasiswa"
        $id_mahasiswa = session()->get('id_mahasiswa');
        $level = session()->get('level');

        if ($level !== 'Mahasiswa' || !$id_mahasiswa) {
            return redirect()->to('/unauthorized');
        }

        // Mengambil data nilai mahasiswa yang sedang login
        $nilai = $this->ModelNilai
            ->select('nilai.*, matakuliah.nama_matakuliah, matakuliah.sks')
            ->join('matakuliah', 'matakuliah.id_matakuliah = nilai.id_matakuliah')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->findAll();

        // Mengambil data detail mahasiswa
        $mahasiswa = $this->ModelMahasiswa->where('id_mahasiswa', $id_mahasiswa)->first();

        // Menghitung IPK (Jumlah Nilai Angka / Total Mata Kuliah yang Diambil)
        $totalNilaiAngka = 0;
        $totalMataKuliah = count($nilai);
        $totalSKS = 0;

        foreach ($nilai as $row) {
            $totalNilaiAngka += $row['nilai_angka'];
            $totalSKS += $row['sks'];
        }

        $ipk = $totalMataKuliah > 0 ? round($totalNilaiAngka / $totalMataKuliah, 2) : 0;

        $data = [
            'title' => 'Transkrip Nilai',
            'mahasiswa' => $mahasiswa,
            'nilai' => $nilai,
            'ipk' => $ipk,
            'total_sks' => $totalSKS,
        ];

        echo view('mahasiswa/print/transkrip', $data);
    }
}
