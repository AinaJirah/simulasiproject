<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    protected $table            = 'nilai';
    protected $primaryKey       = 'id_nilai';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_mahasiswa','id_matakuliah','nilai_angka','nilai_huruf','semester'];
}
