<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenisAset extends Model
{
    protected $table            = 'jenis_aset';
    protected $primaryKey       = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis'];
}
