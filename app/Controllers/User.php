<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\RoleModel;
use App\Models\SubmenuModel;

class User extends BaseController
{
    protected $submenuModel;
    protected $anggotaModel;
    protected $roleModel;

    public function __construct()
    {
        $this->submenuModel = new SubmenuModel();
        $this->anggotaModel = new AnggotaModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {

        if (!check_login(session('userID'))) return redirect()->to('/login');

        // dd($this->anggotaModel->getAnggota());

        $data = [
            'title' => 'User',
            'active' => $this->submenuModel->find(2),
            'users' => $this->anggotaModel->getAnggota(),
            'levels' => $this->roleModel->find()
        ];

        return view('user/index', $data);
    }
}
