<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubmenuModel;

class Dashboard extends BaseController
{

    protected $submenuModel;

    public function __construct()
    {
        $this->submenuModel = new SubmenuModel();
    }

    public function index()
    {
        if (!check_login(session('userID'))) return redirect()->to('/login');

        // dd(generate_menu(session('userID')));

        $data = [
            'title' => 'Dashboard',
            'active' => $this->submenuModel->find(1)
        ];

        return view('dashboard/index', $data);
    }
}
