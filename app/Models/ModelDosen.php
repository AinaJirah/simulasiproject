<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    protected $table            = 'dosen';
    protected $primaryKey       = 'id_dosen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_dosen','nip','id_jurusan'];
}
