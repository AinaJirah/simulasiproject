<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use App\Models\ModelPendaftaran;

<<<<<<< HEAD
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
=======
use App\Models\ModelPendaftaran;

class pendaftaran extends BaseController
{
    public function index()
    {
        echo view('auth/pendaftaran');
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
    }

    public function pendaftaran()
    {
        // Validasi input
<<<<<<< HEAD
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
=======
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
            'alamat' => 'required|min_length[10]|max_length[255]', 
            'tempat_lahir' => 'required|max_length[255]',
            'tanggal_lahir' => 'required|valid_date[Y-m-d]', 
            'no_telepon' => 'required|numeric|min_length[10]|max_length[15]', 
            'asal_sekolah' => 'required|min_length[3]|max_length[255]', 
            'nama_ayah' => 'required|min_length[3]|max_length[255]',
            'pekerjaan_ayah' => 'required|min_length[3]|max_length[255]',
            'nama_ibu' => 'required|min_length[3]|max_length[255]',
            'pekerjaan_ibu' => 'required|min_length[3]|max_length[255]',
            'file_foto' => 'uploaded[file_foto]|mime_in[file_foto,image/jpg,image/jpeg,image/png]|max_size[file_foto,2048]', 
            'file_ijazah' => 'uploaded[file_ijazah]|mime_in[file_ijazah,application/pdf,image/jpg,image/jpeg,image/png]|max_size[file_ijazah,2048]', 
            'tanggal_pendaftaran' => 'required|valid_date[Y-m-d]', 
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
        $ModelPendaftaran = new ModelPendaftaran();
        $data = [
            'id_akun' => session()->get('id_akun'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
<<<<<<< HEAD
            'no_telpon' => $this->request->getPost('no_telpon'),
=======
            'no_telepon' => $this->request->getPost('no_telepon'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
<<<<<<< HEAD
            'file_foto' => $fileFotoName ?? null,
            'file_ijazah' => $fileIjazahName ?? null,
            'status_verefikasi' => 'Verified',
        ];

        $ModelPendaftaran->insert($data);

        // Flash message tanpa menyimpan file ke session
        session()->setFlashdata('pesan', '<div class="alert alert-success">Pendaftaran berhasil. Silakan cek status pendaftaran Anda.</div>');

        return redirect()->to('/pendaftaran');
=======
            'file_foto' => $this->request->getFile('file_foto')->getName(),
            'file_ijazah' => $this->request->getFile('file_ijazah')->getName(),
            'tanggal_pendaftaran' => $this->request->getPost('tanggal_pendaftaran'),
        ];

        //  Memindahkan file yang diunggah ke folder
        $fileFoto = $this->request->getFile('file_foto');
        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $fileFoto->move(WRITEPATH . 'uploads/foto', $fileFoto->getName());
        }

        $fileIjazah = $this->request->getFile('file_ijazah');
        if ($fileIjazah->isValid() && !$fileIjazah->hasMoved()) {
            $fileIjazah->move(WRITEPATH . 'uploads/ijazah', $fileIjazah->getName());
        }

        $ModelPendaftaran->insert($data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Pendaftaran berhasil dilakukan</div>');
        return redirect()->to('/login');
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
    }
}
