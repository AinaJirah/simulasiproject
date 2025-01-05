<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;


class Jadwal extends BaseController
{
    protected $ModelJadwal;

    public function __construct()
    {
        $this->ModelJadwal = new ModelJadwal();
    }

    public function index()
    {
        $level = session()->get('level');
        $id_mahasiswa = session()->get('id_mahasiswa');

        if ($level !== 'Mahasiswa') {
            return redirect()->to('/unauthorized');
        }

        // Mengambil jadwal berdasarkan mata kuliah yang diambil mahasiswa
        $jadwal = $this->ModelJadwal
            ->select('jadwal.*, matakuliah.nama_matakuliah, dosen.nama_dosen')
            ->join('matakuliah', 'matakuliah.id_matakuliah = jadwal.id_matakuliah')
            ->join('nilai', 'nilai.id_matakuliah = matakuliah.id_matakuliah')
            ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen')
            ->where('nilai.id_mahasiswa', $id_mahasiswa)
            ->orderBy('FIELD(hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")') // Urutan hari
            ->findAll();

        // Kelompokkan jadwal berdasarkan hari
        $jadwalByHari = [];
        foreach ($jadwal as $j) {
            $jadwalByHari[$j['hari']][] = $j;
        }

        $data = [
            'title' => 'Jadwal Perkuliahan Saya',
            'jadwalByHari' => $jadwalByHari,
        ];

        echo view('components/header', $data);
        echo view('components/sidebar_mahasiswa', $data);
        echo view('mahasiswa/perkuliahan/jadwal', $data);
        echo view('components/footer');
    }

}
