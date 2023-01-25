<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmenuModel extends Model
{
    protected $table            = 'mst_submenu';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
