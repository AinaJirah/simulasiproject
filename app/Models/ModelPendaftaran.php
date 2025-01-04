<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran'; 
    protected $primaryKey = 'id_pendaftaran'; 
    protected $allowedFields = [
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'asal_sekolah',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'file_foto',
        'file_ijazah',
        'tanggal_pendaftaran',
    ]; 

    // Validasi data sebelum disimpan
    protected $validationRules = [
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
    ];

    // Pesan validasi custom (opsional)
    protected $validationMessages = [
        'file_foto' => [
            'uploaded' => 'Foto profil harus diunggah.',
            'mime_in' => 'Foto profil harus berupa file gambar dengan format JPG, JPEG, atau PNG.',
            'max_size' => 'Ukuran foto profil tidak boleh lebih dari 2MB.',
        ],
        'file_ijazah' => [
            'uploaded' => 'Ijazah harus diunggah.',
            'mime_in' => 'Ijazah harus berupa file PDF, JPG, JPEG, atau PNG.',
            'max_size' => 'Ukuran file ijazah tidak boleh lebih dari 2MB.',
        ],
    ];

    // Metode untuk memproses file upload
    public function handleFileUpload($fileInput, $folder = 'uploads')
    {
        $file = $this->request->getFile($fileInput);
        if ($file->isValid() && !$file->hasMoved()) {
            // Menyimpan file ke folder yang sesuai
            $file->move(WRITEPATH . $folder);
            return $file->getName(); // Mengembalikan nama file yang dipindahkan
        }
        return null; // Jika tidak valid
    }
}
