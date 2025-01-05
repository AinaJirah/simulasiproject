<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use App\Models\ModelPendaftaran;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $ModelPendaftaran = new ModelPendaftaran();
        $ModelJurusan = new ModelJurusan();

        // Ambil data pendaftaran berdasarkan akun
        $pendaftaran = $ModelPendaftaran->where('id_akun', session()->get('id_akun'))->first();

        // Jika sudah mendaftar, tampilkan data read-only
        if ($pendaftaran) {
            $data['pendaftaran'] = $pendaftaran;
            $data['jurusan'] = $ModelJurusan->find($pendaftaran['id_jurusan']);
            return view('auth/pendaftaran_readonly', $data);
        }

        // Jika belum mendaftar, tampilkan form pendaftaran
        $data['jurusan'] = $ModelJurusan->findAll();
        return view('auth/pendaftaran', $data);
    }

    public function pendaftaran()
    {
        // Validasi input
        if (
            !$this->validate([
                'nama' => 'required|min_length[3]|max_length[50]',
                'alamat' => 'required|max_length[255]',
                'tempat_lahir' => 'required|max_length[50]',
                'tanggal_lahir' => 'required|valid_date',
                'no_telpon' => 'required|numeric|min_length[10]|max_length[15]',
                'id_jurusan' => 'required|is_not_unique[jurusan.id_jurusan]',
                'nama_ayah' => 'required|max_length[50]',
                'pekerjaan_ayah' => 'required|max_length[50]',
                'nama_ibu' => 'required|max_length[50]',
                'pekerjaan_ibu' => 'required|max_length[50]',
                'file_foto' => 'uploaded[file_foto]|is_image[file_foto]|max_size[file_foto,2048]',
                'file_ijazah' => 'uploaded[file_ijazah]|ext_in[file_ijazah,pdf]|max_size[file_ijazah,2048]',
            ])
        ) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Proses file upload
        $fileFoto = $this->request->getFile('file_foto');
        $fileIjazah = $this->request->getFile('file_ijazah');

        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $fileFotoName = $fileFoto->getRandomName();
            $fileFoto->move('uploads/foto', $fileFotoName);
        }

        if ($fileIjazah->isValid() && !$fileIjazah->hasMoved()) {
            $fileIjazahName = $fileIjazah->getRandomName();
            $fileIjazah->move('uploads/ijazah', $fileIjazahName);
        }

        // Simpan data ke database
        $ModelPendaftaran = new ModelPendaftaran();
        $data = [
            'id_akun' => session()->get('id_akun'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_telpon' => $this->request->getPost('no_telpon'),
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            'file_foto' => $fileFotoName ?? null,
            'file_ijazah' => $fileIjazahName ?? null,
            'status_verefikasi' => 'Verified',
        ];

        $ModelPendaftaran->insert($data);

        // Flash message tanpa menyimpan file ke session
        session()->setFlashdata('pesan', '<div class="alert alert-success">Pendaftaran berhasil. Silakan cek status pendaftaran Anda.</div>');

        return redirect()->to('/pendaftaran');
    }
}
