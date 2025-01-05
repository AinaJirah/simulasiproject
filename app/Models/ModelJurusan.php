<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id_jurusan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jurusan'];
}
