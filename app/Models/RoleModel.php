<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'role_group';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
