<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAset extends Model
{
    protected $table            = 'aset';
    protected $primaryKey       = 'id_aset';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_aset', 'id_jenis', 'stok', 'foto'];
}
 