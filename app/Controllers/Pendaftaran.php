<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelPengguna;

class pendaftaran extends BaseController
{
    public function index()
    {
        echo view('auth/pendaftaran');
    }

    public function pendaftaran()
    {
        // Validasi input
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

        $ModelPendaftaran = new ModelPendaftaran();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
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
    }
}
