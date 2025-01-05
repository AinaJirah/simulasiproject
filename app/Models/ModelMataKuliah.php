<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMataKuliah extends Model
{
    protected $table            = 'matakuliah';
    protected $primaryKey       = 'id_matakuliah';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_matakuliah','nama_matakuliah','sks','id_jurusan'];
}
