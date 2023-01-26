<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table            = 'anggota';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [];

    public function getAnggota($userID = '')
    {
        $builder = $this->table($this->table);
        $builder->select('anggota.*, role_group.role');
        $builder->join('role_group', 'role_group.id = anggota.level');

        if ($userID) {
            $builder->where('anggota.id', $userID);
        }

        $builder->orderBy('anggota.id', 'DESC');

        return $builder->get()->getResultObject();
    }
}
