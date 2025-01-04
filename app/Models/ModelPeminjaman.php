<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_pinjam', 'tgl_kembali', 'status_pinjam', 'catatan', 'alasan_tolak', 'id_aset', 'id_pengguna', 'qty', 'tgl_konfirmasi'];
}
