<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkun extends Model
{
    protected $table            = 'akun';
    protected $primaryKey       = 'id_akun';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','email','username', 'password', 'level', 'status_akun', 'created_add', 'reset_token','token_expiry' ];
}
