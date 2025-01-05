<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_matakuliah', 'id_dosen', 'hari', 'tanggal', 'jam_mulai', 'jam_selesai', 'ruangan'];
}
