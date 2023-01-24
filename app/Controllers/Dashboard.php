<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!check_login(session('userID'))) return redirect()->to('/login');

        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard/index', $data);
    }
}
